<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TeacherModel extends CI_Model
{

    public $name;
    public $email;
    public $mobile;
    public $password;
    public $address;
    public $dpurl;
    public $gender;
    public $deptId;
    public $status;
    
    public function __construct($name='',$email='',$mobile='',$password='',$address='',$dpurl='',$gender='',$deptId='',$status='')
    {
        parent::__construct();

        $this->name = $name;
        $this->email = $email;
        $this->mobile = $mobile;
        $this->password= $password;
        $this->address = $address;
        $this->dpurl = $dpurl;
        $this->status = $status;
        $this->deptId =$deptId;
        $this->gender = $gender;
    }
    public function create()
    {
        $teacher = R::dispense('teachers');

        $teacher->name = $this->name;
        $teacher->email = $this->email;
        $teacher->mobile = $this->mobile;
        $teacher->gender = $this->gender;
        $teacher->address = $this->address;
        $teacher->dpurl = $this->dpurl;
        $teacher->status = $this->status;
        

        $login = R::dispense('login');
        $login->username = $teacher->email;
        $login->password = generate_password($this->password);
        $login->role = 'teacher';
        $login->ownTeachersList[] = $teacher;
        R::store($login);
        
        $dept = R::load('departments', $this->deptId);
        $dept->ownTeachersList[]=$teacher;
        R::store($dept);
    }
    public function update()
    {
        $teacher = R::load('teachers',$this->input->post('teacherId'));
        $teacher->name = $this->name;
        $teacher->email = $this->email;
        $teacher->mobile = $this->mobile;
        
        $teacher->gender = $this->gender;
        $teacher->address = $this->address;
        $teacher->dpurl = ($this->dpurl=='')?$teacher->dpurl:$this->dpurl;
        $teacher->status = $this->status;
        R::store($teacher);
    }
    public function getTeachers(int $departmentId)
    {
        return R::findAll('teachers','departments_id = ? and status = ?',[$departmentId,'approved']);
    }
    public function remove($id)
    {
        R::trashBatch('teachers',[$id]);
    }
    public function load($id)
    {
        return R::load('teachers',$id);
    }
    public static function isExist(string $email,string $mobile)
    {
        $exist = R::findOne('students',"email = '$email' or mobile= '$mobile'");
        if(is_object($exist)) {

            return true;
        }
            else false;
    }
    public static function getTeachersForApproval()
    {
        return R::findAll('teachers',"status = ?",['notapproved']);
    }
    public static function approve(int $teacherId) 
    {
        $teacher = R::load('teachers',$teacherId);
        $teacher->status = "approved";
        R::store($teacher);
    }
    public static function getTeacherBySubject(int $subjectId,int $academics_id) {
        
        $teacher = null;
        $assignedSubjectTeacherInfo = R::findOne('assignedsubjects',"subjects_id = ? and academics_id = ?",[$subjectId,$academics_id]);
        $teacher = $assignedSubjectTeacherInfo->teachers;
        return $teacher;
    }
}
