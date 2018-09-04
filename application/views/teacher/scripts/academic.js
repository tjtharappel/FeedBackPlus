$('#courseddl').change(function (e){
    let id = $('#courseddl option:selected').val();
    $('#batchddl').children('option:not(:first)').remove();
    $('#batchddl').prop('disabled', 'disabled');
    $.post("<?=site_url('academic/getAcademics');?>"+`/${id}`)
        .done(function (data){
            data=JSON.parse(data);
            $.each(data, function() {
                $('#batchddl').append($("<option />").val(this.id).text(new Date(this.date).getFullYear()));
            });
            $('#batchddl').prop('disabled',false);
        });
});
$('#coursedetails').submit(function (e){
    e.preventDefault();
    let id = $('#courseddl option:selected').val();
    $.post("<?=site_url('academic/getSemesterDetails');?>"+`/${id}`)
        .done(function(data){
            $('#subjectlist').html(data);
        });
});

const ChooseTeacher = function (e) {
    id =  $(e).attr('data-id');
    $('#state').val(id);
    $.post('<?php echo site_url("ajax/getTeachers");?>').done(function( data ) {
        $.confirm({
            title: 'Choose Teacher',
            content:data,
            columnClass: 'col-md-12',
            buttons: {
                formSubmit: {
                    text: 'Ok',
                    btnClass: 'btn-blue',
                    action: function () {
                       
                        }
                },
              },
            onContentReady: function () {
                // bind to events
                var jc = this;
                this.$content.find('table').DataTable();
                this.$content.find('form').on('submit', function (e) {
                    // if the user submits the form by pressing enter in the field.
                    e.preventDefault();
                    jc.$$formSubmit.trigger('click'); // reference the button and click it
                    
                });
            }
        });
    });

}
const assign = function (e) {
    teacherId = $(e).attr('data-id');
    console.log(teacherId);
    subjectId ='subject'+$('#state').val();
    $("select[name="+subjectId+"]").append($("<option />").val(teacherId).text($(e).attr('data-name')));
    $("select[name="+subjectId+"] option:last-child").attr('selected', 'selected');
    console.log($("select[name="+subjectId+"]").attr('data-subjectid'));
}
let send = function (e) 
{

    $('.pair').each(function(i, obj) {
        let teacherId = $("[name= subject"+(i+1)+"] option:selected").val();
        let subjectId = $(obj).attr('data-subjectid');
        //let deptId = $('#departmentddl option:selected').val();
        //let courseId = $('#courseddl option:selected').val();
        let batchId = $('#batchddl option:selected').val();
        console.log(batchId);
        $.post('<?php echo site_url("ajax/assignsubjectstoteachers");?>',
        {
            batchId:batchId,
            teacherId:teacherId,
            subjectId:subjectId
        });
    });
    $.alert({
        title:"Subjects Assigned",
        content:"Subject Assignment Successful",

    });
    return false;
}
