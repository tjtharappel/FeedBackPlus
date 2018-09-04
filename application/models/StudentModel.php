<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StudentModel extends CI_Model
{
    public static function isExist(string $email,string $mobile)
    {
        $exist = R::findOne('students',"email = '$email' or mobile= '$mobile'");
        if(is_object($exist)) {

            return true;
        }
            else false;
    }
}