<?php if(isset($deptFeedBack) && is_array($deptFeedBack)) :?>
<?php foreach($deptFeedBack as $item):?>
<div class="card border-primary mb-3">
  <div class="card-header"><?=@$item->name;?>- Overall Rating
  <div class="float-right"><a class="btn btn-success btn-sm" href="<?= site_url('admin/department/rating')."/$item->id";?>">View Detailed</a></td></div>
  </div>
  <div class="card-body">
    <h4 class="card-title">Rating Summary</h4>
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th>Rating Criteria</th>
                <th>Rating Score(Maximum Rating:5)
                </th>

            </tr>
        </thead>
        <tbody>
            
            <?php 
                $departmentId = $item->id; 
                $data = R::findAll('feedbackrecords',"departments_id = ?",[$departmentId]);
                $avgC =$avgK=$avgR= 0;
                if (empty($data)) {
                    echo "<tr class='table-danger'><td colspan=2 class='text-center text-danger'><i>No Rating Available</i></td></tr>";
                    
                }
                else
                {
                    foreach ($data as $dt) {
                        $avgC += $dt->communicationrating;
                        $avgK += $dt->subjectknowledgerating;
                        $avgR += $dt->classroominteractionrating;
                    }
                    echo "<tr><td>Communication Skill</td>";
                    echo"<td>".($avgC/count($data))??"No Rating Available";
                    echo "</td></tr>";
                    echo "<tr><td>Subject Knowledge</td><td>".($avgK/count($data))??"No Rating Available"."</td></tr>";
                    echo "<tr><td>Classroom Interaction</td><td>".($avgR/count($data))??"No Rating Available"."</td></tr>";
                }
            ?>
            </td>
        </tbody>
        <tfooter>
        <tr>
        <td class="text-left" >Overall Rating:
        <?php
        $avg = ($avgC + $avgK + $avgR)/3;
        if ($avg >3) echo '<span class="badge badge-success">Excellent</span>';
        else if ($avg >2.5)  echo '<span class="badge badge-primary">Ok</span>';
        else if(empty($data)) echo '<span class="badge badge-info">N/A</span>';
        else echo '<span class="badge badge-danger">Bad</span>';
        ?>
        </td>
        <td  class="text-right">Average calculated from <?php echo ((count($data)))??"0";?> Rating</td>
        </tr>
        </tfooter>
    </table>
  </div>
</div>
<?php endforeach;?>
<?php endif;?>