<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook['pre_controller'] = function(){
    include_once realpath(APPPATH.'/third_party/rb-mysql.php');
    if(!R::testConnection()){
        R::setup("mysql:host=localhost;dbname=feedback",'root',''); 
    }
    if (!isset($_COOKIE['color'])) {
        setcookie('color','materia.min.css', time() + (86400 * 30*30), "/");
    }

}; 
