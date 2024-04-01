<?= $this->include('partials/main') ?>

    <head>
        
        <?= $title_meta ?>
        <!-- dragula css -->
        <link href="assets/libs/dragula/dragula.min.css" rel="stylesheet" type="text/css" />

        <?= $this->include('partials/head-css') ?>

    </head>

    <?= $this->include('partials/body') ?>

        <!-- Begin page -->
        <div id="layout-wrapper">
            
        <?= $this->include('partials/menu') ?>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                            <?= $page_title ?>
                        <!-- end page title -->
                        
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <div class="me-3">
                                        <img src="assets/images/logo-sm-light.png" alt="logo-sm-light" class="avatar-xs">
                                    </div>
                                    <div class="flex-1">
                                        <h5>Nazox admin Dashboard</h5>
                                        <span class="badge badge-soft-success">Open</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="text-lg-end">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs" alt="avatar-2">
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <div class="avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                        J
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs" alt="avatar-4">
                                            </a>
                                        </li>
                                        
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="py-1">
                                                <i class="mdi mdi-plus me-1"></i> New member
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical m-0 text-muted font-size-20"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                    <h4 class="card-title">Todo</h4>
                                    <p class="mb-0">3 Tasks</p>
                                </div>
                                <div class="card">
                                    <div class="card-body border-bottom">

                                        <div id="todo-task" class="task-list">
                                            <div class="card task-box">
                                                <div class="progress progress-sm animated-progess" style="height: 3px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                                  </div>
                                                <div class="card-body">
    
                                                    <div class="float-end ms-2">
                                                        <div>
                                                            17 Apr, 2020
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <a href="#" class="">#NZ1220</a>
                                                    </div>
                                                    <div>
                                                        <h5 class="font-size-16"><a href="javascript: void(0);" class="text-dark">Admin layout design</a></h5>
                                                        <p class="mb-4">Sed ut perspiciatis unde</p>
                                                    </div>
        
                                                    <div class="d-inline-flex team mb-0">
                                                        <div class="me-3 align-self-center">
                                                            Team :
                                                        </div>
                                                        <div class="team-member">
                                                            <a href="javascript: void(0);" class="team-member d-inline-block">
                                                                <img src="assets/images/users/avatar-3.jpg" class="rounded-circle avatar-xs" alt="avatar-3">
                                                            </a>
                                                        </div>
    
                                                        <div class="team-member">
                                                            <a href="javascript: void(0);" class="team-member d-inline-block">
                                                                <img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs" alt="avatar-2">
                                                            </a>
                                                        </div>
                                                    </div>
    
                                                </div>
                                            </div>
                                            <!-- end task card -->

                                            <div class="card task-box">
                                                <div class="progress progress-sm animated-progess" style="height: 3px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 48%" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                                                  </div>
                                                <div class="card-body">
    
                                                    <div class="float-end ms-2">
                                                        <div>
                                                            15 Apr, 2020
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <a href="#" class="">#NZ1219</a>
                                                    </div>
                                                    <div>
                                                        <h5 class="font-size-16"><a href="javascript: void(0);" class="text-dark">Chat app page</a></h5>
                                                        <p class="mb-4">Neque porro quisquam est</p>
                                                    </div>
        
                                                    <div class="d-inline-flex team mb-0">
                                                        <div class="me-3 align-self-center">
                                                            Team :
                                                        </div>
                                                        <div class="team-member">
                                                            <a href="javascript: void(0);" class="team-member d-inline-block">
                                                                <div class="avatar-xs">
                                                                    <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                                        M
                                                                    </span>
                                                                </div>
                                                            </a>
                                                        </div>
    
                                                    </div>
    
                                                </div>
                                            </div>
                                            <!-- end task card -->

                                            <div class="card task-box">
                                                <div class="progress progress-sm animated-progess" style="height: 3px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                                                  </div>
                                                <div class="card-body">
    
                                                    <div class="float-end ms-2">
                                                        <div>
                                                            12 Apr, 2020
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <a href="#" class="">#NZ1218</a>
                                                    </div>
                                                    <div>
                                                        <h5 class="font-size-16"><a href="javascript: void(0);" class="text-dark">Ecommerce App pages</a></h5>
                                                        <p class="mb-4">Itaque earum rerum hic</p>
                                                    </div>
        
                                                    <div class="d-inline-flex team mb-0">
                                                        <div class="me-3 align-self-center">
                                                            Team :
                                                        </div>
                                                        <div class="team-member">
                                                            <a href="javascript: void(0);" class="team-member d-inline-block">
                                                                <img src="assets/images/users/avatar-5.jpg" class="rounded-circle avatar-xs" alt="avatar-5">
                                                            </a>
                                                        </div>
                                                        <div class="team-member">
                                                            <a href="javascript: void(0);" class="team-member d-inline-block">
                                                                <div class="avatar-xs">
                                                                    <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                                        J
                                                                    </span>
                                                                </div>
                                                            </a>
                                                        </div>
    
                                                        <div class="team-member">
                                                            <a href="javascript: void(0);" class="team-member d-inline-block">
                                                                <img src="assets/images/users/avatar-6.jpg" class="rounded-circle avatar-xs" alt="avatar-6">
                                                            </a>
                                                        </div>
                                                    </div>
    
                                                </div>
                                            </div>
                                            <!-- end task card -->

                                            <div class="text-center">
                                                <a href="javascript: void(0);" class="btn btn-primary mt-1 waves-effect waves-light"><i class="mdi mdi-plus me-1"></i> Add New</a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical m-0 text-muted font-size-20"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                    <h4 class="card-title">In Progress</h4>
                                    <p class="mb-0">3 Tasks</p>
                                </div>
                                <div class="card">
                                    <div class="card-body border-bottom">
                                        <div id="inprogress-task" class="task-list">
                                            <div class="card task-box">
                                                <div class="progress progress-sm animated-progess" style="height: 3px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                                  </div>
                                                <div class="card-body">
    
                                                    <div class="float-end ms-2">
                                                        <div>
                                                            05 Apr, 2020
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <a href="#" class="">#NZ1217</a>
                                                    </div>
                                                    <div>
                                                        <h5 class="font-size-16"><a href="javascript: void(0);" class="text-dark">Dashboard UI</a></h5>
                                                        <p class="mb-4">In enim justo, rhoncus ut</p>
                                                    </div>
        
                                                    <div class="d-inline-flex team mb-0">
                                                        <div class="me-3 align-self-center">
                                                            Team :
                                                        </div>
                                                        <div class="team-member">
                                                            <a href="javascript: void(0);" class="team-member d-inline-block">
                                                                <img src="assets/images/users/avatar-7.jpg" class="rounded-circle avatar-xs" alt="avatar-7">
                                                            </a>
                                                        </div>

                                                        <div class="team-member">
                                                            <a href="javascript: void(0);" class="team-member d-inline-block">
                                                                <div class="avatar-xs">
                                                                    <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                                        E
                                                                    </span>
                                                                </div>
                                                            </a>
                                                        </div>
    
                                                        <div class="team-member">
                                                            <a href="javascript: void(0);" class="team-member d-inline-block">
                                                                <img src="assets/images/users/avatar-8.jpg" class="rounded-circle avatar-xs" alt="avatar-8">
                                                            </a>
                                                        </div>

                                                        
                                                    </div>
    
                                                </div>
                                            </div>
                                            <!-- end task card -->

                                            <div class="card task-box">
                                                <div class="progress progress-sm animated-progess" style="height: 3px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 48%" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                                                  </div>
                                                <div class="card-body">
    
                                                    <div class="float-end ms-2">
                                                        <div>
                                                            02 Apr, 2020
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <a href="#" class="">#NZ1216</a>
                                                    </div>
                                                    <div>
                                                        <h5 class="font-size-16"><a href="javascript: void(0);" class="text-dark">Authentication pages</a></h5>
                                                        <p class="mb-4">Imperdiet Etiam ultricies</p>
                                                    </div>
        
                                                    <div class="d-inline-flex team mb-0">
                                                        <div class="me-3 align-self-center">
                                                            Team :
                                                        </div>
                                                        <div class="team-member">
                                                            <a href="javascript: void(0);" class="team-member d-inline-block">
                                                                <img src="assets/images/users/avatar-7.jpg" class="rounded-circle avatar-xs" alt="avatar-7">
                                                            </a>
                                                        </div>

                                                        <div class="team-member">
                                                            <a href="javascript: void(0);" class="team-member d-inline-block">
                                                                <img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs" alt="avatar-2">
                                                            </a>
                                                        </div>
    
                                                    </div>
    
                                                </div>
                                            </div>
                                            <!-- end task card -->

                                            <div class="card task-box">
                                                <div class="progress progress-sm animated-progess" style="height: 3px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                                                  </div>
                                                <div class="card-body">
    
                                                    <div class="float-end ms-2">
                                                        <div>
                                                            28 Mar, 2020
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <a href="#" class="">#NZ1215</a>
                                                    </div>
                                                    <div>
                                                        <h5 class="font-size-16"><a href="javascript: void(0);" class="text-dark">UI Elements pages</a></h5>
                                                        <p class="mb-4">Cras ultricies mi eu turpis</p>
                                                    </div>
        
                                                    <div class="d-inline-flex team mb-0">
                                                        <div class="me-3 align-self-center">
                                                            Team :
                                                        </div>
                                                        <div class="team-member">
                                                            <a href="javascript: void(0);" class="team-member d-inline-block">
                                                                <img src="assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs" alt="avatar-4">
                                                            </a>
                                                        </div>
                                                    </div>
    
                                                </div>
                                            </div>
                                            <!-- end task card -->

                                            <div class="text-center">
                                                <a href="javascript: void(0);" class="btn btn-primary mt-1 waves-effect waves-light"><i class="mdi mdi-plus me-1"></i> Add New</a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical m-0 text-muted font-size-20"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                    <h4 class="card-title">Completed</h4>
                                    <p class="mb-0">3 Tasks</p>
                                </div>
                                <div class="card">
                                    <div class="card-body border-bottom">

                                        <div id="complete-task" class="task-list">
                                            <div class="card task-box">
                                                <div class="progress progress-sm animated-progess" style="height: 3px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                  </div>
                                                <div class="card-body">
    
                                                    <div class="float-end ms-2">
                                                        <div>
                                                            24 Mar, 2020
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <a href="#" class="">#NZ1214</a>
                                                    </div>
                                                    <div>
                                                        <h5 class="font-size-16"><a href="javascript: void(0);" class="text-dark">Brand logo design</a></h5>
                                                        <p class="mb-4">Aenean leo ligula, porttitor eu</p>
                                                    </div>
        
                                                    <div class="d-inline-flex team mb-0">
                                                        <div class="me-3 align-self-center">
                                                            Team :
                                                        </div>
                                                        <div class="team-member">
                                                            <a href="javascript: void(0);" class="team-member d-inline-block">
                                                                <div class="avatar-xs">
                                                                    <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                                        K
                                                                    </span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
    
                                                </div>
                                            </div>
                                            <!-- end task card -->

                                            <div class="card task-box">
                                                <div class="progress progress-sm animated-progess" style="height: 3px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                  </div>
                                                <div class="card-body">
    
                                                    <div class="float-end ms-2">
                                                        <div>
                                                            20 Mar, 2020
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <a href="#" class="">#NZ1213</a>
                                                    </div>
                                                    <div>
                                                        <h5 class="font-size-16"><a href="javascript: void(0);" class="text-dark">Email pages</a></h5>
                                                        <p class="mb-4">It will be as simple as Occidental</p>
                                                    </div>
        
                                                    <div class="d-inline-flex team mb-0">
                                                        <div class="me-3 align-self-center">
                                                            Team :
                                                        </div>
                                                        <div class="team-member">
                                                            <a href="javascript: void(0);" class="team-member d-inline-block">
                                                                <div class="avatar-xs">
                                                                    <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                                        R
                                                                    </span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="team-member">
                                                            <a href="javascript: void(0);" class="team-member d-inline-block">
                                                                <img src="assets/images/users/avatar-5.jpg" class="rounded-circle avatar-xs" alt="avatar-5">
                                                            </a>
                                                        </div>
    
                                                    </div>
    
                                                </div>
                                            </div>
                                            <!-- end task card -->

                                            <div class="card task-box">
                                                <div class="progress progress-sm animated-progess" style="height: 3px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                  </div>
                                                <div class="card-body">
    
                                                    <div class="float-end ms-2">
                                                        <div>
                                                            14 Mar, 2020
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <a href="#" class="">#NZ1212</a>
                                                    </div>
                                                    <div>
                                                        <h5 class="font-size-16"><a href="javascript: void(0);" class="text-dark">Forms pages</a></h5>
                                                        <p class="mb-4">Donec quam felis, ultricies nec</p>
                                                    </div>
        
                                                    <div class="d-inline-flex team mb-0">
                                                        <div class="me-3 align-self-center">
                                                            Team :
                                                        </div>
                                                        <div class="team-member">
                                                            <a href="javascript: void(0);" class="team-member d-inline-block">
                                                                <img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs" alt="avatar-2">
                                                            </a>
                                                        </div>
    
                                                        <div class="team-member">
                                                            <a href="javascript: void(0);" class="team-member d-inline-block">
                                                                <img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-xs" alt="avatar-1">
                                                            </a>
                                                        </div>
                                                    </div>
    
                                                </div>
                                            </div>
                                            <!-- end task card -->

                                            <div class="text-center">
                                                <a href="javascript: void(0);" class="btn btn-primary mt-1 waves-effect waves-light"><i class="mdi mdi-plus me-1"></i> Add New</a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <?= $this->include('partials/footer') ?>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
            <?= $this->include('partials/right-sidebar') ?>
        <!-- /Right-bar -->


        <!-- JAVASCRIPT -->
        <?= $this->include('partials/vendor-scripts') ?>

        <!-- dragula plugins -->
        <script src="assets/libs/dragula/dragula.min.js"></script>

        <script src="assets/js/pages/kanban.init.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
