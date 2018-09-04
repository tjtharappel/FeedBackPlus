<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Courses extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!islogedin()) {
            redirect(site_url('login'));
        }
    }
    public function getCourseBy(int $departmentId=-1)
    {
        $dept = R::load('departments', $departmentId);
        $data['department'] = $dept;
        $data['deptId'] =$dept->id;
        $data['courses'] = R::findAll('courses',"departments_id = $departmentId");
        $data['widgets'] = ['courseListWidget'];
        return $this->load->view('admin/templates/courseListWidget', $data);
    }
    public function create(int $departmentId=-1)
    {
        if (!isPostBack()) {
            $dept = R::load('departments', $departmentId);

            $data['title'] = $dept->name . '- Create New Course';
            $data['department'] = $dept;
            $data['widgets'] = ['createCourse'];
            return $this->load->view('admin/dashboard', $data);
        } else {
            
            $course = R::dispense('courses');
            
            $courseId = $this->input->post('courseId');

            if($courseId > 0)  $course->id=$courseId;
            $course->departments_id = $this->input->post('deptId');
            $course->name = $this->input->post('name');
            $course->duration = $this->input->post('duration');
            $course->type = $this->input->post('type');
            $course->pattern = $this->input->post('pattern');

            R::store($course);
            redirect(site_url("admin/department/$course->departments_id/courses"));
        }
    }
    public function remove()
    {
        $courseId = $this->input->post('Id');
        R::trashBatch('courses',[$courseId]);

    }
    public function edit(int $courseId)
    {
        $course = R::load('courses',$courseId);
        $data['course'] =$course;
        $data['title'] = $course->name;
        $data['widgets'] = ['createCourse'];
        
        return $this->load->view('admin/dashboard',$data);
    }
}
