<?php
interface IReadFeedBack {
    
    public function getCommunicationSkillRating (int $id)   : int;
    public function getSubjectKnowledgeRating (int $id)     : int;
    public function getClassRoomInteractionRating (int $id) : int;
}