const loadSubjectDetails = function (object) {

    let subjectId = $(object).attr('data-subjectid');
    $('.list-group li.active').removeClass('active');
    $('#currenttab').val($(object).attr('id'));
    object.classList.add('active');
    $('#subjectfeedback').html(`<div class="card" style="margin-top:35px;"><div class="card-body text-center" style="padding-top:225px;padding-bottom:225px"><i class="fa fa-circle-o-notch fa-spin text-primary" style="font-size:24px;"></i><i style="font-size:25px">Fetching</i><div></div>`);
    $.get(`<?php echo site_url("student/getSubjectFeedbackForm");?>/${subjectId}`)

        .done(function (data) {
            $('#subjectfeedback').html(data);
            rating();
        });
}
const rating = function () {
    $('.skill').each(function (i, obj) {
        $(obj).barrating({
            theme: 'fontawesome-stars'
        });
    });
}
const updatefeedback = function () {

    let communicationRating = $('#communicationskill option:selected').val();
    let subjectknowlegeRating = $('#subjectknowlege option:selected').val();
    let classroomRating = $('#classroomrating option:selected').val();
    let subjectId = $('#subjectId').val();
    let teacherId = $('#teacherId').val();
    let remarks = $('#remarks').val();

    $.post(`<?=site_url('feedback/saveFeedBack');?>`,
    {
        communicationRating:communicationRating||0,
        subjectknowlegeRating:subjectknowlegeRating||0,
        classroomRating:classroomRating||0,
        remarks:remarks,
        subjectId:subjectId,
        teacherId:teacherId
    })
    .done(function (status){

        let result =JSON.parse(status);
        if(result.status==true)
        {
            $.alert("Feedback updated");
            let object = $('#currenttab').val();
            ($(`#${object}`).next()).trigger('click');
        }
        else
        {
            $.alert("please try again later");
        }
    });
};