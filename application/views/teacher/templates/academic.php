<div class="card border-primary mb-3" style="margin:10px 10px 10px 10px">
   <div class="card-header"></div>
   <div class="card-body">
      <form class="form-inline" id="coursedetails">
         <label for="pwd" style="margin-left:10px;margin-right:10px">Course:</label>
         <select id='courseddl' name='courseId' class="form-control" style="width:12rem" required>
            <option value>SELECT</option>
            <?php if(isset($courses) && is_array($courses) ):?>
            <?php foreach($courses as $course):?>
            <option value="<?=$course->id?>"><?=$course->name;?></option>
            <?php endforeach;?>
            <?php endif;?>
         </select>
         <label for="pwd" style="margin-left:10px;margin-right:10px">Batch:</label>
         <select id='batchddl' name='batchddl' class="form-control" style="width:12rem;margin-right:10px" required>
            <option value>SELECT</option>
         </select>
         <button type="submit" class="btn btn-primary" style="margin-right:10px">Semester Details <i class="fa fa-search"> </i></select>
      </form>
   </div>
</div>
<div id="subjectlist">
   <div class="card border-secondary " style="margin:30px 10px 10px 10px">
      <div class="card-header">
         <p>Subject List</p>
      </div>
      <div class="card-body">
         <i class="card-text text-success">please lock course details then only you can assign subjects</i>
      </div>
   </div>
</div>
