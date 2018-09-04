<div class="card border-info mb-3">
  <div class="card-header"><h3>Subject Details</h3></div>
  <div class="card-body">
          <form id="dept"  action='<?= site_url("courses/create");?>' method="POST" enctype="multipart/form-data" >
                    <fieldset>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name of the course</label>
                            <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="course name" required="required" name="name" id="name"
                             value="<?=($course->name)??'';?>" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Duration (Year)</label>
                            <input type="number" min=0 max=6 class="form-control" name="duration" aria-describedby="course duration" placeholder="duration in years" required="required" 
                            value="<?=($course->duration)??'';?>"/>
                        </div>
                        <div class="form-group">
                                <label for="exampleInputEmail1">Type</label>
                                <select id="courseType" name="type" required="" class="form-control">
                                
                                    <option>----SELECT-------</option>
                                    <option value="UG" <?=(isset($course) && $course->type== 'UG')?'selected':'';?>>Under Graduate</option>
                                    <option value="PG" <?=(isset($course) && $course->type== 'PG')?'selected':'';?>>Post Graduate</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                        
                        <fieldset class="form-group">
                            <label for="exampleInputFile">Examination Pattern</label>
                            <div class="form-check">
                                <label class="form-check-label"></label>
                                <input type="radio" class="form-check-input" name="pattern"  value="semester" <?=(isset($course) && $course->pattern== 'semester')?'checked':'';?> />Semester<br />
                                 <input type="radio" class="form-check-input" name="pattern"  value="year"  <?=(isset($course) && $course->pattern== 'year')?'checked':'';?>/>Year
                            </div>
                            <input type="hidden" id="deptId" name="deptId" value="<?=($department->id)??''?><?php if(isset($course)) echo ($course->departments_id)??''?>"/>
                            <input type ="hidden" id="courseId" name="courseId" value="<?php if(isset($course)) echo $course->id;?>" />
                        </fieldset>
                        <button type="button" onclick='window.location.href="<?=site_url("admin/college-department");?>"' id="btnback" class="btn btn-primary float-left">Back to Department<span class="glyphicon glyphicon-chevron-left"></span></button>
                        <button type="submit" id="btnSubmit" class="btn btn-primary float-right">Update<span class="glyphicon glyphicon-chevron-right"></span></button>
                    </fieldset>
                </form>

  </div>
</div>