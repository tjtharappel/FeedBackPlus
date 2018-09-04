<div class="">
         <label for="departmentddl" >Department:</label>
         <select id="departmentddl" name="departmentdd1" class="form-control" >
         <option value="-1">SELECT</option>
            <?php foreach($departments as $item):?>
            <option value="<?=$item->id;?>" <?php if(isset($deptId)) {echo ($item->id == $deptId)?'selected':'';}?>><?=$item->name;?></option>
            <?php endforeach;?>
         </select>
         <label for="pwd" >Course:</label>
         <select id='courseddl' name='courseddl' class="form-control" >
            <option>SELECT</option>
            <?php foreach($courses as $item):?>
            <option value="<?=$item->id;?>" <?php if(isset($course->id)) {echo ($item->id == $course->id)?'selected':'';}?>><?=$item->name;?></option>
            <?php endforeach;?>
         </select>
</div>
