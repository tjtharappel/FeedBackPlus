
$('#departmentddl').change(function (e){
    let deptId = $('#departmentddl option:selected').val();
    $('#courseddl').children('option:not(:first)').remove();
    $('#courseddl').prop('disabled', 'disabled');
    $.post( '<?php echo site_url("ajax/getAllCoursesBy");?>'+`/${deptId}`)
    .done(function( data ) {
        data=JSON.parse(data);
        $.each(data, function() {
            $('#courseddl').append($("<option />").val(this.id).text(this.name));
        });
        $('#courseddl').prop('disabled',false);
    });
});
$('#courseddl').change(function (e){
    
    let courseId = $('#courseddl option:selected').val();
    $('#semesterddl').prop('disabled', 'disabled');
    $('#semesterddl').children('option:not(:first)').remove();
    $.post( '<?php echo site_url("Ajax/getSemesters");?>'+`/${courseId}`)
    .done(function( data ) {
        
        data=JSON.parse(data);
        for(let i=1;i<=data.duration*2;i++) 
            {
                $('#semesterddl').append($("<option />").val(i).text("SEMESTER "+i));
            }
        $('#semesterddl').prop('disabled',false);
    });
});
$('#coursedetails').submit(function(e)
{
    e.preventDefault();
    $.ajax({
        url: '<?=site_url("ajax/coursedetails");?>',                           // Any URL
        data: $('#coursedetails').serialize(),                 // Serialize the form data
        success: function (data) {   
            $('#subjectlist').html(data);     
        }     
     });
     $('#courseddl').prop('disabled', 'disabled');
     $('#departmentddl').prop('disabled', 'disabled');
     $('#semesterddl').prop('disabled', 'disabled');
     $('#sub1').prop('disabled','disabled');
})
$('#unlock').click(function(){
    $('#courseddl').prop('disabled', false);
    $('#departmentddl').prop('disabled', false);
    $('#semesterddl').prop('disabled', false);
    $('#courseddl').children('option:not(:first)').remove();
    $('#semesterddl').children('option:not(:first)').remove();
    $('#subjectlist').html(`<div id="subjectlist">
    <div class="card border-secondary mb-3" style="margin:30px 10px 10px 10px">
      <div class="card-header"><h3>Subject List</h3></div>
      <div class="card-body">
        <i class="card-text text-success">please lock course details then only you can assign subjects</i>
      </div>
    </div>
    </div>`);
    $('#sub1').prop('disabled',false);
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
                cancel: function () {
                    //close
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
    let deptId = $('#departmentddl option:selected').val();
    let courseId = $('#courseddl option:selected').val();
    let sem = $('#semesterddl option:selected').val();

    $('.pair').each(function(i, obj) {
        let teacherId = $("[name= subject"+(i+1)+"] option:selected").val();
        let subjectId = $(obj).attr('data-subjectid');
        
        $.post('<?php echo site_url("ajax/assignsubjectstoteachers");?>',
        {
            departmentId:deptId,
            courseId:courseId,
            semesterId:sem,
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
