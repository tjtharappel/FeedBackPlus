<div class="card border-info mb-3">
  <div class="card-header"><h3>New Teacher Details</h3></div>
  <div class="card-body">
  <img id="profile" class="img-thumbnail float-right" src="<?= getSiteFrontendAsset('images/profile_1x.png');?>" width="150" style="margin:10px" alt="profile picture" />
          <form id="dept"  action='<?= site_url("admin/teachers/add");?>' method="POST" enctype="multipart/form-data" >
                    <fieldset>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter your name" required="required" name="name" id="name"
                            />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter your email" required="required" id="email"
                            />
                        </div>
                        <div class="form-group">
                                <label for="exampleInputEmail1">Mobile</label>
                                <input type="text" class="form-control" name="mobile" aria-describedby="emailHelp" placeholder="Enter your mobile number" required="required" id="mobile"
                                />
                            </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required="required" id="password"/>
                        </div>

                        <div class="form-group">
                            <label for="exampleTextarea">Address</label>
                            <textarea name="address" class="form-control" id="address" rows="3" required="required"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Profile Picture</label>
                            <input type="file" id="file-upload" style="display:none" class="form-control-file" name="dpurl"  aria-describedby="fileHelp" required="required"/>
                        </div>
                        <fieldset class="form-group">
                            <label for="exampleInputFile">Gender</label>
                            <div class="form-check">
                                <label class="form-check-label"></label>
                                <input type="radio" class="form-check-input" name="gender"  value="male" checked="" />Male <br />
                                <input type="radio" class="form-check-input" name="gender"  value="female" checked="" />Female
                            </div>
                            <input type="hidden" id="deptId" name="deptId" value="<?=$deptid?>"/>
                        </fieldset>
                        <button type="button" onclick='window.location.href="<?=site_url("admin/department/$deptid");?>"' id="btnback" class="btn btn-primary float-left">Back to Department<span class="glyphicon glyphicon-chevron-left"></span></button>
                        <button type="submit" id="btnSubmit" class="btn btn-primary float-right">Add<span class="glyphicon glyphicon-chevron-right"></span></button>
                    </fieldset>
                </form>

  </div>
</div>
