<div style="margin-top:10px"></div>
<div class="col-10 offset-md-1">
   <div class="card text-white center border-primary mb-3">
      <div class="card-header">
         <?php if (isHOD()):?>
         <div class="btn-group">
            <button onClick="window.location.href='<?= site_url('hod/academic');?>'" type="button" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Assign subjects To Teachers">Assign Teachers</button>
         </div>
         <div class="btn-group">
            <button onClick="window.location.href='<?= site_url('admin/college-department');?>'" type="button" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-placement="top" title="feedback">FeedBack</button>
         </div>
         <?php endif;?>
      </div>
   </div>
</div>

