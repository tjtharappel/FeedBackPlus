<?php
interface ITeacher extends IReadFeedBack,IReadRemarks{
    
    public function getTeacherid() : int;
    public function getTeacherName() :int;
}