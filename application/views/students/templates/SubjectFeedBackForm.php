<!------begin subject feedback------>
<div class="card" style="margin-top:35px;">
    <div class="card-body">
        <h4 class="card-title">
            <?=@$subject->name;?>
        </h4>
        <h6 class="card-subtitle mb-2 text-muted">Lectured By
            <?=@$teacher->name;?>
        </h6>
        <hr />
        <div class="card-body">
            <table class="table table-hover">
                <tbody>
                    <tr>
                    <td><i style="font-size:18px">Communication Skill</i></td>
                    <td>
                    <select name="communicationskill" id="communicationskill" class="form-control skill" >
                    <option value=0>0</option>
                    <option value=1>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="#" class="btn btn-info float-right btn-sm">Submit <i class="fa fa-arrow-circle-o-right fa-2x"></i></a>
    </div>
</div>
<!------end subject feedback---->
