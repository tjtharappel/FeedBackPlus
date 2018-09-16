<div class="card border-primary mb-3">
    <div class="card-header">Teacher Rating Summary</div>
    <div class="card-body">
        <table class="table table-hover table-stripped" id="tbl1">
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Subject</th>
                    <th>Semester</th>
                    <th>Name of The Student</th>
                    <th>Communication Rating</th>
                    <th>Subject Knowledge</th>
                    <th>Classroom Interaction</th>
                    <th>Remarks</th>
            </thead>
            <tbody>
                <?php if (isset($teachers) && is_array($teachers)) :?>
                <?php foreach ($teachers as $teacher):?>
                    <tr>
                    <td><?=$teacher->course?></td>

                    <td><?=$teacher->subject?></td>
                    <td><?=$teacher->semester?></td>
                    <td>XXXXXXXXXX</td>
                    <td><?=$teacher->communication;?></td>
                    <td><?=$teacher->subjectknowledge;?></td>
                    <td><?=$teacher->classroom?></td>
                    <td><?=(($teacher->remarks!=''))?$teacher->remarks:"N/A"?></td>
                    </tr>
                <?php endforeach;?>
                <?php endif;?>
            </tbody>
        </table>
        
    </div>
</div>