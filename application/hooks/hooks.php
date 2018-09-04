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
    echo "hi";
    include_once realpath(APPPATH.'/third_party/rb-mysql.php');
    $this->load->database();
    if(!R::testConnection()){
        R::setup("mysql:host=".$this->db->hostname.";dbname=".$this->db->database,$this->db->username,$this->db->password); 
    }
}; 
