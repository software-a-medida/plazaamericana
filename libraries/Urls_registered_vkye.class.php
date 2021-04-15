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
            '/acerca-de-nosotros' => [
                'controller' => 'Index',
                'method' => 'aboutus'
            ],
            '/negocios' => [
                'controller' => 'Index',
                'method' => 'business'
            ],
            '/contactanos' => [
                'controller' => 'Index',
                'method' => 'contactus'
            ],
            '/aviso-de-privacidad' => [
                'controller' => 'Index',
                'method' => 'privacynotice'
            ]
        ];
    }
}
