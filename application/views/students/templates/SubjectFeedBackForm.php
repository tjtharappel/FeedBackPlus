<?php if($renderStatus):?>
<!------begin subject feedback------>
<div class="card" style="margin-top:35px;">
    <div class="card-body">
        <h4 class="card-title">
            <?=@$subject->name;?>
        </h4>
        <i class="card-subtitle mb-2 text-muted">Lectured By
            <?=@$teacher->name;?>
        </i>
        <?php if (isset($teacher->dpurl) && !empty($teacher->dpurl)):?>
        <img src='<?php echo getSiteFrontendAsset("uploads/teachers/profilepic/$teacher->dpurl");?>' class="img-thumbnail float-right"
            width="100" alt="profile dp" />
        <?php else:?>
        <img src='<?php echo getSiteFrontendAsset("images/nodp.jpg");?>' class="img-thumbnail float-right" width="150"
            alt="profile dp" />
        <?php endif;?>
        <hr />

        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Criteria</th>
                        <th>Rating</th>
                    </tr>
                </thead>
                <tbody>

                    <!----- skillset------>
                    <tr>
                        <td><i style="font-size:18px">Communication Skill</i></td>
                        <td>
                            <select name="communicationskill" id="communicationskill" class="form-control skill"
                                >
                                <option value></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</opiton>
                            </select>
                    </tr>
                    <!----- skillset------>
                    <!----- skillset------>
                    <tr>
                        <td><i style="font-size:18px">Subject Knowledge</i></td>
                        <td>
                            <select name="subjectknowlege" id="subjectknowlege" class="form-control skill" >
                                <option value></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                    </tr>
                    <!----- skillset------>
                    <!----- skillset------>
                    <tr>
                        <td><i style="font-size:18px">Classroom Interaction</i></td>
                        <td>
                            <select name="classroomrating" id="classroomrating" class="form-control skill">
                                <option value></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                    </tr>
                    <!----- skillset------>
                    <tr>
                        <td><i style="font-size:18px">Remarks (optional)</i></td>
                        <td>
                            <textarea class="form-control" rows="4" id="remarks"></textarea>
                        </td>
                    </tr>
                    <!----- skillset------>
                </tbody>
            </table>
        </div>
        <input type="hidden" id="subjectId" name="subjectId" value=<?=$subject->id;?> />
        <input type="hidden" id="teacherId" name="teacherId" value=<?=$teacher->id;?> />
        <button type="button" class="btn btn-info float-right btn-sm" onclick="updatefeedback()">Submit <i class="fa fa-arrow-circle-o-right fa-2x"></i></a>
    </div>
</div>
<!------end subject feedback---->
<?php else:?>
<!------begin subject feedback------>
<div class="card" style="margin-top:35px;padding-top:210px;padding-bottom:210px">
        <div class="card-body text-center">
          <h4 class="card-title "></h4>
          <h1 class="card-subtitle mb-2 text-muted">SORRY!!</h1>
          <i class="card-text text-success text-center" style="font-size:16px">You already updated your feedback of this month</i>
          
        </div>
      </div>
      <!------end subject feedback---->
<?php endif;?>