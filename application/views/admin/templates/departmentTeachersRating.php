<div class="card border-primary mb-3">
    <div class="card-header">Teacher Rating Summary</div>
    <div class="card-body">
        <table class="table table-hover table-stripped">
            <thead>
                <tr>
                    <th>Teacher Name</th>
                    <th>Communication Rating</th>
                    <th>Subject Knowledge</th>
                    <th>Classroom Interaction</th>
                    <th>Actions</th>
            </thead>
            <tbody>
            
                <?php if (isset($teachers) && is_array($teachers)) :?>
                <?php foreach ($teachers as $teacher):?>
                    <tr>
                    <td><?=$teacher->name?></td>
                    <td><?=$teacher->communication;?></td>
                    <td><?=$teacher->subjectknowledge;?></td>
                    <td><?=$teacher->classroom?></td>
                    <td><a class="btn btn-info btn-sm" href='<?=site_url("admin/teacher/rating") ."/$teacher->teachers_id";?>'>View Details</a></td>
                    </tr>
                <?php endforeach;?>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</div>