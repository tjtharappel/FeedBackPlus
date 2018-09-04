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
    $('#academic_year').children('option:not(:first)').remove();
    $('#academic_year').prop('disabled', 'disabled');
    $.post( '<?php echo site_url("ajax/getacademic");?>'+`/${courseId}`)
    .done(function( data ) {
        data=JSON.parse(data);
        $.each(data, function() {
            $('#academic_year').append($("<option />").val(this.id).text((new Date(this.date)).getFullYear()));
        });
        $('#academic_year').prop('disabled',false);
    });
});

