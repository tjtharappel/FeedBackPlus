<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Model 
{
    public $id;
    public $username;
    public $password;
    public $role;
    
    public function __construct(string $username=' ',string $password=' ') {
        
        parent::__construct();
        $this->username = $username;
        $this->password = generate_password($password);
    }
    public function fetch() {
       $login = R::findOne('login'," username ='$this->username' AND password = '$this->password'");
       if (is_object($login)) {
           $this->id = $login->id;
           $this->username = $login->username;
           $this->password = $login->password;
           $this->role = $login->role;
       }
    }
    public function isAdmin(): bool {
        
        return ($this->role == 'admin') ? TRUE : FALSE;
    }
    public function isStudent(): bool {
        $status = false;
        if (!empty($this->id)) {
            $student = R::findOne('students', "login_id = $this->id");
            if (is_object($student)) {
                $status = (($student->status == 'approved') && ($this->role == 'student')) ? true:false;
            }
        }
        return $status;
    }
    public function isTeacher(): bool {

        $status = false;
        if (!empty($this->id)) {
            $teacher = R::findOne('teachers', "login_id = $this->id");
            if (is_object($teacher)) {
                $status = (($teacher->status == 'approved') && ($this->role == 'teacher')) ? true:false;
            }
        }
        return $status;
    }
}