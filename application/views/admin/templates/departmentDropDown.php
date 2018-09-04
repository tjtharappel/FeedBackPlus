<div class="card  mb-3">
  <div class="card-header"><b style="font-size: 20px">Select Department</b>
      <select class="form-control" id="departmentddl">
      <option>--------SELECTED----------</option>
        <?php foreach($departments as $item):?>
            <option value="<?=$item->id;?>" <?php if(isset($deptId)) {echo ($item->id == $deptId)?'selected':'';}?>><?=$item->name;?></option>
        <?php endforeach;?>
      </select> 
  </div>
</div>
