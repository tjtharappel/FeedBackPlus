<div class="card border-primary mb-3" style="margin:10px 10px 10px 10px">
   <div class="card-header"></div>
   <div class="card-body">
      <div class="form-inline">
         <label for="departmentddl" style="margin-right:10px">Department:</label>
         <select id="departmentddl" name="departmentdd1" class="form-control" style="width:25rem">
         <option value="-1">SELECT</option>
            <?php foreach($departments as $item):?>
            <option value="<?=$item->id;?>" <?php if(isset($deptId)) {echo ($item->id == $deptId)?'selected':'';}?>><?=$item->name;?></option>
            <?php endforeach;?>
         </select>
         <label for="pwd" style="margin-left:10px;margin-right:10px">Course:</label>
         <select id='courseddl' name='courseddl' class="form-control" style="width:25rem">
            <option>SELECT</option>
            <?php foreach($courses as $item):?>
            <option value="<?=$item->id;?>" <?php if(isset($course->id)) {echo ($item->id == $course->id)?'selected':'';}?>><?=$item->name;?></option>
            <?php endforeach;?>
         </select>
      </div>
   </div>
</div>
