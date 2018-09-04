<div id="app">
<div class="card border-info mb-3">
  <div class="card-header"><h3 style="margin-bottom:1px">Existing subject</h3>
      <form class="form-inline float-right" >
  
          <a href="<?=site_url("admin/course/$course->id/subjects/new-subject");?>"" class="btn btn-primary btn-rounded mb-2" > Add New subject <i class="fa fa-plus" aria-hidden="true"></i></a>
</form>
  </div>
  <div class="card-body">
      <table class="table table-hover table-striped" id="tbl1">
          <thead>
          <tr class="text-center">
              <th>Subject Code</th>
              <th>Subject Name</th>
              <th>Semester</th>
              <th>Core/Complementary/Elective</th>
              <th>Exam Type</th>
              <th>Actions</th>
          </tr>
          </thead>
          <tbody id="departments">
            <?php if(isset($subjects) && is_array($subjects)) :?>
            <?php foreach($subjects as $subject):?>
            <tr class="text-center">
            <td><?=($subject->code)??"N/A";?></td>
            <td><?=($subject->name)??"N/A";?></td>
            <td><?=($subject->semester)??"N/A";?></td>
            <td><?=($subject->type)??"N/A";?></td>
            <td><?=($subject->examtype)??"N/A";?></td>
            <td>
            <button onclick="removesubject(this)" class="btn btn-secondary btn-sm" data-id="<?=$subject->id;?>">Remove <i class="fa fa-trash"> </i></button>
            <button onClick= "editsubject(this)" class="btn btn-secondary btn-sm" data-id="<?=$subject->id;?>"> Edit <i class="fa fa-pencil" aria-hidden="true"></i></button>
            </td>
            </tr>
            <?php endforeach;?>
            <?php endif;?>
          </tbody>
      </table>
  </div>
</div>
</div>