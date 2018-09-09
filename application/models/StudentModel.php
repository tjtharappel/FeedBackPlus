<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StudentModel extends CI_Model
{
    public static function isExist(string $email,string $mobile)
    {
        $exist = R::findOne('students',"email = '$email' or mobile= '$mobile'");
        if(is_object($exist)) {

            return true;
        }
            else false;
    }
    public static function getCurrentSemesterSubjects(int $studentId)
    {
        $batch=null;
        $student = R::findOne('students',"login_id = ?",[$studentId]);
        if(is_object($student)) {
            $batch = $student->academics;
        }
        $currentDate = date_create(date('y-m-d'));
        $batchStartDate = date_create($batch->date);
        $datedefer = date_diff($currentDate,$batchStartDate);
        
        $sem =1;
        $sem = $sem + ($datedefer->y)*2;
        $sem = $sem + ( ($datedefer->m <6)? 0:1);
        return R::findAll('subjects',"semester = ? and courses_id = ?",[$sem,$batch->courses_id]);
    }

}