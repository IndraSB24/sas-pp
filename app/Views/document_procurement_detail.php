<?= $this->include('partials/main') ?>

    <head>
        <?= $title_meta ?>
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
                        <?= $page_title ?>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#modal-add-document">
                                    Add Document
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-4">
                                                <label class="form-label">CUT OFF DATE: </label>
                                                <div class="input-group" id="datepicker1">
                                                    <input type="text" class="form-control" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" 
                                                        data-date-container="#datepicker1" data-provide="datepicker" name="cut_off_filter" id="cut_off_filter"/>
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <label class="form-label text-white">CUT OFF DATE: </label>
                                                <div>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#modal-add-document">
                                                        Filter
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div style="overflow-x:auto;"> -->
                                        <font size="2">
                                        <table id="datatable" class="table table-striped table-bordered nowrap">
                                            <thead style="border-top-width: 4px">
                                                <tr>
                                                    <th rowspan="2">NO</th>
                                                    <th rowspan="2">ACTIVITY CODE</th>
                                                    <th rowspan="2" style="width: 0px;" class="desc">
                                                        DESCRIPTION OF WORK
                                                    </th>
                                                    <th colspan="3" class="text-center">MR RECIEVED DATE</th>
                                                    <th colspan="3" class="text-center">RFQ ISSUED DATE</th>
                                                    <th cowspan="3" class="text-center">QUOTATION RECIEVED</th>
                                                    <th colspan="3" class="text-center">TECHNICAL CLARIFICATION</th>
                                                    <th colspan="3" class="text-center">TBE ISSUED DATE</th>
                                                    <th cowspan="3" class="text-center">CBE ISSUED DATE</th>
                                                    <th cowspan="3" class="text-center">CONTRACT DATE</th>
                                                    <th cowspan="2" class="text-center">
                                                        ACTION
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <?php for($i=0; $i<7; $i++): ?>
                                                        <th class="text-center">PLAN</th>
                                                        <th class="text-center">FORECAST</th>
                                                        <th class="text-center">ACTUAL</th>
                                                    <?php endfor; ?>
                                                    
                                                </tr>
                                            </thead>
        
                                            <tbody>

                                            </tbody>
                                        </table>
                                        </font>
                                        <!-- </div> -->
                                    </div>
                                    
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        
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

        <!-- JAVASCRIPT -->
        <?= $this->include('partials/vendor-scripts') ?>
    </body>
    
    <!--Modal Add Document-->
    <div class="modal fade" id="modal-add-document" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="#" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Add Engineering Document</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Level 1 Code</label>
                            <input type="text" class="form-control" name="level_code" id="level_code" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" id="description" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Weight Factor</label>
                            <input type="number" class="form-control" name="weight_factor" id="weight_factor" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="form-label">Plan</label>
                        <div class="col-md-4">
                            <label class="form-label">RFQ</label>
                            <div class="input-group" id="ifr_date">
                                <input type="text" class="form-control" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" 
                                    data-date-container="#ifr_date" data-provide="datepicker" name="plan_ifr" id="plan_ifr"/>
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">TBE</label>
                            <div class="input-group" id="ifa_date">
                                <input type="text" class="form-control" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" 
                                    data-date-container="#ifa_date" data-provide="datepicker" name="plan_ifa" id="plan_ifa"/>
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">PO</label>
                            <div class="input-group" id="ifc_date">
                                <input type="text" class="form-control" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" 
                                    data-date-container="#ifc_date" data-provide="datepicker" name="plan_ifc" id="plan_ifc"/>
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="btn-simpan-doc" title="Add Data" data-object="Project_detail_procurement/add/doc_procurement">Add</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    
    <!--Modal Edit Document-->
    <div class="modal fade" id="modal-edit-document" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="#" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Edit Engineering Document</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Level 1 Code</label>
                            <input type="text" class="form-control" name="level_code_edit" id="level_code_edit" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                        <input type="text" class="form-control" name="description_edit" id="description_edit" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Weight Factor</label>
                            <input type="number" class="form-control" name="weight_factor_edit" id="weight_factor_edit" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="form-label">Plan</label>
                        <div class="col-md-4">
                            <label class="form-label">RFQ</label>
                            <div class="input-group" id="ifr_date_edit">
                                <input type="text" class="form-control" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" 
                                    data-date-container="#ifr_date_edit" data-provide="datepicker" name="plan_ifr_edit" id="plan_ifr_edit"/>
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">TBE</label>
                            <div class="input-group" id="ifa_date_edit">
                                <input type="text" class="form-control" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" 
                                    data-date-container="#ifa_date_edit" data-provide="datepicker" name="plan_ifa_edit" id="plan_ifa_edit"/>
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">PO</label>
                            <div class="input-group" id="ifc_date_edit">
                                <input type="text" class="form-control" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" 
                                    data-date-container="#ifc_date_edit" data-provide="datepicker" name="plan_ifc_edit" id="plan_ifc_edit"/>
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="id_doc_edit" />
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="btn-simpan-edit-doc" title="Edit Document" data-object="Project_detail_engineering/update/document_detail">Save</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    
    <!--Modal Add IFR Document-->
    <div class="modal fade" id="modal-up-ifr" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="#" method="POST" id="form-modal-up-ifr">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myLargeModalLabel">Upload RFQ Document</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class="form-label">Document Description</label>
                                <input type="text" class="form-control" name="doc_desc_ifr" id="doc_desc_ifr" readonly />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class="form-label">RFQ File</label>
                            <input type="text" class="form-control" name="file_ifr" id="file_ifr" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="id_doc_ifr" />
                        <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="btn-simpan-file" title="ifr" 
                            data-object="Project_detail_procurement/update/actual_ifr_file"
                            data-file_desc="ifr"
                        >
                            Upload
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <!--Modal Add IFA Document-->
    <div class="modal fade" id="modal-up-ifa" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="#" method="POST" id="form-modal-up-ifa">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myLargeModalLabel">Upload TBE Document</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class="form-label">Document Description</label>
                                <input type="text" class="form-control" name="doc_desc_ifa" id="doc_desc_ifa" readonly />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class="form-label">TBE File</label>
                            <input type="text" class="form-control" name="file_ifa" id="file_ifa" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="id_doc_ifa" />
                        <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="btn-simpan-file" title="ifa" 
                            data-object="Project_detail_procurement/update/actual_ifa_file"
                            data-file_desc="ifa"
                        >
                            Upload
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <!--Modal Add IFC Document-->
    <div class="modal fade" id="modal-up-ifc" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="#" method="POST" id="form-modal-up-ifc">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myLargeModalLabel">Upload PO Document</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class="form-label">Document Description</label>
                                <input type="text" class="form-control" name="doc_desc_ifc" id="doc_desc_ifc" readonly />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class="form-label">PO File</label>
                            <input type="text" class="form-control" name="file_ifc" id="file_ifc" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="id_doc_ifc" />
                        <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="btn-simpan-file" title="ifc" 
                            data-object="Project_detail_procurement/update/actual_ifc_file"
                            data-file_desc="ifc"
                        >
                            Upload
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
</html>

<script>
// btn simpan document
// ==========================================================================================================================================================================
    $(document).on('click','#btn-simpan-doc',function(){
        const objek = $(this).data('object')
        const level_code    = document.getElementById("level_code").value;
        const description   = document.getElementById("description").value;
        const weight_factor = document.getElementById("weight_factor").value;
        const plan_ifr      = document.getElementById("plan_ifr").value;
        const plan_ifa      = document.getElementById("plan_ifa").value;
        const plan_ifc      = document.getElementById("plan_ifc").value;
        var timerInterval;
        Swal.fire({
            title: 'Tambah Dokumen?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url:  objek,
                    method: 'POST',
                    dataType: "JSON",
                    data : {
                        level_code  : level_code,
                        description : description,
                        weight_factor   : weight_factor,
                        plan_ifr    : plan_ifr,
                        plan_ifa    : plan_ifa,
                        plan_ifc    : plan_ifc
                    }
                });
                Swal.fire({
                    title: 'Disimpan!',
                    icon: 'success',
                    text: 'Data berhasil disimpan.',
                    timer: 1000,
                    confirmButtonColor: "#5664d2",
                    onBeforeOpen:function () {
                        //Swal.showLoading()
                        timerInterval = setInterval(function() {
                        Swal.getContent().querySelector('strong')
                            .textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    onClose: function () {
                        location.reload()
                    }
                })
            }
        })
    })

// btn delete document
// ==========================================================================================================================================================================
    $(document).on('click','#btn-hapus-doc',function(){
        const id    = $(this).data('id')
        const objek = $(this).data('object')
        var timerInterval;
        Swal.fire({
            title: 'Hapus Document?',
            icon: 'error',
            text: 'Document yang sudah dihapus tidak dapat dikembalikan lagi!',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url:  objek+'/'+id,
                    method: 'POST',
                    dataType: "JSON",
                    data : {
                        id_project : id
                    }
                });
                Swal.fire({
                    title: 'Dihapus!',
                    icon: 'success',
                    text: 'Document berhasil dihapus.',
                    timer: 1000,
                    confirmButtonColor: "#5664d2",
                    onBeforeOpen:function () {
                        //Swal.showLoading()
                        timerInterval = setInterval(function() {
                        Swal.getContent().querySelector('strong')
                            .textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    onClose: function () {
                        location.reload()
                    }
                })
            }
        })
    })

// update document detail
// ==========================================================================================================================================================================    
    // get Edit document
    $(document).on('click', '#btn-edit-doc', function(){
        // get data from button edit
        const   id_edit = $(this).data('id'),
                levelCode = $(this).data('level_code'),
                description = $(this).data('description'),
                weightFactor = $(this).data('weight_factor'),
                planIfr = $(this).data('plan_ifr'),
                planIfa = $(this).data('plan_ifa'),
                planIfc = $(this).data('plan_ifc');
        
        // Set data to Form Edit
        $('#id_doc_edit').val(id_edit);
        $('#level_code_edit').val(levelCode);
        $('#description_edit').val(description);
        $('#weight_factor_edit').val(weightFactor);
        $('#plan_ifr_edit').val(planIfr);
        $('#plan_ifa_edit').val(planIfa);
        $('#plan_ifc_edit').val(planIfc);
        
        // Call Modal Edit
        $('#modal-edit-document').modal('show');
    })
    
    $(document).on('click','#btn-simpan-edit-doc',function(){
        const   objek = $(this).data('object'),
                id = document.getElementById("id_doc_edit").value,
                levelCodeEdit = document.getElementById("level_code_edit").value,
                descriptionEdit = document.getElementById("description_edit").value,
                weightFactorEdit = document.getElementById("weight_factor_edit").value,
                planIfrEdit = document.getElementById("plan_ifr_edit").value;
                planIfaEdit = document.getElementById("plan_ifa_edit").value;
                planIfcEdit = document.getElementById("plan_ifc_edit").value;
        var timerInterval;
        Swal.fire({
            title: 'Edit Document?',
            icon: 'info',
            text: 'Patikan Data yang Diketik Sudah Sesuai!',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url:  objek+'/'+id,
                    method: 'POST',
                    dataType: "JSON",
                    data : {
                        level_code_edit     : levelCodeEdit,
                        description_edit    : descriptionEdit,
                        weight_factor_edit  : weightFactorEdit,
                        plan_ifr_edit       : planIfrEdit,
                        plan_ifa_edit       : planIfaEdit,
                        plan_ifc_edit       : planIfcEdit
                    }
                });
                Swal.fire({
                    title: 'Diedit!',
                    icon: 'success',
                    text: 'Document Berhasil Diedit.',
                    timer: 1000,
                    confirmButtonColor: "#5664d2",
                    onBeforeOpen:function () {
                        //Swal.showLoading()
                        timerInterval = setInterval(function() {
                        Swal.getContent().querySelector('strong')
                            .textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    onClose: function () {
                        location.reload()
                    }
                })
            }
        })
    })

// upload file
// ==========================================================================================================================================================================    
    // get Edit IFR
    $(document).on('click', '#btn-up-ifr-file', function(){
        // get data from button edit
        const id = $(this).data('id');
        const description = $(this).data('doc_desc');
        
        // Set data to Form Edit
        $('#doc_desc_ifr').val(description);
        $('#id_doc_ifr').val(id);
        
        // Call Modal Edit
        $('#modal-up-ifr').modal('show');
    })
    
    // get Edit IFA
    $(document).on('click', '#btn-up-ifa-file', function(){
        // get data from button edit
        const id = $(this).data('id');
        const description = $(this).data('doc_desc');
        
        // Set data to Form Edit
        $('#doc_desc_ifa').val(description);
        $('#id_doc_ifa').val(id);
        
        // Call Modal Edit
        $('#modal-up-ifa').modal('show');
    })
    
    // get Edit IFC
    $(document).on('click', '#btn-up-ifc-file', function(){
        // get data from button edit
        const id = $(this).data('id');
        const description = $(this).data('doc_desc');
        
        // Set data to Form Edit
        $('#doc_desc_ifc').val(description);
        $('#id_doc_ifc').val(id);
        
        // Call Modal Edit
        $('#modal-up-ifc').modal('show');
    })
    
    // save file
    $(document).on('click','#btn-simpan-file',function(){
        const objek     = $(this).data('object')
        const fileDesc  = $(this).data('file_desc');
        let id_doc, file, swalTitle;
        var timerInterval;
        
        switch(fileDesc){
            case 'ifr':
                swalTitle = 'Upload File RFQ';
                id_doc    = document.getElementById("id_doc_ifr").value
                file = document.getElementById("file_ifr").value;
            break;
            case 'ifa':
                swalTitle = 'Upload File TBE';
                id_doc    = document.getElementById("id_doc_ifa").value
                file = document.getElementById("file_ifa").value;
            break;
            case 'ifc':
                swalTitle = 'Upload File PO';
                id_doc    = document.getElementById("id_doc_ifc").value
                file = document.getElementById("file_ifc").value;
            break;
        }
        
        Swal.fire({
            title: swalTitle,
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url:  objek+'/'+id_doc,
                    method: 'POST',
                    dataType: "JSON",
                    data : {
                        file: file
                    }
                });
                Swal.fire({
                    title: 'Diupload!',
                    icon: 'success',
                    text: 'File Berhasil Diupload.',
                    timer: 1000,
                    confirmButtonColor: "#5664d2",
                    onBeforeOpen:function () {
                        //Swal.showLoading()
                        timerInterval = setInterval(function() {
                        Swal.getContent().querySelector('strong')
                            .textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    onClose: function () {
                        location.reload()
                    }
                })
            }
        })
    })
    
</script>
