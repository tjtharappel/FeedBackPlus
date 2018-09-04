<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('courseModel');
        $this->load->model('StudentModel');
    }
    public function index()
    {
        $this->load->view('welcome');
    }
    public function login()
    {
        $this->load->view('login');
    }
    public function authorise()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->load->model('login');
        $login = new Login($username, $password);
        $login->fetch();

        $this->session->set_userdata(['userid' => $login->id,'role'=>$login->role]);
        if ($login->isAdmin()) {
            return redirect(site_url('admin/dashboard'));

        }

        if ($login->isStudent()) {
           return  redirect(site_url('student/dashboard'));
        }

        if ($login->isTeacher()) {
           return redirect(site_url('teacher/dashboard'));
        }
        $this->load->view('login', ['message'=>'invaild username/ password']);
    }
    public function changeColor(string $color='')
    {
            if ($color !='') {
                setcookie('color', $color, time() + (86400 * 30*30), "/");
                redirect(site_url('welcome/changecolor'));
            } else {
                $this->load->view('themes');
            }
    }
    public function studentRegistration($data=[])
    {
        $data['title'] = "Registration";
        $data['widgets'] = ['Registration'];
        $data['departments'] = R::findAll('departments');
        $data['scripts'] = ['registration'];
        $this->load->view('students/dashboard',$data);

    }
    public function addStudent()
    {
        if (!StudentModel::isExist($this->input->post('email'), $this->input->post('mobile'))) {
            $student = R::dispense('students');
            $login = R::dispense('login');

            $student->name =  $this->input->post('name');
            $student->email = $this->input->post('email');
            $student->mobile = $this->input->post('mobile');
            $student->courses_id = $this->input->post('courseddl');
            $student->yearofjoin = $this->input->post('year');
            $student->address = $this->input->post('address');
            $student->gender = $this->input->post('gender');
            $studentId = $this->input->post('studentId');

            if ($studentId >= 0) {
                $student->id = $studentId;
            }
            $login->username = $student->email;
            $login->password = generate_password($this->input->post('password'));
            $login->role = 'student';
            R::store($login);

            if ($_FILES['dpurl']) {
                $uploadStatus = fileUpload('dpurl', 'students/profilepic/');
                $student->dpurl = $uploadStatus['filename'];
            }
            $student->login_id = $login->id;
            $student->status = 'notapproved';
            R::store($student);
            $data['message'] = "you can login after admin verification";
            $data['type'] ='success';
            $this->studentRegistration($data);
        }
        else
        {
            $data['message'] = "this email / mobile number already registered..";
            $data['type'] ='danger';
            $this->studentRegistration($data);
        }
    }
}
