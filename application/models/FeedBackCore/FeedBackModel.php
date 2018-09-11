<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FeedBackModel extends CI_Model
{
    private $CI;
    public function __construct()
    {
        parent::__construct();
        $this->CI =& get_instance();
    }
    public static function updatefeedback
    (int $academicsId,int $teacherId,int $subjectId,int $studentId,
    int $communicationRating,int $subjectKnowledgeRating,int $classroomInteractionRating,string $remarks='')
    {
        $subject = R::load('subjects',$subjectId);
        $course = R::load('courses',$subject->courses_id);
        
        $recode = R::dispense('feedbackrecords');

        $recode->academics_id = $academicsId;
        $recode->departments_id = $course->departments_id;
        $recode->courses_id = $course->id;
        $recode->teachers_id = $teacherId;
        $recode->students_id = $studentId;
        $recode->subjects_id = $subjectId;
        $recode->communicationrating = $communicationRating;
        $recode->subjectknowledgerating = $subjectKnowledgeRating;
        $recode->classroominteractionrating = $classroomInteractionRating;
        $recode->remarks = $remarks;
        $recode->feedbackdate = date_create(date('y-m-d'));
        R::store($recode);
    }
    public static function isAlreadyEnterd(int $academicsId, int $teacherId,int $studentId,int $subjectId) :bool {

        $record = R::findLast('feedbackrecords',"academics_id = ? and teachers_id = ? and students_id = ? and subjects_id = ?",
                    [$academicsId,$teacherId,$studentId,$subjectId]);
                    
        if(is_object($record)) {

            $currentDate = date_create(date('y-m-d'));
            $recordDate = date_create($record->feedbackdate);
            $datedefer = date_diff($currentDate,$recordDate);
            $dayDefer = $datedefer->format("%a");

            return (intval(($dayDefer)) <= 24)? true:false;
        }
        return false;
    }
}