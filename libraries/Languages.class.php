<?php

defined('_EXEC') or die;

class Languages
{
    static public function email($key)
    {
        $langs = [
            '' => [
                'es' => '',
                'en' => ''
            ]
        ];

        return $langs[$key][Session::get_value('lang')];
    }
}
