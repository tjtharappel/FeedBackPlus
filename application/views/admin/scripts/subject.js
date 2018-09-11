$(document).ready( function () {
    $('#tbl1').DataTable();
} );
$('#departmentddl').change(function (e){
    let deptId = $('#departmentddl option:selected').val();
    $('#courseddl').children('option:not(:first)').remove();
    $('#courseddl').prop('disabled', 'disabled');
    $('#app').html("<div class='card text-white bg-secondary mb-3 text-center' style='padding-bottom:30em'><i class='text-success'>please select a course then only you can add subject</i></div>");
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
    $('#app').html('<div class="text-center card" style="margin-bottom:15px">Loading<i class="fa fa-spinner fa-spin fa-2x" ></i></div>');
    $.post( '<?php echo site_url("Ajax/getAllSubjectsBy");?>'+`/${courseId}`)
    .done(function( data ) {
        $('#app').html(data);
        $('#tbl1').DataTable();

    });
});
$('#dept').submit(function(e)
{
    e.preventDefault();
    $.ajax({
        url: '<?=site_url("subjects/add");?>',                           // Any URL
        data: $('#dept').serialize(),                 // Serialize the form data
        success: function (data) {                        // If 200 OK
           var dt=JSON.parse(data);
           if(dt.status ==true)
           {
            $.confirm({
                title: 'Success !',
                content: dt.message,
                buttons: {
                    Ok: function () {
                    window.location.reload();
                }
                }
            });
           }
           else
           {
            $.alert({
            title: 'Faild',
            type: 'red',
            content: dt.message
            });
        }
        }
        
     });
})
const removesubject = function (e) {

    let subjectId = $(e).attr('data-id');
    $.post("<?=site_url('subjects/remove');?>",{Id:subjectId}).done(function(e){
       location.reload();
    });
};
const editsubject = function(e) {

    let subjectId = $(e).attr('data-id');
    location.href=`<?=site_url('admin/subject/edit');?>/${subjectId}`;
    
}