<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Department extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!islogedin()) {
            redirect(site_url('login'));
        }
        $this->load->model('DepartmentModel');
        $this->load->model('Response');
    }

    public function create()
    {
        $department = new DepartmentModel($this->input->post('name'));

        if ($department->isExist()) {
            echo json_encode(new Response("$department->name is already exist.", false));
        } else {
            $department->add();
            echo json_encode(new Response("$department->name is added successfully.", true));
        }
    }
    public function edit()
    {
        $deptId = $this->input->post('Id');
        $deptName = $this->input->post('name');

        $department = new DepartmentModel($deptName);
        if ($department->isExist()) {
            echo json_encode(new Response("$department->name is already exist.", false));
        } else {
                $department->id = $deptId;
                $department->update();
                echo json_encode(new Response("rename operation successfull.", true));
        }
        
    }
    public function remove()
    {
        $id = $this->input->post('Id');
        $department = new DepartmentModel();
        $department->remove($id);
    }
    public function listAllTeachers(int $departmentId)
    {
        $department = new DepartmentModel();
        $department->load($departmentId);
        $this->load->model('TeacherModel');
        $teachers = new TeacherModel();

        $data['teachers'] = $teachers->getTeachers($departmentId);
        $hod = R::findOne('hods',"departments_id =$departmentId");
        if(is_object($hod))
        $data['hodId'] =$hod->teachers_id;
        $data['title'] = "$department->name - Department";
        $data['deptid'] = $departmentId;
        $data['widgets'] = ['departmentTeachers'];
        $data['scripts'] = ['teachers'];

        $this->load->view('admin/dashboard', $data);
    }
    public function addTeachers($departmentId)
    {
        $department = new DepartmentModel();
        $department->load($departmentId);

        $data['title'] = "$department->name - Department";
        $data['deptid'] = $departmentId;
        $data['widgets'] = ['createTeacher'];
        $data['scripts'] = ['teachers'];
        $this->load->view('admin/dashboard', $data);
    }
    public function updateHOD()
    {
        $deptId = $this->input->post('deptId');
        $teacherId = $this->input->post('teacherId');


        $hod = R::findOne('hods','departments_id = ?',[$deptId]);
        if(!is_object($hod)){
            $hod = R::dispense('hods');
            $hod->departments_id = $deptId;
        } 
        $hod->teachers_id = $teacherId;
        R::store($hod);

        echo json_encode(new Response("HOD Changed !!",1));
    }
    public function offeringCourses(int $deptId=-1)
    {

        $data['title'] = 'Offering Courses';
        $data['departments'] = R::findAll('departments');
        $data['deptId'] = $deptId;
        $data['courses'] = R::findAll('courses',"departments_id = $deptId");
        $data['widgets'] = ['departmentDropDown','courseListWidget'];
        $data['scripts'] = ['course'];
        $this->load->view('admin/dashboard',$data);
    }
}
