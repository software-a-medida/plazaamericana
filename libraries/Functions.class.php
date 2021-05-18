<?php

defined('_EXEC') or die;

class Functions
{
    public function __construct()
    {

    }

    public static function decode_json_to_array($array)
    {
        if (is_array($array))
        {
            foreach ($array as $key => $value)
            {
                if (is_array($array[$key]))
                {
                    foreach ($array[$key] as $subkey => $subvalue)
                        $array[$key][$subkey] = (is_array(json_decode($array[$key][$subkey], true)) AND (json_last_error() == JSON_ERROR_NONE)) ? json_decode($array[$key][$subkey], true) : $array[$key][$subkey];
                }
                else
                    $array[$key] = (is_array(json_decode($array[$key], true)) AND (json_last_error() == JSON_ERROR_NONE)) ? json_decode($array[$key], true) : $array[$key];
            }
        }
        else
            $array = (is_array(json_decode($array, true)) AND (json_last_error() == JSON_ERROR_NONE)) ? json_decode($array, true) : $array;

        return $array;
    }

    public static function generate_token()
    {
        $security = new Security;

        return strtolower($security->random_string(8));
    }

    public static function fileloader($file, $option)
	{
        if ($option == 'up')
        {
            $format = new Format();

            $route = Security::DS(PATH_LIBRARIES . 'Uploader/handler.php');

            $format->get_file($route);

            $uploader = new Uploader;

            $uploader->set_file_name();
            $uploader->set_file_temporal_name($file['tmp_name']);
            $uploader->set_file_type($file['type']);
            $uploader->set_file_size($file['size']);
            $uploader->set_upload_directory(PATH_UPLOADS);
            $uploader->set_valid_extensions(['png','jpg','jpeg']);
            $uploader->set_maximum_file_size('unlimited');

            $file = $uploader->upload_file();

            if ($file['status'] == 'success')
                $file = $file['file'];
            else
                $file = null;

            return $file;
        }
        else if ($option == 'down')
            unlink(PATH_UPLOADS . $file);
	}
}
