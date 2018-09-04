$(document).ready( function () {
    $('#tbl1').DataTable();
    
} );
$('#departmentddl').change(function (e){
    let deptId = $('#departmentddl option:selected').val();
    $('#app').html('<div class="text-center card" style="margin-bottom:15px">Loading<i class="fa fa-spinner fa-spin fa-2x" ></i></div>');
    $.post( '<?php echo site_url("courses/getCourseBy");?>'+`/${deptId}`)
    .done(function( data ) {
        $('#app').html(data);
        $('#tbl1').DataTable();

    });
});
const removecourse = function(e) {
    id =  $(e).attr('data-id');
    console.log(e);
    $.confirm({
                title: 'caution ',
                icon:'fa fa-warning',
                columnClass: 'col-md-6 col-offset-md-4',
                content: 'Are you sure you want to do this ?\n Deleteing department will cause DISTORY ALL DATA RELATED TO THE COURSE',
                buttons: {
                    Yes: {
                        btnClass:'btn btn-danger',
                        action: function () {
                        $('#app').html('<div class="text-center card" style="margin-bottom:20px">Loading<i class="fa fa-spinner fa-spin fa-2x" ></i></div>');                        
                        $.post( "<?php echo site_url('courses/remove');?>", { Id:id } )
                        .done(function (data){
                            location.reload();
                        });
                    }},
                    No :{
                        btnClass:'btn btn-success',
                        action:function(){ $.alert('Operation canceled by user');}
                    }
                }
                
            });
};
const editcourse = function (e) {
    
    id =  $(e).attr('data-id');
    location.href='<?=site_url("admin/course/'+id+'/edit");?>';
};
const addSubjects = function (e) {

    id =  $(e).attr('data-id');
    location.href='<?=site_url("admin/course/'+id+'/subjects");?>';
}