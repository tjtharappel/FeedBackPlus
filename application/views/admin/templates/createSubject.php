<div class="card border-info mb-3">
  <div class="card-header"><h3><?=($subTitle)??""?>Subject Details</h3></div>
  <div class="card-body">
          <form id="dept" >
                   
                    <fieldset>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Subject Code</label>
                            <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="subject name" required="required" name="code" id="Code"
                             value="<?=($subject->code)??'';?>" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Subject Name</label>
                            <input type="text"  class="form-control" name="name" aria-describedby="subject duration" placeholder="Subject" required="required" 
                            value="<?=($subject->name)??'';?>"/>
                        </div>
                        <div class="form-group">
                                <label for="exampleInputEmail1">Semester</label>
                                <select id="core_comp_elect" name="semester" required="required" class="form-control">
                                    <option value>SELECT</option>
                                    <?php for($sem = 1;$sem <= $course->duration*2;$sem++): ?>
                                    <option value ="<?=$sem?>" <?php if(isset($subject->semester) && $subject->semester == $sem) echo "selected";?>>SEMESTER <?=$sem?></option>
                                    <?php endfor;?>
                                </select>
                            </div>
                        
                        <div class="form-group">
                                <label for="exampleInputEmail1">Core/ Complementary/ Elective</label>
                                <select id="core_comp_elect" name="type" required="" class="form-control">
                                    <option value>SELECT</option>
                                    <option value="Core" <?=(isset($subject) && $subject->type== 'Core')?'selected':'';?>>Core</option>
                                    <option value="Complementary" <?=(isset($subject) && $subject->type== 'Complementary')?'selected':'';?>>Complementary</option>
                                    <option value="Elective" <?=(isset($subject) && $subject->type== 'Elective')?'selected':'';?>>Elective</option>
                                </select>
                            </div>
                        
                        <fieldset class="form-group">
                            <label for="exampleInputFile">Examination Type</label>
                            <div class="form-check">
                                <label class="form-check-label"></label>
                                <input type="radio" class="form-check-input" name="pattern"  value="Theory" <?=(isset($subject) && $subject->pattern == 'Theory')?'checked=checked':'';?> required />Theory<br />
                                 <input type="radio" class="form-check-input" name="pattern"  value="Pratical"  <?=(isset($subject) && $subject->pattern == 'Pratical')?'checked=checked':'';?> required/>Pratical
                            </div>
                            <input type="hidden" id="courseId" name="courseId" value="<?=($course->id)??''?>"/>
                            <input type ="hidden" id="subjectId" name="subjectId" value="<?php if(isset($subject)) echo $subject->id;?>" />
                        </fieldset>
                        <button type="button" onclick='window.location.href="<?=site_url("admin/course/$course->id/subjects");?>"' id="btnback" class="btn btn-primary float-left">Back to Course Page<span class="glyphicon glyphicon-chevron-left"></span></button>
                        <button type="submit" id="btnSubmit" class="btn btn-primary float-right">Update<span class="glyphicon glyphicon-chevron-right"></span></button>
                    </fieldset>
                </form>

  </div>
</div>