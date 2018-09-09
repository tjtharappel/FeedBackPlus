const loadSubjectDetails = function (object) {

    let subjectId = $(object).attr('data-subjectid');
    $('.list-group li.active').removeClass('active');
    object.classList.add('active');
    $.get(`<?php echo site_url("student/getSubjectFeedbackForm");?>/${subjectId}`)
    
     .done(function( data ) 
     {
        
     });
}