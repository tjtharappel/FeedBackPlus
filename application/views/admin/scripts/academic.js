$('#academic').submit(function(e)
{
    e.preventDefault();
    var courseId = $('#courseddl option:selected').val();
    var strength = $('#strength').val();
    var date = $('#date').val();
    $.post( '<?php echo site_url("admin/academic/create");?>',{courseddl:courseId,strength:strength,date:date})
    .done(function( data ) {
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
    });
})