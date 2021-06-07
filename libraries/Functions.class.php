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
}
