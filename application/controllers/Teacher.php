<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teacher extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!islogedin()) {
            redirect(site_url('login'));
        }
        $this->load->model('teachermodel');
    }
    public function dashboard()
    {
        $this->load->view('teacher/home');
    }
    public function create()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $password = $this->input->post('password');
        $address = $this->input->post('address');
        $dpurl = $this->input->post('dpurl');
        $gender = $this->input->post('gender');
        $deptId= $this->input->post('deptId');
        $teacher = new TeacherModel($name,$email,$mobile,$password,$address,$dpurl,$gender,$deptId,'approved');
            
        $uploadSummary = fileUpload('dpurl', 'teachers/profilepic/');

        $teacher->dpurl = $uploadSummary['filename'];
        $teacher->create();
        redirect("admin/department/$deptId");
    }
    public function update()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $password = $this->input->post('password');
        $address = $this->input->post('address');
        $dpurl = $this->input->post('dpurl');
        $gender = $this->input->post('gender');
        $deptId= $this->input->post('deptId');

        $teacher = new TeacherModel($name,$email,$mobile,$password,$address,$dpurl,$gender,$deptId,'approved');
        $teacher->id = $this->input->post('teacherId'); 
        if ($_FILES['dpurl']) {
            $uploadSummary = fileUpload('dpurl', 'teachers/profilepic/');

            $teacher->dpurl = $uploadSummary['filename'];
        } else {
            $this->dburl='';
        }

        $teacher->update();
        redirect("admin/department/$deptId");
    }
    public function remove()
    {
        $id = $this->input->post('Id');
        $teacher = new TeacherModel();
        $teacher->remove($id);
    }
    public function viewProfile($teacherId)
    {
        $teacher = new TeacherModel();
        
        $data['teacher'] = $teacher->load($teacherId);
        $data['title'] = $data['teacher']->name."'s profile";
        $data['widgets'] = ['teacherprofile'];
        $data['scripts'] = ['teachers'];
        $this->load->view('admin/dashboard',$data);
    }
    public function showFeedBack()
    {
        $teacherId = (R::findOne('teachers','login_id = ?',[$this->session->userid]))->id;
        $data['title'] = (R::load('teachers',$teacherId))->name . " Rating "; 
        $data['widgets'] = ['teacherrating'];
        $data['scripts'] = ['teacherrating'];
        $data['teachers'] = $this->db->query("call getTeacherRatingById($teacherId)")->result();
        $this->load->view('teacher/home',$data);
    }
}
