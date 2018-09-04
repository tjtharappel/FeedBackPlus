<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!islogedin()) {
            redirect(site_url('login'));
        }
    }
    public function dashboard()
    {
        $data['title'] = "Student Dashboard";
        $this->load->view('students/home',$data);
    }
}