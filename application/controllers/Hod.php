<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hod extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!islogedin() || !isHOD()) {
            redirect(site_url('login'));
        }
    }
    public function academic()
    {
        $userid = $this->session->userid;
        $teacher = Base_Model::getTeacherBy($userid);
        $data['courses'] = Base_Model::CoursesBy($teacher->departments_id);
        $data['widgets'] = ['academic'];
        $data['scripts'] = ['academic'];
        $this->load->view('teacher/home',$data);
    }
}