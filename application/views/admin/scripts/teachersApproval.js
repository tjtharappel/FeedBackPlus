$(document).ready( function () {
    $('#tbl1').DataTable();
} );
const removedept = function (e) {
    let teacherId = $(e).attr('data-id');
    $.post("<?=site_url('teacher/remove');?>",{Id:teacherId}).done(function(){
        location.reload();
    });
} 