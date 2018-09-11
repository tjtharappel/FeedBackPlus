<div class="card border-primary mb-3" style="margin:10px 10px 10px 10px">
   <div class="card-header">Start an Academic Year</div>
   <div class="card-body">
      <form id="academic" class="form-inline" action="<?=site_url("academic/start");?> method="POST">
         <label for="departmentddl" style="margin-right:10px">Department:</label>
         <select id="departmentddl" name="departmentdd1" class="form-control" style="width:10rem" required>
         <option value>SELECT</option>
            <?php foreach($departments as $item):?>
            <option value="<?=$item->id;?>" <?php if(isset($deptId)) {echo ($item->id == $deptId)?'selected':'';}?>><?=$item->name;?></option>
            <?php endforeach;?>
         </select>
         <label for="pwd" style="margin-left:10px;margin-right:10px">Course:</label>
         <select id='courseddl' name='courseddl' class="form-control" style="width:10rem" required>
            <option value>SELECT</option>
            <?php foreach($courses as $item):?>
            <option value="<?=$item->id;?>" <?php if(isset($course->id)) {echo ($item->id == $course->id)?'selected':'';}?>><?=$item->name;?></option>
            <?php endforeach;?>
         </select>
         <label for="pwd" style="margin-left:10px">Batch Strength:</label>
         <input type="number" min=1 required="required" class="form-control" name="strength" id="strength" />
         <label for="pwd" style="margin-left:10px;margin-right:5px">Starting Date:</label>
         <input type="date" required="required" class="form-control" name="date" id="date"/>
         <button type="submit" style="margin-left:10px" class="btn btn-primary ">Start</button>
      </form>
   </div>
</div>