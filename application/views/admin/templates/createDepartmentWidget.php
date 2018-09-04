
<div class="card border-success mb-3">
  <div class="card-header"><b style="font-size: 20px">Add New Department</b>
      <form class="form-inline float-right" >
  <div class="form-group mx-sm-6 ">
      <input type="text" maxlength="100" class="form-control" id="deptname"  placeholder="New Department Name" name="name" />
  </div>
          <button type="button" class="btn btn-primary mb-2" id="newdept"> Add <i class="fa fa-plus" aria-hidden="true"></i></button>
</form>
  </div>
</div>
<div class="card border-info mb-3">
  <div class="card-header"><h3>Existing Departments</h3></div>
  <div class="card-body">
      <table class="table table-hover table-striped" id="tbl1">
          <thead>
          <tr>
              <th>Department Name</th>
              <th>Actions</th>
          </tr>
          </thead>
          <tbody id="departments">
              <?php if(isset($departments) && is_array($departments)):?>
              <?php foreach($departments as $item): ?> 
              <tr>
                  <td>
                      <?=$item->name;?>
                  </td>
                  <td>
                      <button onclick="removedept(this)" class="btn btn-secondary btn-sm" data-id="<?=$item->id;?>">Remove <i class="fa fa-trash"> </i></button>
                      <button onclick="addteacher(this)" class="btn btn-secondary btn-sm" data-id="<?=$item->id;?>">Teachers <i class="fa fa-users" aria-hidden="true"></i></button>
                      <button onClick="editdept(this)" class="btn btn-secondary btn-sm" data-id="<?=$item->id;?>"> Edit <i class="fa fa-pencil" aria-hidden="true"></i></button>
                      <button onClick='location.href="<?=site_url("admin/department/$item->id/courses");?>"' class="btn btn-secondary btn-sm" data-id="<?=$item->id;?>"> Offering Course <i class="fa fa-mortar-board" aria-hidden="true"></i></button>
                  </td>
              </tr>
              <?php endforeach;?>
              <?php endif; ?>
          </tbody>
      </table>
  </div>
</div>



