<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TeacherModel');
    }
    public function teacherRegistration($data=[])
    {
        $data['title'] = "Teacher Registration";
        $data['widgets'] = ['registration'];
        $data['scripts'] = ['registration'];
        $data['departments'] = R::findAll('departments');
       
        $this->load->view('teacher/dashboard',$data);
    }
    public function teacherSignUp()
    {
        if (!TeacherModel::isExist($this->input->post('email'), $this->input->post('mobile'))) {
            $teacher = R::dispense('teachers');
            $login = R::dispense('login');

            $teacher->name =  $this->input->post('name');
            $teacher->email = $this->input->post('email');
            $teacher->mobile = $this->input->post('mobile');
            $teacher->departments_id = $this->input->post('departmentdd1');
            $teacher->address = $this->input->post('address');
            $teacher->gender = $this->input->post('gender');
            $teacherId = $this->input->post('teacherId');

            if ($teacherId >= 0) {
                $teacher->id = $teacherId;
            }
            $login->username = $teacher->email;
            $login->password = generate_password($this->input->post('password'));
            $login->role = 'teacher';
            R::store($login);

            if ($_FILES['dpurl']) {
                $uploadStatus = fileUpload('dpurl', 'teachers/profilepic/');
                $teacher->dpurl = $uploadStatus['filename'];
            }
            $teacher->status = 'notapproved';
            R::store($teacher);
            $data['message'] = "you can login after admin verification";
            $data['type'] ='success';
            $this->teacherRegistration($data);
        }
        else
        {
            $data['message'] = "this email / mobile number already registered..";
            $data['type'] ='danger';
            $this->teacherRegistration($data);
        }
    }
    public function teacherLoginApproval()
    {
        $data['title'] = 'Teacher Login Approval';
        $data['widgets'] = ['teachersApproval'];
        $data['scripts'] = ['teachersApproval'];
        $data['teachers'] = TeacherModel::getTeachersForApproval();
        $this->load->view('admin/dashboard',$data);
    }
    public function teacherloginGrant(int $teacherId)
    {
        TeacherModel::approve($teacherId);
        return redirect(site_url('admin/approve-teachers'));
    }
}