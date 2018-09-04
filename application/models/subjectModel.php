<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class subjectModel extends CI_Model
{
    public static function getSubjectById(int $subjectId)
    {
        return R::findOne('subjects',$subjectId);
    }
    public static function isSubjectExist(int $courseId,string $subjectCode,string $subjectName)
    {
        $subject= ' ';
        $subject = R::findOne('subjects',"courses_id =$courseId and code ='$subjectCode' or name='$subjectName'");

        return (is_object($subject))? TRUE : FALSE;
    }
}