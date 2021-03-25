<?php

defined('_EXEC') or die;

class Urls_registered_vkye
{
    static public $home_page_default = '/';

    static public function urls()
    {
        return [
            '/' => [
                'controller' => 'Index',
                'method' => 'index'
            ],
            '/nosotros' => [
                'controller' => 'Index',
                'method' => 'about'
            ],
            '/merida' => [
                'controller' => 'Index',
                'method' => 'merida'
            ],
            '/negocios' => [
                'controller' => 'Index',
                'method' => 'business'
            ],
            '/contacto' => [
                'controller' => 'Index',
                'method' => 'contact'
            ],
            '/aviso-de-privacidad' => [
                'controller' => 'Index',
                'method' => 'privacy'
            ]
        ];
    }
}
