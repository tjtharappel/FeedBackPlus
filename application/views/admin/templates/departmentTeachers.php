
<div class="card border-info mb-3">
  <div class="card-header"><h3 style="margin-bottom:1px">Department Teachers</h3>
      <form class="form-inline float-right" >
  
          <a href='<?=site_url("admin/department/$deptid/new-teacher/");?>' class="btn btn-primary mb-2" > Add Teacher <i class="fa fa-plus" aria-hidden="true"></i></a>
</form>
  </div>
  <div class="card-body">
      <table class="table table-hover table-striped" id="tbl1">
          <thead>
          <tr>
              <th>Photo</th>
              <th>Name</th>
              <th>Mobile</th>
              <th>Email</th>
              <th>Actions</th>
          </tr>
          </thead>
          <tbody id="departments">
              <?php if (isset($teachers) && is_array($teachers)):?>
              <?php foreach ($teachers as $item): ?> 
              <?php if(isset($hodId) && $item->id == $hodId) :?>
                    <?php 
                    $flag1 ='<span class="badge badge-pill badge-success">HOD</span>';
                    $flag2 =''
                    ?>
                <?php else:?>
                <?php 
                $flag1 ='';
                $flag2 ='<button onclick="setHOD(this)" class="btn btn-secondary btn-sm" data-deptId="'.$item->departments_id.'" data-teacherId="'.$item->id.'"> promot to HOD<i class="fa fa-level-up"> </i></button>';
                ?>
             <?php endif;?>
              <tr>
                  <td>
                      <?php if (isset($item->dpurl) && !empty($item->dpurl)):?>
                      <img src='<?php echo getSiteFrontendAsset("uploads/teachers/profilepic/$item->dpurl");?>' class="img-thumbnail" width="150" alt="profile dp"/>
                      <?php else:?>
                      <img src='<?php echo getSiteFrontendAsset("images/nodp.jpg");?>' class="img-thumbnail" width="150" alt="profile dp"/>
                      <?php endif;?>
                  </td>
                  <td>
                      <?=$item->name;?>
                        <?=$flag1;?>
                  </td>
                  <td>
                      <?=$item->mobile;?>
                  </td>
                  <td>
                      <?=$item->email;?>
                  </td>
                  <td>
                      <button onclick="removedept(this)" class="btn btn-secondary btn-sm" data-id="<?=$item->id;?>">Remove <i class="fa fa-trash"> </i></button>
                      <a href='<?=site_url("admin/teacher/$item->id/profile");?>' class="btn btn-secondary btn-sm" >View /Edit Profile <i class="fa fa-user" aria-hidden="true"></i></a>
                      <?php echo $flag2;?>
                  </td>
              </tr>
              <?php endforeach;?>
              <?php endif; ?>
          </tbody>
      </table>
  </div>
</div>


