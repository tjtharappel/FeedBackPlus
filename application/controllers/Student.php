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
        $this->load->model('TeacherModel');
        $this->load->model('SubjectModel');
        $this->load->model('feedbackcore/feedbackmodel');
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
        $studentInfo = StudentModel::getStudentInfoByLoginId($this->session->userid);
        $studentId = $studentInfo->id;

        $studentBatchInfo = StudentModel::getStudentBatchDetails($studentId);
        $academicsId = $studentBatchInfo->id;

        $data['subject'] = subjectModel::getSubjectById($subjectId);

        $data['teacher'] =TeacherModel::getTeacherBySubject($subjectId,$academicsId);
        $data['renderStatus'] = (FeedBackModel::isAlreadyEnterd($academicsId,$data['teacher']->id,$studentId,$data['subject']->id)) ?false:true;
        $this->load->view('students/templates/SubjectFeedBackForm',$data);
    }
}