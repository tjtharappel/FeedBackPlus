<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Model extends CI_Model
{
    
    public static function CoursesBy(int $departmentId) {

        return R::findAll('courses','departments_id = ?',[$departmentId]);
    }
    public static function getTeacherBy(int $loginId) {

        return R::findOne('teachers','login_id = ?',[$loginId]);
    }
    public static function getDepartmentByTeacherId(int $teacherId) {

        return R::findOne('departments','id = ?',[$teacherId]);
    }
    public static function getSemesterSubjects(int $batchId) {

        $batch = R::load('academics',$batchId);
        $course = R::load('courses',$batch->courses_id);
        $currentDate = date_create(date('y-m-d'));
        $batchStartDate = date_create($batch->date);
        $datedefer = date_diff($currentDate,$batchStartDate);
        
        $sem =1;
        $sem = $sem + ($datedefer->y)*2;
        $sem = $sem + ( ($datedefer->m <6)? 0:1);
        $data['subjects'] = R::findAll('subjects',"semester = ? and courses_id = ?",[$sem,$course->id]);
        $data['course'] = $course;
        $data['batch'] = $batch;
        return $data;
    }
    public static function getTeachersBy($departmentId)
    {
        return R::findAll('teachers',"departments_id = ? and status ='approved'",[$departmentId]);
    }
    public static function assignSubjects(int $batchId,int $subjectId,int $teacherId)
    {
        $assignment = R::findOne('assignedsubjects','academics_id = ? and subjects_id = ?',[$batchId,$subjectId]);
        if (!is_object($assignment)) {
            $assignment = R::dispense('assignedsubjects');
        }
        $assignment->academics_id =$batchId;
        $assignment->teachers_id = $teacherId;
        $assignment->subjects_id = $subjectId;
        R::store($assignment);
    }
}