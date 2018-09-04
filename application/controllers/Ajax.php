<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{
    public function getAllDepartments()
    {
        return json_encode(R::findAll('departments'));
    }
    public function getAllCoursesBy(int $deptId)
    {
        echo json_encode(R::findAll('courses',"departments_id = $deptId"));
    }
    public function getAllSubjectsBy(int $courseId)
    {
       $data['subjects'] = (R::findAll('subjects',"courses_id = $courseId"));
       $data['course'] = R::load('courses',$courseId);

       $this->load->view('admin/templates/subjectList',$data);
    }
    public function getacademic(int $courseId)
    {
        echo json_encode(R::findAll('academics',"courses_id =$courseId"));
    }
    public function getSemesters(int $courseId)
    {
        $course = R::load('courses',$courseId);
        echo json_encode($course);
    }
    public function coursedetails()
    {
        $courseId = $this->input->get('courseId');
        $semester = $this->input->get('semester');
        $deptId = $this->input->get('departmentId');
        $data['teachers'] = Base_Model::getTeachersBy($deptId);
        $data['subjects'] = R::findAll('subjects','courses_id = ? and semester = ?',[$courseId,$semester]);
        $this->load->view('admin/templates/subjectAssignList',$data);
    }
    public function getTeachers()
    {
        $data['teachers'] =R::findAll('teachers');
        $this->load->view('admin/templates/teacher',$data);
    }
    public function assignsubjectstoteachers()
    {
        $batchid = $this->input->post('batchId');
        $subjecid = $this->input->post('subjectId');
        $teacherid = $this->input->post('teacherId');
        Base_Model::assignSubjects($batchid,$subjecid,$teacherid);
    }
}