
<div id="app">
<div class="card border-info mb-3">
  <div class="card-header"><h3 style="margin-bottom:1px">Existing Course</h3>
      <form class="form-inline float-right" >
  
          <a href="<?=site_url("admin/department/$deptId/courses/new-course");?>"" class="btn btn-primary btn-rounded mb-2" > Add New Course <i class="fa fa-plus" aria-hidden="true"></i></a>
</form>
  </div>
  <div class="card-body">
      <table class="table table-hover table-striped" id="tbl1">
          <thead>
          <tr>
              <th>Course Name</th>
              <th>Degree Level</th>
              <th>Duration (in year)</th>
              <th>Exam Pattern</th>
              <th>Actions</th>
          </tr>
          </thead>
          <tbody id="departments">
            <?php if(isset($courses) && is_array($courses)) :?>
            <?php foreach($courses as $course):?>
            <tr>
            <td><?=($course->name)??"N/A";?></td>
            <td><?=($course->type)??"N/A";?></td>
            <td><?=($course->duration)??"N/A";?></td>
            <td><?=($course->pattern)??"N/A";?></td>
            <td>
            <button onclick="removecourse(this)" class="btn btn-secondary btn-sm" data-id="<?=$course->id;?>">Remove <i class="fa fa-trash"> </i></button>
            <button onclick="addSubjects(this)" class="btn btn-secondary btn-sm" data-id="<?=$course->id;?>">Add Subjects<i class="fa fa-book" aria-hidden="true"></i></button>
            <button onClick= "editcourse(this)" class="btn btn-secondary btn-sm" data-id="<?=$course->id;?>"> Edit <i class="fa fa-pencil" aria-hidden="true"></i></button>
            </td>
            </tr>
            <?php endforeach;?>
            <?php endif;?>
          </tbody>
      </table>
  </div>
</div>
</div>

