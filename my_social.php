<?php

/*
Plugin Name: Minhas Redes Sociais
Description: Plugin desenvolvido para exibir as minhas redes sociais
Version: 0.0.1
Author: LXuancheng
Text Domain: my_social
License: GPL2
*/

require_once dirname(__FILE__) . '/widget/my_widget.php';

class Minhas_Redes
{
    private static $instance;

    public static function getInstance()
    {
        if (self::$instance == NULL) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct()
    {
        add_action('widgets_init', [$this, 'register_widgets']);
    }

    public function register_widgets()
    {
        register_widget('My_Widget');
    }
}

Minhas_Redes::getInstance();