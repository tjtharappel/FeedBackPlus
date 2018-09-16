<div class="card border-primary mb-3">
    <div class="card-header">Teacher Rating Summary</div>
    <div class="card-body">
        <table class="table table-hover table-stripped text-center">
            <thead>
                <tr>
                    <th>Teacher Name</th>
                    <th>Communication Rating</th>
                    <th>Subject Knowledge</th>
                    <th>Classroom Interaction</th>
                    <th>Overall Status</th>
                    <th>Actions</th>

            </thead>
            <tbody>
            
                <?php if (isset($teachers) && is_array($teachers)) :?>
                <?php $avg=0.0; ?>
                <?php foreach ($teachers as $teacher):?>
                    <tr>
                    <td><?=$teacher->name?></td>
                    <td><?=$teacher->communication;?></td>
                    <td><?=$teacher->subjectknowledge;?></td>
                    <td><?=$teacher->classroom?></td>
                    <td>
                    <?php $avg = ($teacher->communication + $teacher->subjectknowledge + $teacher->classroom)/3; ?>
                    <?php if ($avg >3) echo '<span class="badge badge-success">Excellent</span>';
                        else if ($avg >2.5)  echo '<span class="badge badge-warning">Ok</span>';
                        else echo '<span class="badge badge-danger">Bad</span>';
                    ?>
                    </td>
                    <td><a class="btn btn-info btn-sm" href='<?=site_url("admin/teacher/rating") ."/$teacher->teachers_id";?>'>View Details</a></td>
                    </tr>
                <?php endforeach;?>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</div>