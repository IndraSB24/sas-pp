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
                                        <div style="overflow-x:auto;">
                                        <font size="2">
                                        <table class="table table-striped table-bordered dt-responsive">
                                            <thead>
                                                <tr>
                                                    <th rowspan="3">WBS CODE</th>
                                                    <th rowspan="3">DOCUMENT NUMBER</th>
                                                    <th rowspan="3">DESCRIPTION</th>
                                                    <th rowspan="3">WEIGHT FACTOR</th>
                                                    <th colspan="4" class="text-center">PLAN</th>
                                                    <th colspan="4" class="text-center">ACTUAL</th>
                                                    <th rowspan="3" class="text-center">STATUS</th>
                                                    <th rowspan="3" class="text-center">ACTION</th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center">IFR</th>
                                                    <th class="text-center">IFA</th>
                                                    <th class="text-center">IFC</th>
                                                    <th class="text-center">CUMMULATIVE</th>
                                                    <th class="text-center">IFR</th>
                                                    <th class="text-center">IFA</th>
                                                    <th class="text-center">IFC</th>
                                                    <th class="text-center">CUMMULATIVE</th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center">50%</th>
                                                    <th class="text-center">40%</th>
                                                    <th class="text-center">10%</th>
                                                    <th class="text-center">100%</th>
                                                    <th class="text-center">50%</th>
                                                    <th class="text-center">40%</th>
                                                    <th class="text-center">10%</th>
                                                    <th class="text-center">100%</th>
                                                </tr>
                                            </thead>
        
                                            <tbody>
                                                <?php
                                                    $week = 0;
                                                    $weekPlan = [ 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                                                    $weekActual = [ 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                                                    $weekDates = [
                                                        '15-6-2023',
                                                        '22-6-2023',
                                                        '29-6-2023',
                                                        '6-7-2023',
                                                        '13-7-2023',
                                                        '20-7-2023',
                                                        '27-7-2023',
                                                        '3-8-2023',
                                                        '10-8-2023',
                                                        '17-8-2023',
                                                        '24-8-2023',
                                                        '31-9-2023'
                                                    ];
                                                    $WF_IFR = 0.5;
                                                    $WF_IFA = 0.4;
                                                    $WF_IFC = 0.1;
                                                
                                                    foreach($list_doc_engineering as $row) :
                                                        for ($i = 0; $i < count($weekDates); $i++) {
                                                            $date = world_date($row->plan_ifr);
                                                            $targetDate = world_date($weekDates[$i]);
                                                            
                                                            if ($date <= $targetDate) {
                                                                $weekPlan[$i] += $WF_IFR * $row->weight_factor;
                                                                break; // Exit the loop
                                                            }
                                                        }
                                                        
                                                        for ($i = 0; $i < count($weekDates); $i++) {
                                                            $date = world_date($row->plan_ifa);
                                                            $targetDate = world_date($weekDates[$i]);
                                                            
                                                            if ($date <= $targetDate) {
                                                                $weekPlan[$i] += $WF_IFA * $row->weight_factor;
                                                                break; // Exit the loop
                                                            }
                                                        }
                                                        
                                                        for ($i = 0; $i < count($weekDates); $i++) {
                                                            $date = world_date($row->plan_ifc);
                                                            $targetDate = world_date($weekDates[$i]);
                                                            
                                                            if ($date <= $targetDate) {
                                                                $weekPlan[$i] += $WF_IFC * $row->weight_factor;
                                                                break; // Exit the loop
                                                            }
                                                        }
                                                        
                                                        // set plan cumulative
                                                        $plan_cumulative = 0;
                                                        if(world_date($row->plan_ifr) <= date_now()){
                                                            $plan_cumulative += $WF_IFR*$row->weight_factor;
                                                        }
                                                        if(world_date($row->plan_ifa) <= date_now()){
                                                            $plan_cumulative += $WF_IFA*$row->weight_factor;
                                                        }
                                                        if(world_date($row->plan_ifc) <= date_now()){
                                                            $plan_cumulative += $WF_IFC*$row->weight_factor;
                                                        }
                                                        
                                                        // set actual cumulative
                                                        $actual_cumulative = 0;
                                                        if ($row->actual_ifr) {
                                                            $actual_cumulative += $WF_IFR * $row->weight_factor;
                                                        
                                                            for ($i = 0; $i < count($weekDates); $i++) {
                                                                $date = world_date($row->actual_ifr);
                                                                $targetDate = world_date($weekDates[$i]);
                                                        
                                                                if ($date <= $targetDate) {
                                                                    $weekActual[$i] += $WF_IFR * $row->weight_factor;
                                                                    break;
                                                                }
                                                            }
                                                        }
                                                        if ($row->actual_ifa) {
                                                            $actual_cumulative += $WF_IFA * $row->weight_factor;
                                                        
                                                            for ($i = 0; $i < count($weekDates); $i++) {
                                                                $date = world_date($row->actual_ifa);
                                                                $targetDate = world_date($weekDates[$i]);
                                                        
                                                                if ($date <= $targetDate) {
                                                                    $weekActual[$i] += $WF_IFA * $row->weight_factor;
                                                                    break;
                                                                }
                                                            }
                                                        }
                                                        if ($row->actual_ifc) {
                                                            $actual_cumulative += $WF_IFC * $row->weight_factor;
                                                        
                                                            for ($i = 0; $i < count($weekDates); $i++) {
                                                                $date = world_date($row->actual_ifc);
                                                                $targetDate = world_date($weekDates[$i]);
                                                        
                                                                if ($date <= $targetDate) {
                                                                    $weekActual[$i] += $WF_IFC * $row->weight_factor;
                                                                    break; // Exit the loop
                                                                }
                                                            }
                                                        }
                                                        
                                                        // set variance status
                                                        if($actual_cumulative == $plan_cumulative){
                                                            $status = '<span class="badge bg-success p-2 w-xs">ON TRACK</span>';
                                                        }else if($actual_cumulative > $plan_cumulative){
                                                            $status = '<span class="badge bg-info p-2 w-xs">AHEAD</span>';
                                                        }else{
                                                            $status = '<span class="badge bg-danger p-2 w-xs">LATE</span>';
                                                        }
                                                        
                                                        
                                                        $linkFile = base_url('upload/doc_engineering/'.$row->file);
                                                        $file_version = $row->file_version ? $row->file_version : 'nothing';
                                                        // set actual IFR status
                                                        if($row->actual_ifr){
                                                            $actual_ifr = tgl_indo($row->actual_ifr).
                                                            '
                                                            <br>
                                                                Issued V '.$row->file_version.'
                                                            <br>
                                                                <a href="#" class="badge bg-success mt-1 p-2 w-xs" id="btn-check-approved" 
                                                                    data-id="'.$row->id.'"
                                                                    data-doc_desc="'.$row->description.'"
                                                                    data-link_file = "'.$linkFile.'"
                                                                    data-step = "IFR"
                                                                    data-version = "'.$file_version.'"
                                                                >
                                                                    &nbsp;DETAIL&nbsp;
                                                                </a>
                                                            ';
                                                        }else{
                                                            $actual_ifr = '
                                                                no date yet
                                                            <br>
                                                                no file yet
                                                            <br>
                                                                <a href="#" class="badge bg-warning mt-1 p-2 w-xs" id="btn-upload-file" 
                                                                    data-id="'.$row->id.'"
                                                                    data-doc_desc="'.$row->description.'"
                                                                    data-path = "Project_detail_engineering/update/upload_file"
                                                                    data-step = "IFC"
                                                                    data-version = "'.$file_version.'"
                                                                >
                                                                    &nbsp;UP FILE&nbsp;
                                                                </a>
                                                            ';
                                                        }
                                                        
                                                        // set actual IFA status
                                                        if($row->actual_ifa){
                                                            $actual_ifa = tgl_indo($row->actual_ifa).
                                                            '
                                                            <br>
                                                                Approved V '.$row->file_version.'
                                                            <br>
                                                                <a href="#" class="badge bg-success mt-1 p-2 w-xs" id="btn-check-approval" 
                                                                    data-id="'.$row->id.'"
                                                                    data-doc_desc="'.$row->description.'"
                                                                    data-link_file = "'.$linkFile.'"
                                                                    data-step = "IFA"
                                                                    data-version = "'.$row->file_version.'"
                                                                >
                                                                    &nbsp;DETAIL&nbsp;
                                                                </a>
                                                            ';
                                                        }else if($row->actual_ifr){
                                                            $actual_ifa = tgl_indo($row->actual_ifr).
                                                            '
                                                            <br>
                                                                Issued V '.$row->file_version.'
                                                            <br>
                                                                <a href="#" class="badge bg-info mt-1 p-2 w-xs" id="btn-approval" 
                                                                    data-id="'.$row->id.'"
                                                                    data-doc_desc="'.$row->description.'"
                                                                    data-link_file = "'.$linkFile.'"
                                                                    data-step = "IFA"
                                                                    data-version = "'.$file_version.'"
                                                                >
                                                                    &nbsp;DETAIL&nbsp;
                                                                </a>
                                                            ';
                                                        }else{
                                                            $actual_ifa = '
                                                                no date yet
                                                            <br>
                                                                no file yet
                                                            <br>
                                                                <a href="javascript:waitingSwal();" class="badge bg-warning mt-1 p-2 w-xs" >
                                                                    &nbsp;WAITING&nbsp;
                                                                </a>
                                                            ';
                                                        }
                                                        
                                                        // set actual IFC status
                                                        if($row->actual_ifc_file){
                                                            $actual_ifc = tgl_indo($row->actual_ifc).
                                                            '
                                                            <br>
                                                                Appproved V '.$row->file_version.'
                                                            <br>
                                                                <a href="#" class="badge bg-success mt-1 p-2 w-xs" id="btn-check-approval" 
                                                                    data-id="'.$row->id.'"
                                                                    data-doc_desc="'.$row->description.'"
                                                                    data-link_file = "'.$linkFile.'"
                                                                    data-step = "IFC"
                                                                    data-version = "'.$row->file_version.'"
                                                                >
                                                                    &nbsp;DETAIL&nbsp;
                                                                </a>
                                                            ';
                                                        }else if($row->actual_ifa){
                                                            $actual_ifc = tgl_indo($row->actual_ifa).
                                                            '
                                                            <br>
                                                                Issued V '.$row->file_version.'
                                                            <br>
                                                                <a href="#" class="badge bg-info mt-1 p-2 w-xs" id="btn-approval" 
                                                                    data-id="'.$row->id.'"
                                                                    data-doc_desc="'.$row->description.'"
                                                                    data-link_file = "'.$linkFile.'"
                                                                    data-step = "IFC"
                                                                    data-version = "'.$file_version.'"
                                                                >
                                                                    &nbsp;DETAIL&nbsp;
                                                                </a>
                                                            ';
                                                        }else{
                                                            $actual_ifc = '
                                                                no date yet
                                                            <br>
                                                                no file yet
                                                            <br>
                                                                <a href="javascript:waitingSwal();" class="badge bg-warning mt-1 p-2 w-xs" >
                                                                    &nbsp;WAITING&nbsp;
                                                                </a>
                                                            ';
                                                        }
                                                ?>
                                                    <tr>
                                                        <td nowrap><?= $row->level_code ?></td>
                                                        <td class="text-center" nowrap> - </td>
                                                        <td><?= $row->description ?></td>
                                                        <td class="text-center"><?= $row->weight_factor ?>%</td>
                                                        <td class="text-center" nowrap><?= tgl_indo($row->plan_ifr) ?></td>
                                                        <td class="text-center" nowrap><?= tgl_indo($row->plan_ifa) ?></td>
                                                        <td class="text-center" nowrap><?= tgl_indo($row->plan_ifc) ?></td>
                                                        <td class="text-center"><?= $plan_cumulative ?>%</td>
                                                        <td class="text-center" nowrap><?= $actual_ifr ?></td>
                                                        <td class="text-center" nowrap><?= $actual_ifa ?></td>
                                                        <td class="text-center" nowrap><?= $actual_ifc ?></td>
                                                        <td class="text-center"><?= $actual_cumulative ?>%</td>
                                                        <td class="text-center">
                                                            <a href="document-timeline/<?= $row->id ?>" >
                                                                <?= $status ?>
                                                            </a>
                                                        </td>
                                                        <td class="text-center" nowrap>
                                                            <a href="#" id="btn-edit-doc" data-bs-toggle="modal" data-bs-target="#modal-edit"
                                                                data-id="<?= $row->id ?>"
                                                                data-level_code="<?= $row->level_code ?>"
                                                                data-description="<?= $row->description ?>"
                                                                data-weight_factor="<?= $row->weight_factor ?>"
                                                                data-plan_ifr="<?= tgl_indo($row->plan_ifr) ?>"
                                                                data-plan_ifa="<?= tgl_indo($row->plan_ifa) ?>"
                                                                data-plan_ifc="<?= tgl_indo($row->plan_ifc) ?>"
                                                            >
                                                                <i class="ri-pencil-fill text-info font-size-20"></i>
                                                            </a>
                                                            &nbsp;
                                                            <a href="#" id="btn-hapus-doc" data-id="<?= $row->id ?>" data-object="Project_detail_engineering/delete">
                                                                <i class="ri-delete-bin-6-fill text-danger font-size-20"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <?php
                                                    for($i_cum_plan=1; $i_cum_plan<count($weekPlan); $i_cum_plan++){
                                                        $weekPlan[$i_cum_plan] += $weekPlan[$i_cum_plan-1];
                                                    }
                                                    for($i_cum_act=1; $i_cum_act<count($weekActual); $i_cum_act++){
                                                        $weekActual[$i_cum_act] += $weekActual[$i_cum_act-1];
                                                    }
                                                    for($week_counter=0; $week_counter<count($weekPlan); $week_counter++){
                                                        echo '
                                                            <input type="hidden" id="week_plan_'.$week_counter.'" value="'.$weekPlan[$week_counter].'" />
                                                            <input type="hidden" id="week_actual_'.$week_counter.'" value="'.$weekActual[$week_counter].'" />
                                                        ';
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                        </font>
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

    let data_doc = <?= json_encode($list_doc_engineering) ?>

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
