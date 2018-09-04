<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class courseModel extends CI_Model
{
    public static function getOfferedDepartmentInfo(int $courseId)
    {
        $course = R::findOne('courses',"id = $courseId");
        return R::findOne('departments',"id = $course->departments_id");
    }
    public static function getOfferedCoursesInfo(int $departmentId) 
    {
        return R::findAll('courses',"departments_id = $departmentId");
    }
    public static function getAllSubjects(int $courseId)
    {
        return R::findAll('subjects',"courses_id = $courseId");
    }
    public static function getCourseDetails(int $courseId)
    {
        return R::findOne('courses',"id = $courseId");
    }
}
