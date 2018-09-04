$(document).ready( function () {
    $('#tbl1').DataTable();
} );
$(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile').attr('src', e.target.result);
            };
    
            reader.readAsDataURL(input.files[0]);
        }
    };
    

    $("#file-upload").on('change', function(){
        
        readURL(this);
    });
    
});
$('#profile').click(function(){ 
    $('#file-upload').trigger('click'); 
});

const removedept = function(e)
{
    id =  $(e).attr('data-id');
    $.confirm({
                title: 'caution ',
                icon:'fa fa-warning',
                columnClass: 'col-md-6 col-offset-md-4',
                content: 'Are you sure you want to do this ?\n removeing a teacher will cause DISTORY ALL DATA RELATED TO THAT teacher',
                buttons: {
                    Yes: {
                        btnClass:'btn btn-danger',
                        action: function () {
                        $.post( "<?php echo site_url('teacher/remove');?>", { Id:id } )
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
}
const setHOD = function (e) {
    
    teacherid =  $(e).attr('data-teacherId');
    deptId = $(e).attr('data-deptId');
    console.log(teacherid);
    $.post( "<?php echo site_url('department/updateHOD');?>", { deptId:deptId,teacherId:teacherid } )
                    .done(function (data){
                        
                        var dt = JSON.parse(data);
                        if(dt.status)
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
                    });
                
};