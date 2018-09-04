<div class="card border-info mb-3">
  <div class="card-header"><h3 style="margin-bottom:1px">Assign Subjects</h3>
  </div>
  <div class="card-body">
      <form id="final" method="" action="#" onsubmit="return send(this)">
      <table class="table table-hover table-striped" id="tbl1">
          <thead>
          <tr class="text-center">
              <th>Subject Code</th>
              <th>Subject Name</th>
              <th>Core/Complementary/Elective</th>
              <th>Exam Type</th>
              <th>Assign Teacher</th>
          </tr>
          </thead>
          <tbody id="departments">
            <?php if(isset($subjects) && is_array($subjects)) :?>
            <?php foreach($subjects as $subject):?>
            <tr class="text-center">
            <td><?=($subject->code)??"N/A";?></td>
            <td><?=($subject->name)??"N/A";?></td>
            <td><?=($subject->type)??"N/A";?></td>
            <td><?=($subject->examtype)??"N/A";?></td>
            <td>
            <div class="input-group">
            <select class="form-control pair" data-teacherId="" name="subject<?=$subject->id;?>" data-subjectId= "<?=$subject->id;?>" required > 
              <option value>SELECT</option>
              <?php foreach($teachers as $teacher):?>
                <option value="<?=$teacher->id;?>"><?=$teacher->name;?></option>
              <?php endforeach; ?>
            </select>
            <button type="button" onClick= "ChooseTeacher(this)" class="btn btn-secondary btn-sm" data-id="<?=$subject->id;?>">  <i class="fa fa-user-o fa-2x" aria-hidden="true"></i></button>
            </div>
            </td>
            </tr>
            <?php endforeach;?>
            <?php endif;?>
          </tbody>
      </table>
      <input type="hidden" name="subject" value="" id="state"/>
      <button class="btn btn-primary float-right" type="submit"> Update <i class="fa fa-upload">  </i></button>
    </form>
  </div>
</div>
