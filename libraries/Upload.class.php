<?php

defined('_EXEC') or die;

class Upload
{
    private $valid_extensions;
    private $maximum_file_size;

    public function __construct()
    {
        $this->valid_extensions = ['jpg', 'jpeg', 'png', 'bmp', 'svg', 'pdf', 'doc', 'txt'];
        $this->maximum_file_size = $this->get_maximum_file_size();
    }

    public static function order_array( $argv = null ) : array
    {
        if ( is_null($argv) )
        /*  */ return [];

        $response = [];

        if ( isset($argv['name']) && is_array($argv['name']) )
        {
            for ( $i=0; $i < count($argv['name']); $i++ )
            {
                $response[$i] = [
                    'name' => $argv['name'][$i],
                    'type' => $argv['type'][$i],
                    'tmp_name' => $argv['tmp_name'][$i],
                    'error' => $argv['error'][$i],
                    'size' => $argv['size'][$i]
                ];
            }
        }

        return $response;
    }

    public static function validate_file( $file = null, $valid_extensions = null ) : array
    {
        if ( is_null($valid_extensions) || !is_array($valid_extensions) || empty($valid_extensions) )
        /*  */ $valid_extensions = (new self)->valid_extensions;

        if ( is_null($file) )
        /*  */ return (new self)->get_code_errors('FILE_EMPTY');

        if ( $file['error'] >= 1 )
        /*  */ return (new self)->get_code_errors($file['error'], $file['name']);

        if ( !in_array( explode('/', $file['type'])[1], $valid_extensions, true ) )
        /*  */ return (new self)->get_code_errors('FILE_EXTENSION', $file['name']);

        if ( $file['size'] > (new self)->maximum_file_size )
        /*  */ return (new self)->get_code_errors('FILE_SIZE', $file['name']);

        return [ 'status' => 'OK' ];
    }

    public static function validate_array( $files = null, $valid_extensions = null ) : array
    {
        if ( is_null($valid_extensions) || !is_array($valid_extensions) || empty($valid_extensions) )
        /*  */ $valid_extensions = (new self)->valid_extensions;

        if ( is_null($files) )
        /*  */ return array_merge((new self)->get_code_errors('FILE_EMPTY'), ['labels' => []]);

        $labels = [];

        foreach ( $files as $key => $value )
        {
            $response = (new self)->validate_file($value, $valid_extensions);

            if ( $response['status'] === 'ERROR' )
            /*  */ $labels[$key] = $response;
        }

        if ( !empty($labels) )
        /*  */ return array_merge((new self)->get_code_errors('FILES_ERROR'), ['labels' => $labels]);

        return [ 'status' => 'OK' ];
    }

    public static function upload_file( $file = null, $settings = [] ) : array
    {
        if (!isset($settings) OR empty($settings))
        {
            $settings = [
    			'extensions' => [ 'images' => ['jpg', 'jpeg', 'png'], 'applications' => ['pdf'] ],
    			'path_uploads' => PATH_UPLOADS,
    			'set_name' => 'FILE_NAME_LAST_RANDOM'
    		];
        }

        $settings['path_uploads'] = ( !isset($settings['path_uploads']) || empty($settings['path_uploads']) ) ? PATH_UPLOADS : $settings['path_uploads'];
        $settings['set_name'] = ( !isset($settings['set_name']) || empty($settings['set_name']) ) ? 'FILE_NAME' : $settings['set_name'];

        if ( is_null($file) )
        /*  */ return (new self)->get_code_errors('FILE_EMPTY');

        $file['name'] = (new self)->set_file_name( $file['name'], $settings['set_name'] );

        $file_path = Security::DS($settings['path_uploads'] . '/'. $file['name']);

        if ( @copy( $file['tmp_name'], $file_path ) )
        {
            if ( isset($settings['image_compress']) && $settings['image_compress'] == true )
            {
                switch ( $file['type'] )
                {
                    case 'image/jpeg':
                    case 'image/jpg':
                    case 'image/png':
                    case 'image/gif':
                    /*  */ (new self)->image_compress( $file_path ); break;
                }
            }

            return [
                'status' => 'OK',
                'file' => $file['name'],
                'size' => $file['size'],
                'size_compress' => filesize($file_path)
            ];
        }
        else
        /*  */ return (new self)->get_code_errors('SYSTEM');
    }

    public static function upload_array( $files = null, $settings = [] ) : array
    {
        if ( is_null($files) )
        /*  */ return array_merge((new self)->get_code_errors('FILE_EMPTY'), ['labels' => []]);

        $response = [];

        foreach ( $files as $key => $value )
        /*  */ $response[$key] = (new self)->upload_file($value, $settings);

        return $response;
    }

    private function image_compress( $source = null ) : void
    {
        if ( is_null($source) )
        /*  */ return;

        $image = getimagesize($source);

        switch ( $image['mime'] )
        {
            default:
            case 'image/jpeg':
            /*  */ $image = imagecreatefromjpeg($source); break;

            case 'image/png':
            /*  */ $image = imagecreatefrompng($source); break;

            case 'image/gif':
            /*  */ $image = imagecreatefromgif($source); break;
        }

        imagejpeg($image, $source, 75);
    }

    private function set_file_name( $argv = null, $name_formation = null ) : string
    {
        switch ( strtoupper($name_formation) )
        {
            default:
            case 'FILE_NAME':
            /*  */ return $argv; break;

            case 'RANDOM':
            /*  */ return (new Security())->random_string(16) .'.'. pathinfo($argv, PATHINFO_EXTENSION); break;

            case 'FILE_NAME_LAST_RANDOM':
            /*  */ return pathinfo($argv, PATHINFO_FILENAME) .'_'. (new Security())->random_string(8) .'.'. pathinfo($argv, PATHINFO_EXTENSION); break;

            case 'FILE_NAME_FIRST_RANDOM':
            /*  */ return (new Security())->random_string(8) .'_'. pathinfo($argv, PATHINFO_FILENAME) .'.'. pathinfo($argv, PATHINFO_EXTENSION); break;
        }
    }

    public function get_maximum_file_size() : float
    {
        $post_max_size = $this->str_to_bytes( ini_get('post_max_size') );
        $upload_max_filesize = $this->str_to_bytes( ini_get('upload_max_filesize') );
        $memory_limit = $this->str_to_bytes( ini_get('memory_limit') );

        if ( empty($post_max_size) && empty($upload_max_filesize) && empty($memory_limit) )
        /*  */ return false;

        return min($post_max_size, $upload_max_filesize, $memory_limit);
    }

    private function str_to_bytes( $value ) : ? float
    {
        $unit_byte = strtolower(preg_replace('/[^a-zA-Z]/', '', $value));
        $num_val = (int) $value;

        switch ( $unit_byte )
        {
            case 'p':
            case 'pb':
            /*  */ $num_val *= 1024;

            case 't':
            case 'tb':
            /*  */ $num_val *= 1024;

            case 'g':
            case 'gb':
            /*  */ $num_val *= 1024;

            case 'm':
            case 'mb':
            /*  */ $num_val *= 1024;

            case 'k':
            case 'kb':
            /*  */ $num_val *= 1024;

            case 'b':
            /*  */ return $num_val *= 1; break; // make sure

            default:
            /*  */ return false; break;
        }

        return false;
    }

    private function get_code_errors( $code_error = null, $flags = null ) : array
    {
        if ( is_string($code_error) )
        /*  */ $code_error = strtoupper($code_error);

        switch ( $code_error )
        {
            case 1:
            case 2:
            case 'FILE_SIZE':
            /*  */ $code_error = "UPLOAD_ERR_INI_SIZE"; break;

            case 3:
            /*  */ $code_error = "UPLOAD_ERR_PARTIAL"; break;

            case 4:
            case 'FILE_EMPTY':
            /*  */ $code_error = "UPLOAD_ERR_NO_FILE"; break;

            case 6:
            /*  */ $code_error = "UPLOAD_ERR_NO_TMP_DIR"; break;

            case 'FILE_EXTENSION':
            /*  */ $code_error = "UPLOAD_ERR_EXTENSION"; break;

            case 'FILES_ERROR':
            /*  */ $code_error = "UPLOAD_ERR_ARR"; break;

            case 'SYSTEM':
            /*  */ $code_error = "UPLOAD_ERR_CANT_WRITE"; break;

            default:
            /*  */ $code_error = "Unknow"; break;
        }

        $path = ( Format::check_path_admin() ) ? PATH_ADMINISTRATOR_LANGUAGE : PATH_LANGUAGE;
        $ini = (new Format())->import_file($path, Session::get_value('lang') . '_uploads_class', 'ini');

        if ( !empty($ini) )
        {
            if ( !is_null($flags) )
            /*  */ $message = vsprintf($ini[$code_error], explode(';', $flags));
            else
            /*  */ $message = $ini[$code_error];
        }
        else
        /*  */ $message = "{{$code_error}}";

        return [ 'status' => 'ERROR', 'message' => $message ];
    }
}
