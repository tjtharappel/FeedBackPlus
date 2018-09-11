$(document).ready( function () {
    $('#tbl1').DataTable();
} );
const approve = function (e) {
    id =  $(e).attr('data-id');
    console.log(id);
    $('#app').html('<div class="text-center card" style="margin-bottom:20px">Loading<i class="fa fa-spinner fa-spin fa-2x" ></i></div>');
    $.post( "<?php echo site_url('admin/students/approved');?>", { Id:id } )
            .done(function (data){
                location.reload();
    });
}

const removesubject = function (e) {
    
    id = $(e).attr('data-id');
    $.post("<?php site_url('student/remove')?>",{Id:id}).done(function (){
        //location.reload();
    });
}