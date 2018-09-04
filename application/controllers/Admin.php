<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!islogedin()) {
            redirect(site_url('login'));
        }
    }
    public function index()
    {
        $this->load->view('admin/dashboard');
    }
    public function manageDepartment()
    {
        $this->load->model('DepartmentModel');
        $department = new DepartmentModel();

        $data['title'] = 'Department Management';
        $data['departments'] = $department->getAllDepartments();
        $data['scripts'] = ['department'];
        $data['widgets'] = ['createDepartmentWidget'];

        $this->load->view('admin/dashboard', $data);
    }
    public function StudentsApproval()
    {
        $data['title'] = 'Students Login Approval';
        $data['students'] = R::findAll('students',"status ='notapproved'");
        $data['widgets'] = ['StudentsApproval'];
        $data['scripts'] = ['StudentsApproval'];
        $this->load->view('admin/dashboard',$data);
    }
    public function StudentsApproved()
    {   
        $id = $this->input->post('Id');
        $student = R::load('students',$id);
        $student->status="approved";
        R::store($student);
    }
    public function AssignSubject(int $courseId=-1)
    {
        $this->load->model('DepartmentModel');
        $department = new DepartmentModel();
        $data['title'] = "Assign Subjects";
        $data['departments'] = $department->getAllDepartments();
        $data['widgets'] = ['assignTeachers'];
        $data['scripts'] = ['assignTeacher'];
        $this->load->view('admin/dashboard',$data);
    }
    public function AssignSubjectToTeacher(int $subjectId,int $teacherId)
    {

    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('Welcome'));
    }
}
