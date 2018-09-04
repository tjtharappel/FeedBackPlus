<div id="app">
<div class="card border-info mb-3">
  <div class="card-header">
  <h3 style="margin-bottom:1px">Students List</h3>
  </div>
  <div class="card-body">
      <table class="table table-hover table-striped" id="tbl1">
          <thead>
          <tr class="text-center">
              <th>Photo</th>
              <th>Name</th>
              <th>Mobile Number</th>
              <th>Email</th>
              <th>Department</th>
              <th>Course</th>
              <th>Actions</th>
          </tr>
          </thead>
          <tbody id="departments">
            <?php if(isset($students) && is_array($students)) :?>
            <?php foreach($students as $student):?>
            <tr class="text-center">
            <td><img id="profile" class="img-thumbnail float-right" src="<?= getSiteFrontendAsset("uploads/students/profilepic/$student->dpurl");?>" width="150" alt="profile picture" /></td>
            <td><?=($student->name)??"N/A";?></td>
            <td><?=($student->mobile)??"N/A";?></td>
            <td><?=($student->email)??"N/A";?></td>
            <td><?=((R::load('departments',(R::load('courses',$student->courses_id))->departments_id))->name)??"N/A";?></td>
            <td><?=((R::load('courses',$student->courses_id)))->name??"N/A";?></td>
            <td>
            <button onclick="removesubject(this)" class="btn btn-secondary btn-sm" data-id="<?=$student->id;?>">Remove <i class="fa fa-trash"> </i></button>
            <button onClick= "approve(this)" class="btn btn-secondary btn-sm" data-id="<?=$student->id;?>"> Approve <i class="fa fa-check" aria-hidden="true"></i></button>
            </td>
            </tr>
            <?php endforeach;?>
            <?php endif;?>
          </tbody>
      </table>
  </div>
</div>
</div>