<div>
<div class="card">
<div class="card-head">Teachers List</div>
<div class="card-body">
      <table class="table table-hover table-striped" id="tbl1">
          <thead>
          <tr>
              <th>Name</th>
              <th>Mobile</th>
              <th>Email</th>
              <th>Department</th>
              <th>Action</th>
          </tr>
          </thead>
          <tbody id="departments">
              <?php if (isset($teachers) && is_array($teachers)):?>
              <?php foreach ($teachers as $item): ?> 

              <tr>
                  <td>
                      <?=$item->name;?>
                  </td>
                  <td>
                      <?=$item->mobile;?>
                  </td>
                  <td>
                      <?=$item->email;?>
                  </td>
                  <td>
                        <?= ((R::load('departments',$item->departments_id))->name)??"";?>
                    </td>   
                  <td>
                      <button onclick="assign(this)" class="btn btn-secondary btn-sm" data-id="<?=$item->id;?>" data-name="<?=$item->name;?>">Assign</button>
                  </td>
              </tr>
              <?php endforeach;?>
              <?php endif; ?>
          </tbody>
      </table>
  </div>
</div>
</div>



