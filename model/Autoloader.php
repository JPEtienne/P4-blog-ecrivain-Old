<?php 

class Autoloader {
    
    static function register() {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function register2() {
        spl_autoload_register(array(__CLASS__, 'autoload2'));
    }

    static function autoload($class_name) {
        require 'model/' . $class_name . '.php';
    }

    static function autoload2($class_name) {
        require '../../model/' . $class_name . '.php';
    }
}