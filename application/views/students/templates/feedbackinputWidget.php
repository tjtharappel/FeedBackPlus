<div class="container-fluid">
  <div class="row">
    <div class="col-md-2">
      <h3 style="padding-left:5px"> Subjects </h3>
      <ul class="list-group">
      <?php if(isset($sem_subjects) && is_array($sem_subjects)) :?>
        <?php foreach($sem_subjects as $subjects) :?>
        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item list-group-item-action" 
          data-subjectId="<?=$subjects->id?>"
           onclick="loadSubjectDetails(this)" style="cursor: pointer">
          <?=$subjects->name;?>
          <span class="badge badge-primary badge-pill"><?=($subjects->code);?></span>
        </li>
      <?php endforeach;?>
      <?php endif; ?>
      </ul>
    </div>
    <div class="col-md-8" id="subjectfeedback">
      <!------begin subject feedback------>
      <div class="card" style="margin-top:35px;">
        <div class="card-body">
          <h4 class="card-title"></h4>
          <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="#" class="btn btn-info float-right btn-sm">Submit <i class="fa fa-arrow-circle-o-right fa-2x"></i></a>
        </div>
      </div>
      <!------end subject feedback---->
    </div>
  </div>
</div>