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
        $this->load->model('StudentModel');
    }
    public function dashboard()
    {
        $data['title'] = "Student Dashboard";
        $data['widgets'] = ['feedbackinputWidget'];
        $data['scripts'] = ['feedbackinput'];
        $data['sem_subjects'] =  StudentModel::getCurrentSemesterSubjects($this->session->userid);
        $this->load->view('students/home',$data);
    }
    public function getSubjectFeedbackForm(int $subjectId)
    {
        $this->load->view('students/templates/SubjectFeedBackForm');
    }
}