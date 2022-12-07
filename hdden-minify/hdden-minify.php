<?php
/*
Plugin Name: HDDen Minifier
Description: Минификация html с сохранением &lt;!--noindex--&gt;
Version: 1.0
Author: HDDen
Author URI: https://github.com/hdden
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

include_once 'OutputmodMinify.php';
if (class_exists('OutputmodMinify')){
    add_action('template_redirect', function(){ob_start(function($html){
        if (!$html){
            return $html;
        }

        $modified_html = \OutputmodMinify::minify($html, true);
        return $modified_html;

    });}, (PHP_INT_MAX - 1001));
}