<div class="">
         <label for="departmentddl" >Department:</label>
         <select id="departmentddl" name="departmentdd1" class="form-control" >
         <option value="-1">SELECT</option>
            <?php foreach($departments as $item):?>
            <option value="<?=$item->id;?>" <?php if(isset($deptId)) {echo ($item->id == $deptId)?'selected':'';}?>><?=$item->name;?></option>
            <?php endforeach;?>
         </select>
</div>
