<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Academic extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!islogedin()) {
            redirect(site_url('login'));
        }
        $this->load->model('Response');
    }
    public function index()
    {

            $data['title'] = 'Academic Details';
            $data['widgets'] = ['academicStart'];
            $data['departments'] = R::findAll('departments');
            $data['scripts'] = ['subject','academic'];
            $this->load->view('admin/dashboard', $data);

    }
    public function create()
    {
            $academic = R::dispense('academics');
            $academic->courses_id = $this->input->post('courseddl');
            $academic->strength = $this->input->post('strength');
            $academic->date = $this->input->post('date');
            
            $exist = R::findOne('academics',"courses_id =$academic->courses_id and date = '$academic->date' ");

            if(isset($exist) && is_object($exist)) {

              echo json_encode (new Response('Already Started',false));

            } else {
                R::store($academic);
                echo json_encode (new Response('Academic year started',true));
            }
    }
    public function getAcademics($courseId)
    {
        echo json_encode( R::findAll('academics',"courses_id =?",[$courseId]));
    }
    public function getSemesterDetails($batchId)
    {
        
        $responce = Base_Model::getSemesterSubjects($batchId);
        $data['subjects'] = $responce['subjects'];
        $data['teachers'] = Base_Model::getTeachersBy($responce['course']->departments_id);  
        $this->load->view('admin/templates/subjectAssignList',$data);  
    }
}   
