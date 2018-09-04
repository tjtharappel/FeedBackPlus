    <div style="margin-top:10px"></div>
    <div class="col-10 offset-md-1">
        
        <div class="card text-white center border-primary mb-3">
            <div class="card-header ">
                <!-- Example split danger button -->
                <div class="btn-group">
                    <button onClick="window.location.href='<?= site_url('admin/college-department');?>'" type="button" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Manage Departments">
                        Department
                    </button>
            </div>
            <!--end of button-->
            <div class="btn-group">
                    <button type="button" onClick="window.location.href='<?= site_url('department/offeringCourses');?>'" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Manage Course">Course</button>
                </div>
            <!--end of button-->
            <!-- Example split danger button -->
            <div class="btn-group">
                <button type="button" onClick="window.location.href='<?= site_url('admin/approve-teachers');?>'" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Manage Teachers">Teacher Approval</button>

                    </div>
                    <!--end of button-->

                <div class="btn-group">
                        <button type="button" onClick="window.location.href='<?= site_url('admin/academic/start');?>'" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Manage Academic">Academic</button>
                        
                    </div>
                    <!--end of button-->
                    <!-- Example split danger button -->
                <div class="btn-group">
                        <button type="button" onClick="window.location.href='<?= site_url('admin/students/approval');?>'" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Student Approval">Student Approval</button>
                        
                    </div>
                    <!--end of button-->
                                    <!-- Example split danger button -->
                <div class="btn-group">
                        <button type="button"  class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Manage FeedBack">FeedBack</button>
                        <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </div>
                    <!--end of button-->
            </div>

        </div>
</div>

