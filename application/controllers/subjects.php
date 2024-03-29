<?php

use RedBeanPHP\Facade;
defined('BASEPATH') or exit('No direct script access allowed');

class subjects extends CI_Controller
{
    private $department;
    public function __construct()
    {
        parent::__construct();
        if (!islogedin()) {
            redirect(site_url('login'));
        }
        $this->load->model('departmentModel');
        $this->department = new DepartmentModel();
        $this->load->model('courseModel');
        $this->load->model('subjectModel');
        $this->load->model('Response');
    }

    public function index(int $courseId)
    {
               
            $data['departments'] = $this->department->getAllDepartments();

            $data['deptId'] = courseModel::getOfferedDepartmentInfo($courseId)->id;
            $data['courses'] =courseModel::getOfferedCoursesInfo($data['deptId']);
            $data['course'] = courseModel::getCourseDetails($courseId);

            $data['widgets'] = ['departmentCoursePairDDL','subjectList'];
            $data['scripts'] = ['subject'];
            $data['subjects'] = courseModel::getAllSubjects($courseId);

            $this->load->view('admin/dashboard',$data);
        
    } 
    public function create(int $courseId)
    {
        $data['subTitle'] = 'New ';
        if(isPostBack())
        {
            $data['subTitle'] = 'Edit ';
            $subjectId = $this->input->post('Id');
            $data['subject'] = subjectModel::getSubjectById($subjectId);
        }
        $data['courseId'] = $courseId;
        $data['widgets'] = ['createSubject'];
        $data['course'] = courseModel::getCourseDetails($courseId);
        $data['scripts'] = ['subject'];

        $this->load->view('admin/dashboard',$data);
    }
    public function add()
    {
       
        $subject = R::dispense('subjects');
        
        $subject->courses_id = $this->input->get('courseId');
        $subject->code = $this->input->get('code');
        $subject->name = $this->input->get('name');
        $subject->semester = $this->input->get('semester');
        $subject->type = $this->input->get('type');
        $subject->examtype = $this->input->get('pattern');
        $subjectId=null;
        $subjectId = $this->input->get('subjectId');
        if ($subjectId=="") {
            if (subjectModel::isSubjectExist($subject->courses_id, $subject->code, $subject->name)) {
                echo json_encode(new Response('Subject Already Exist', false));
            }
            else
            {
                R::store($subject);
                echo json_encode(new Response('Subject update Successfull',true));
            }
        }
        else
        {
            $subject->id = $subjectId;
            R::store($subject);
            echo json_encode(new Response('Subject update Successfull',true));
        }
        
    }
    public function remove(){
        try
        {
            $subjectId = $this->input->post('Id');
            R::trashBatch('subjects',[$subjectId]);
            echo json_encode(TRUE);
        }
        catch(Exception $e)
        {
            echo json_encode(FALSE);
        }
    }
    public function edit($subjectId)
    {
        $data['subTitle'] = 'Edit ';
        $data['subject'] = subjectModel::getSubjectById($subjectId);
        $data['courseId'] = $data['subject']->courses_id;
        $data['widgets'] = ['createSubject'];
        $data['course'] = courseModel::getCourseDetails($data['subject']->courses_id);
        $data['scripts'] = ['subject'];

        $this->load->view('admin/dashboard',$data);
    }
}