<div class="card border-primary mb-3" style="margin:10px 10px 10px 10px">
   <div class="card-header"></div>
   <div class="card-body">
      <form class="form-inline" id="coursedetails">
      <label for="departmentddl" style="margin-right:10px">Department:</label>
         <select id="departmentddl" name="departmentId" class="form-control" style="width:12rem" required>
         <option value>SELECT</option>
            <?php foreach($departments as $item):?>
            <option value="<?=$item->id;?>" <?php if(isset($deptId)) {echo ($item->id == $deptId)?'selected':'';}?>><?=$item->name;?></option>
            <?php endforeach;?>
         </select>
         <label for="pwd" style="margin-left:10px;margin-right:10px">Course:</label>
         <select id='courseddl' name='courseId' class="form-control" style="width:12rem" required>
            <option value>SELECT</option>
            
         </select>
         <label for="pwd" style="margin-left:10px;margin-right:10px">Semester:</label>
         <select id='semesterddl' name='semester' class="form-control" style="width:12rem;margin-right:10px" required>
            <option value>SELECT</option>
         </select>
         <button type="submit" class="btn btn-primary" style="margin-right:10px">Lock <i class="fa fa-lock"> </i></select>
         <button type="reset" id="unlock" class="btn btn-success">Unlock <i class="fa fa-unlock "> </i></select>
    </form>
   </div>
</div>
<div id="subjectlist">
<div class="card border-secondary mb-3" style="margin:30px 10px 10px 10px">
  <div class="card-header"><h3>Subject List</h3></div>
  <div class="card-body">
    <i class="card-text text-success">please lock course details then only you can assign subjects</i>
  </div>
</div>
</div>

