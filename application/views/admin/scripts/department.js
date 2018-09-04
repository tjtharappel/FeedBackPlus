$(document).ready( function () {
    $('#tbl1').DataTable();
} );

$('#newdept').click(function (){
    var department = $('#deptname').val();
    $('#deptname').val('');
    $.post( "<?php echo site_url('department/create');?>", { name:department } )
        .done(function( data ) {
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
});
const removedept = function(e) {
    id =  $(e).attr('data-id');
    $.confirm({
                title: 'caution ',
                icon:'fa fa-warning',
                columnClass: 'col-md-6 col-offset-md-4',
                content: 'Are you sure you want to do this ?\n Deleteing department will cause DISTORY ALL DATA RELATED TO THE DEPARTMENT',
                buttons: {
                    Yes: {
                        btnClass:'btn btn-danger',
                        action: function () {
                        $.post( "<?php echo site_url('department/remove');?>", { Id:id } )
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

const addteacher = function (e) {
    
    id =  $(e).attr('data-id');
    location.href='<?=site_url("admin/department");?>'+`\\${id}`;
};
const editdept =function (e) {

    id =  $(e).attr('data-id');
    $.confirm({
        title: 'Change Department Name',
        content: '' +
        '<form action="" class="formName">' +
        '<div class="form-group">' +
        '<label>New Name</label>' +
        '<input type="text" placeholder="department name" class="name form-control" required />' +
        '</div>' +
        '</form>',
        buttons: {
            formSubmit: {
                text: 'Submit',
                btnClass: 'btn-blue',
                action: function () {
                    var name = this.$content.find('.name').val();
                    if(!name){
                        $.alert('provide a valid name');
                        return false;
                    }
                    $.post( "<?php echo site_url('department/edit');?>", { Id:id,name:name } )
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
                }
            },
            cancel: function () {
                //close
            },
        },
        onContentReady: function () {
            // bind to events
            var jc = this;
            this.$content.find('form').on('submit', function (e) {
                // if the user submits the form by pressing enter in the field.
                e.preventDefault();
                jc.$$formSubmit.trigger('click'); // reference the button and click it
            });
        }
    });
}
