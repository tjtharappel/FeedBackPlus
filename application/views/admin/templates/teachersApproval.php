
<div class="card border-info mb-3">
  <div class="card-header"><h3 style="margin-bottom:1px">Teacher Details</h3>
  </div>
  <div class="card-body">
      <table class="table table-hover table-striped" id="tbl1">
          <thead>
          <tr class="text-center">
              <th>Photo</th>
              <th>Name</th>
              <th>Mobile</th>
              <th>Email</th>
              <th>Department</th>
              <th>Actions</th>
          </tr>
          </thead>
          <tbody id="departments">
              <?php if (isset($teachers) && is_array($teachers)):?>
              <?php foreach ($teachers as $item): ?> 
              <tr class="text-center">
                  <td>
                      <?php if (isset($item->dpurl) && !empty($item->dpurl)):?>
                      <img src='<?php echo getSiteFrontendAsset("uploads/teachers/profilepic/$item->dpurl");?>' class="img-thumbnail" width="150" alt="profile dp"/>
                      <?php else:?>
                      <img src='<?php echo getSiteFrontendAsset("images/nodp.jpg");?>' class="img-thumbnail" width="150" alt="profile dp"/>
                      <?php endif;?>
                  </td>
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
                      <?=(R::load('departments',$item->departments_id))->name;?>
                  </td>
                  <td>
                      <button onclick="removedept(this)" class="btn btn-secondary btn-sm" data-id="<?=$item->id;?>">Remove <i class="fa fa-trash"> </i></button>
                      <a href='<?=site_url("Registration/teacherloginGrant/$item->id");?>' class="btn btn-secondary btn-sm" >Approve <i class="fa fa-user" aria-hidden="true"></i></a>
                  </td>
              </tr>
              <?php endforeach;?>
              <?php endif; ?>
          </tbody>
      </table>
  </div>
</div>


