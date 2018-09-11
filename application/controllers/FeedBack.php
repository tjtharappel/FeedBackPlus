<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FeedBack extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!islogedin()) {
            redirect(site_url('login'));
        }
        $this->load->model('StudentModel');
        $this->load->model('FeedBackCore/FeedBackModel');
    }
    public function saveFeedBack()
    {
        try {
            $communicationRating = $this->input->post('communicationRating');
            $subjectknowlegeRating =$this->input->post('subjectknowlegeRating');
            $classroomRating = $this->input->post('classroomRating');

            $remarks = $this->input->post('remarks');
            $subjectId =$this->input->post('subjectId');
            $teacherId = $this->input->post('teacherId');
        
            $studentInfo = StudentModel::getStudentInfoByLoginId($this->session->userid);
            $studentId = $studentInfo->id;

            $studentBatchInfo = StudentModel::getStudentBatchDetails($studentId);
            $academicsId = $studentBatchInfo->id;

            FeedBackModel::updatefeedback($academicsId, $teacherId, $subjectId, $studentId, $communicationRating, $subjectknowlegeRating,$classroomRating, $remarks);
            echo json_encode(['status'=>true]);
        }
        catch(Exception $e)
        {
            echo json_encode(['status'=>false,'message'=>$e->getMessage()]);
        }
    }
    public function feedbacksummary()
    {
        $data['title'] = "Student Feedbacks";
        $data['widgets'] = ['feedbacksummary'];
        $data['deptFeedBack'] = R::findAll('departments');
        $this->load->view('admin/dashboard',$data);
    }
}