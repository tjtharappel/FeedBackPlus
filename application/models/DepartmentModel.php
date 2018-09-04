<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DepartmentModel extends CI_Model 
{
    public $id;
    public $name;
    public $teachers;
    public $HOD;
    
    public function __construct($name='') {
        
        parent::__construct();
        $this->name = $name;
    }

    public function isExist()
    {
        $exist = R::count('departments','name = ?',[$this->name]);
        
        if($exist >0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function add()
    {
            if(empty($this->name)) { 
                throw new Exception("department name can't be empty");
            } else 
            if($this->isExist()) {
            throw new Exception("department with same name already exist");
            } else {
            
             $department = R::dispense( 'departments' );
             $department->name = $this->name;

             R::store($department);
            }
    }
    public function update()
    {
        $department = R::load('departments',$this->id);
        $department->name = $this->name;
        
        R::store($department);
    }
    public function getAllDepartments()
    {
        $department =R::findAll('departments');
        return $department;
    }
    public function remove($id)
    {
        R::trashBatch('departments',[$id]);
    }
    public function load($id=0)
    {
       $department=R::load('departments',$id);
       $this->id = $department->id;
       $this->name = $department->name;
    }
    
}