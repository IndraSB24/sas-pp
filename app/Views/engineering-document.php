<?= $this->include('partials/main') ?>

    <head>
        <?= $title_meta ?>
        <link href="assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
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
                            <div class="col-lg-6 pb-0">
                                <div class="card" style="height:100%;">
                                    <div class="card-body">
                                        <h4 class="card-title mb-1">Engineering S Curve</h4>
                                        <!--chart-->
                                        <div id="scurve_mdr" class="apex-charts" ></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 pb-0">
                                <div class="card" style="height:100%;">
                                    <div class="card-body">
                                        <h4 class="card-title mb-1">Status</h4>
                                        <div class="row">
                                            <!--percent chart-->
                                            <div class="col-sm-6 text-center">
                                                Percentage Progress
                                                <div id="percent_chart" class="apex-charts" ></div>
                                            </div>
                                            <!--document chart-->
                                            <div class="col-sm-6 text-center">
                                                Document Progress
                                                <div id="document_chart" class="apex-charts" ></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 text-center"></div>
                                            <div class="col-sm-6 text-center">
                                                <a href="engineering-doc-list/1" class="btn btn-sm btn-info mb-3">
                                                    Show Detail
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!--structural chart-->
                                            <div class="col-md-3 m-0 p-0 text-center">
                                                <div id="structural_chart" class="apex-charts" ></div>
                                                Structural
                                            </div>
                                            <!--mechanical chart-->
                                            <div class="col-md-3 m-0 p-0 text-center">
                                                <div id="mechanical_chart" class="apex-charts" ></div>
                                                Mechanical
                                            </div>
                                            <!--electrical chart-->
                                            <div class="col-md-3 m-0 p-0 text-center">
                                                <div id="electrical_chart" class="apex-charts" ></div>
                                                Electrical & Ins
                                            </div>
                                            <!--equipment chart-->
                                            <div class="col-md-3 m-0 p-0 text-center">
                                                <div id="equipment_chart" class="apex-charts" ></div>
                                                Equipment
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-2 pt-0">
                                <!--analysis card-->
                                <div class="card bg-info text-white mt-1">
                                    <div class="card-body">
                                        <h4 class="card-title mb-1 text-white">Analysis</h4>
                                        Isinya analisis
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row d-none">
                            <div class="col-12 mb-3">
                                <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#modal-add-document">
                                    Add Document
                                </button>
                            </div>
                        </div>
                        <div class="row d-none">
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
                            <label class="form-label">IFR</label>
                            <div class="input-group" id="ifr_date">
                                <input type="text" class="form-control" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" 
                                    data-date-container="#ifr_date" data-provide="datepicker" name="plan_ifr" id="plan_ifr"/>
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">IFA</label>
                            <div class="input-group" id="ifa_date">
                                <input type="text" class="form-control" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" 
                                    data-date-container="#ifa_date" data-provide="datepicker" name="plan_ifa" id="plan_ifa"/>
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">IFC</label>
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
                    <button type="button" class="btn btn-success" id="btn-simpan-doc" title="Add Data" data-object="Project_detail_engineering/add/doc_engineering">Add</button>
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
                            <label class="form-label">IFR</label>
                            <div class="input-group" id="ifr_date_edit">
                                <input type="text" class="form-control" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" 
                                    data-date-container="#ifr_date_edit" data-provide="datepicker" name="plan_ifr_edit" id="plan_ifr_edit"/>
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">IFA</label>
                            <div class="input-group" id="ifa_date_edit">
                                <input type="text" class="form-control" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" 
                                    data-date-container="#ifa_date_edit" data-provide="datepicker" name="plan_ifa_edit" id="plan_ifa_edit"/>
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">IFC</label>
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
    
    <!--Modal Upload All File-->
    <div class="modal fade" id="modal-upload-file" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="#" method="POST" id="form-modal-upload-file" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myLargeModalLabel">Upload <span class="upload_step"></span> File</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class="form-label">Document Description</label>
                                <input type="text" class="form-control" name="upload_doc_desc" id="upload_doc_desc" readonly />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="form-label">Choose <span class="upload_step"></span> File</label>
                            <div>
                                <label for="upload_uploaded_file" id="upload_btn_choose_file" class="btn btn-info">Choose File</label>
                                <input name="upload_uploaded_file" id="upload_uploaded_file" type="file" multiple="multiple" style="display: none;" />
                                &nbsp;<span id="upload_file_name">No File Choosen</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="upload_id_doc" />
                        <button type="button" class="btn btn-success" id="upload_btn_up"
                            data-path="#"
                            data-step="#"
                            data-version="#"
                        >
                            Upload
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <!--Modal Approval Document-->
    <div class="modal fade" id="modal-approval" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="#" method="POST" id="form-modal-approval" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myLargeModalLabel">
                            Document Approval for <span id="approval_step_version"></span>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class="form-label">Document Description</label>
                                <input type="text" class="form-control" name="approval_doc_desc" id="approval_doc_desc" readonly />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Submitted By</label>
                                <input type="text" class="form-control" name="approval_submitted_by" id="approval_submitted_by" value="John Submit" readonly />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Submitted At</label>
                                <input type="text" class="form-control" name="approval_submitted_at" id="approval_submitted_at" value="20-07-2023" readonly />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Submitted File</label>
                                <div>
                                    <a href="#" target="blank" id="approval_link_file" class="btn btn-info" style="width: 100%">
                                        &nbsp;Check File&nbsp;
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class="form-label">Comment</label>
                                <textarea id="approval_comment_text" name="approval_comment_text" class="form-control" maxlength="1000" rows="3" placeholder="type your comment"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="form-label">Upload Commented File (Optional)</label>
                            <div>
                                <label for="approval_comment_file" id="approval_btn_comment_file" class="btn btn-info">Choose File</label>
                                <input name="approval_comment_file" id="approval_comment_file" type="file" multiple="multiple" style="display: none;" />
                                &nbsp;<span id="approval_file_name">No File Choosen</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="approval_id_doc" />
                        <button type="button" class="btn btn-danger waves-effect" id="btn-approval-reject"
                            data-step="#"
                            data-version="#"
                        > 
                            Reject with Comment 
                        </button>
                        &nbsp;or&nbsp;
                        <button type="button" class="btn btn-success" id="btn-approval-approve"
                            data-path="#"
                            data-step="#"
                            data-version="#"
                        >
                            Approve
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
</html>

<script src="assets/libs/jquery-knob/jquery.knob.min.js"></script> 
<script src="assets/js/pages/jquery-knob.init.js"></script> 
<script>
    
// chart
// ==========================================================================================================================================================================    
    //  Scurve mdr
    let weekList=[],
        dataPlan=[],
        dataActual=[],
        cek = document.getElementById("week_plan_0").value;
    
    weeklist = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

    for (var i = 0; i < weeklist.length; i++) {
        dataPlan.push(document.getElementById("week_plan_" + i).value);
    }
    
    dataActual.push(document.getElementById("week_actual_0").value);
    for (var i = 1; i < weeklist.length; i++) {
        if (document.getElementById("week_actual_" + i).value != document.getElementById("week_actual_" + (i - 1)).value) {
            dataActual.push(document.getElementById("week_actual_" + i).value);
        }
    }

    var options_scurve_mdr = {
        chart: {
            height: 380,
            type: 'line',
            zoom: {
                enabled: false
            },
            toolbar: {
                show: false
            }
        },
        colors: ['#5664d2', '#1cbb8c'],
        dataLabels: {
            enabled: false,
        },
        stroke: {
            width: [3, 3],
            curve: 'straight'
        },
        series: [{
            name: "Plan",
            data: dataPlan
        },
        {
            name: "Actual",
            data: dataActual
        }
        ],
        // title: {
        //     text: 'SCurve Project',
        //     align: 'left'
        // },
        grid: {
            row: {
                colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.2
            },
            borderColor: '#f1f1f1'
        },
        markers: {
            style: 'inverted',
            size: 6
        },
        xaxis: {
            categories: weekList,
            title: {
                text: 'Weeks'
            }
        },
        yaxis: {
            title: {
                text: 'Progress in percent'
            },
            min: 0,
            max: 100
        },
        legend: {
            position: 'top',
            horizontalAlign: 'right',
            floating: true,
            offsetY: -25,
            offsetX: -5
        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    toolbar: {
                        show: false
                    }
                },
                legend: {
                    show: false
                },
            }
        }]
    }
    var chart = new ApexCharts(
        document.querySelector("#scurve_mdr"),
        options_scurve_mdr
    );
    chart.render();
    
    
    // Percent chart
    var options_percent = {
        chart: {
            height: 200,
            type: 'donut',
        },
        series: [44],
        labels: ["Series 1"],
        colors: ["#1cbb8c"],
        legend: {
            show: false,
            position: 'bottom',
            horizontalAlign: 'center',
            verticalAlign: 'middle',
            floating: false,
            fontSize: '14px',
            offsetX: 0,
            offsetY: 5
        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    height: 100
                },
                legend: {
                    show: false
                },
            }
        }]
    }
    var chart_percent = new ApexCharts(
        document.querySelector("#percent_chart"),
        options_percent
    );
    chart_percent.render();
    
    // Document chart
    var options_document = {
        chart: {
            height: 200,
            type: 'donut',
        },
        series: [44, 55],
        labels: ["Series 1", "Series 2"],
        colors: ["#1cbb8c", "#5664d2"],
        legend: {
            show: false,
            position: 'bottom',
            horizontalAlign: 'center',
            verticalAlign: 'middle',
            floating: false,
            fontSize: '14px',
            offsetX: 0,
            offsetY: 5
        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    height: 100
                },
                legend: {
                    show: false
                },
            }
        }]
    }
    var chart_document = new ApexCharts(
        document.querySelector("#document_chart"),
        options_document
    );
    chart_document.render();
    
    // Structural chart
    var options_structural = {
        chart: {
            height: 150,
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                dataLabels: {
                    name: {
                        show: false,
                    },
                    value: {
                        fontSize: '15px',
                        show: true,
                        offsetY: 4
                    },
                    total: {
                        show: false,
                    },
                    margin: 15,
                    color: "#5664d2"
                }
            }
        },
        series: [44],
        labels: ['Done'],
        colors: ['#5664d2'],
    };
    var chart_structural = new ApexCharts(
        document.querySelector("#structural_chart"),
        options_structural
    );
    chart_structural.render();
    
    // mechanical chart
    var options_mechanical = {
        chart: {
            height: 150,
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                dataLabels: {
                    name: {
                        show: false,
                    },
                    value: {
                        fontSize: '15px',
                        show: true,
                        offsetY: 4
                    },
                    total: {
                        show: false,
                    },
                    margin: 15,
                    color: "#5664d2"
                }
            }
        },
        series: [44],
        labels: ['Done'],
        colors: ['#5664d2'],
    };
    var chart_mechanical = new ApexCharts(
        document.querySelector("#mechanical_chart"),
        options_mechanical
    );
    chart_mechanical.render();
    
    // electrical chart
    var options_electrical = {
        chart: {
            height: 150,
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                dataLabels: {
                    name: {
                        show: false,
                    },
                    value: {
                        fontSize: '15px',
                        show: true,
                        offsetY: 4
                    },
                    total: {
                        show: false,
                    },
                    margin: 15,
                    color: "#5664d2"
                }
            }
        },
        series: [44],
        labels: ['Done'],
        colors: ['#5664d2'],
    };
    var chart_electrical = new ApexCharts(
        document.querySelector("#electrical_chart"),
        options_electrical
    );
    chart_electrical.render();
    
    // equipment chart
    var options_equipment = {
        chart: {
            height: 150,
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                dataLabels: {
                    name: {
                        show: false,
                    },
                    value: {
                        fontSize: '15px',
                        show: true,
                        offsetY: 4
                    },
                    total: {
                        show: false,
                    },
                    margin: 15,
                    color: "#5664d2"
                }
            }
        },
        series: [44],
        labels: ['Done'],
        colors: ['#5664d2'],
    };
    var chart_equipment = new ApexCharts(
        document.querySelector("#equipment_chart"),
        options_equipment
    );
    chart_equipment.render();
    
</script>
<script src="assets/libs/dropzone/min/dropzone.min.js"></script>
