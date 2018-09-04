<div class="card border-info mb-3">
  <div class="card-header"><h3>Student Details</h3></div>
  <div class="card-body">
  <?php if(isset($message)&&isset($type)):?>
  <div class="alert alert-dismissible alert-<?=$type?>">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong><?=$message;?></strong> 
</div>
<?php endif; ?>
  <img id="profile" class="img-thumbnail float-right" src="<?= getSiteFrontendAsset('images/profile_1x.png');?>" width="150" style="margin:10px" alt="profile picture" />
          <form id="registration"  action='<?= site_url("welcome/addstudent");?>' method="POST" enctype="multipart/form-data" >
                    <fieldset>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter your name" required="required" name="name" id="name"
                             value="<?=($student->name)??''?>"/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter your email" required="required" id="email"
                            value="<?=($student->email)??''?>"/>
                        </div>
                        <div class="form-group">
                                <label for="exampleInputEmail1">Mobile</label>
                                <input type="text" class="form-control" name="mobile" aria-describedby="emailHelp" placeholder="Enter your mobile number" required="required" id="mobile"
                                value="<?=($student->mobile)??''?>"/>
                            </div>
                        <?php require_once ('dept_course_ddl.php');?>
                        <label for="pwd" >Joining Academic Year:</label>
                            <select id='academic_year' name='year' class="form-control" >
                                <option value>SELECT</option>
                            </select>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required="required" id="password" />
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleTextarea">Address</label>
                            <textarea name="address" class="form-control" id="address" rows="4" required="required"><?=($student->address)??''?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile"></label>
                            <input type="file" id="file-upload" style="display:none" class="form-control-file" name="dpurl"  aria-describedby="fileHelp" required="required"/>
                        </div>
                        <fieldset class="form-group">
                            <label for="exampleInputFile">Gender</label>
                            <div class="form-check">
                                <label class="form-check-label"></label>
                                <input type="radio" class="form-check-input" name="gender"  value="male" <?php if(isset($student->gender) && ($student->gender=='Male')) echo 'checked'?> />Male <br />
                                <input type="radio" class="form-check-input" name="gender"  value="female" <?php if(isset($student->gender) && ($student->gender=='Male')) echo 'checked'?> />Female
                            </div>
                           <input type="hidden" name="studentId" value="<?=($student->id)??'';?>" />
                        </fieldset>
                        <button type="submit" id="btnSubmit" class="btn btn-primary float-right">Register Now<span class="glyphicon glyphicon-chevron-right"></span></button>
                    </fieldset>
                </form>
  </div>
</div>
