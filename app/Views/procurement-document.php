<?= $this->include('partials/main') ?>

<head>
    <?= $title_meta ?>
    <?= $this->include('partials/head-css') ?>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <style>
        .galon {
            border-radius: 20px;
            box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
            /* height: 200px; */
            background-color: #ffffff;
        }

        .selectable:hover {
            background-color: #7390A4 !important;
            color: #fff !important;
            cursor: pointer;
        }

        .dot {
            width: 10px;
            height: 10px;
            background-color: black;
            border-radius: 50%;
            /* Make it round */
            display: inline-block;
            margin: 5px;
            /* Adjust spacing */
        }

        @media screen and (max-width: 767px) {
            .label_procurement_progress {
                position: absolute;
                /* Mengubah posisi menjadi absolute */
                bottom: 0;
                /* Mengatur agar berada di bagian bawah */
                left: 50%;
                /* Mengatur agar berada di tengah horizontal */
                transform: translateX(-50%);
                /* Menggeser elemen ke kiri sejauh setengah lebar elemen itu sendiri */
                margin: 0;
                /* Menghapus margin */
            }
        }
    </style>
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
                <div class="row mb-0">
                    <div class="col-lg-6 pb-0">
                        <div class="card" style="background-color:#D0F4DE;border-radius: 35px;box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);border: 1px solid #ADC178;height:100%">
                            <div class="card-body">
                                <div class="text-center" style="background-color: #ADC178; display: inline-flex; align-items: center; flex-direction:column; padding: 5px 15px; border-radius: 20px;font-size:4rem">
                                    <h4 class="card-title mb-0" style="color:#ffffff"><i class="fas fa-chart-bar"></i> Procurement S Curve</h4>
                                </div>
                                <!--chart-->
                                <div id="scurve_mdr" class="apex-charts"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-0">
                        <div class="galon" style="padding: 15px; padding-top: 10px; height: 100%; border: 1px solid #B5838D; height: 40vh; overflow: hidden; position: relative;">
                            <div class="card-body">
                                <div class="row" style="height: 55%;">
                                    <div class="col-sm-12 text-center" style="height: 48vh; position: relative;">
                                        <div class="label_procurement_progresss text-center mb-2" style="background-color: #E07A5F;color:#ffffff; display: inline-flex; align-items: center; flex-direction: column; padding: 5px 15px; border-radius: 20px; font-size: 2rem;">
                                            <i class="ri-building-4-fill"></i>
                                            <h4 class="card-title mb-0" style="color:#ffffff;">Procurement Progress</h4>
                                        </div>
                                        <div id="gauge_chart" class="m-0 p-0" style="height: 70%;"></div>
                                        <!-- <a href="procurement-doc-list/1" class="btn btn-sm btn-info">
                                            Show Detail
                                        </a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="galon mt-2" style="padding: 15px;padding-top: 10px;border: 1px solid #B5838D;height:min-content;overflow: hidden;position: relative;">
                            <div class="row">
                                <div class="col-8">
                                    <div style="display: flex; justify-content: flex-start; align-items: center;">
                                        <div class="dot" style="background-color:lightgrey"></div>
                                        <span><strong id="complete">Remaining</strong></span>
                                    </div>
                                    <div style="display: flex; justify-content: flex-start; align-items: center;">
                                        <div class="dot" style="background-color: #BC4749"></div>
                                        <span><strong id="complete">Progress</strong></span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <!-- Div Induk -->
                                    <div class="text-center selectable" style="border-top-left-radius: 25px;border-bottom-left-radius: 25px;background-color:#EDE580; padding: 7px;" onclick="window.location.href = 'procurement-doc-list/1';">
                                        <!-- Div Anak -->
                                        <strong><span style="padding-right: 5px;"><i class="fas fa-info-circle"></i> Click for Detail</span></strong>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="top:-70px">
                                <div class="col-md-3 m-0 p-0 text-center">
                                    <div id="structural_chart" class="apex-charts"></div>

                                    <div class="text-center" style="background-color: #E07A5F; display: inline-flex; align-items: center; flex-direction:column; padding: 5px 15px; border-radius: 20px;font-size:4rem">
                                        <h4 class="card-title mb-0" style="color:#ffffff"><i class="fas fa-shapes"></i> Structural</h4>
                                    </div>
                                </div>
                                <div class="col-md-3 m-0 p-0 text-center">
                                    <div id="piping_chart" class="apex-charts"></div>

                                    <div class="text-center" style="background-color: #E07A5F; display: inline-flex; align-items: center; flex-direction:column; padding: 5px 15px; border-radius: 20px;font-size:4rem">
                                        <h4 class="card-title mb-0" style="color:#ffffff"><i class="mdi mdi-pipe"></i> Piping</h4>
                                    </div>
                                </div>
                                <div class="col-md-3 m-0 p-0 text-center">
                                    <div id="electrical_chart" class="apex-charts"></div>

                                    <div class="text-center" style="background-color: #E07A5F; display: inline-flex; align-items: center; flex-direction:column; padding: 5px 15px; border-radius: 20px;font-size:4rem">
                                        <h4 class="card-title mb-0" style="color:#ffffff"><i class="fas fa-bolt"></i> Electrical & Ins</h4>
                                    </div>
                                </div>
                                <div class="col-md-3 m-0 p-0 text-center">
                                    <div id="mechanical_chart" class="apex-charts"></div>

                                    <div class="text-center" style="background-color: #E07A5F; display: inline-flex; align-items: center; flex-direction:column; padding: 5px 15px; border-radius: 20px;font-size:4rem">
                                        <h4 class="card-title mb-0" style="color:#ffffff"><i class="fas fa-wrench"></i> Mechanical</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-12 mt-0 pt-0">
                                <div class="card bg-info text-white mt-1">
                                    <div class="card-body">
                                        <h4 class="card-title mb-1 text-white">Analysis</h4>
                                        Isinya analisis
                                    </div>
                                </div>
                            </div> -->
                    <div class="col-md-4 mt-4 pt-0">
                        <div class="galon" style="background-color:#90E0EF;border: 1px solid #00B4D8;">
                            <div class="row" style="padding: 20px;padding-bottom:0">
                                <div class="col-6">
                                    <h4>Analysis</h4>
                                </div>
                                <div class="col-6" style="display: flex;justify-content: flex-end;font-size:2rem;color:#0096C7">
                                    <i class="fas fa-paperclip"></i>
                                </div>
                            </div>
                            <div style="padding: 20px">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, ab. Ex facilis dicta alias expedita.
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
                                            <input type="text" class="form-control" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" data-date-container="#datepicker1" data-provide="datepicker" name="cut_off_filter" id="cut_off_filter" />
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
                                                    <th class="text-center">RFQ</th>
                                                    <th class="text-center">TBE</th>
                                                    <th class="text-center">PO</th>
                                                    <th class="text-center">CUMMULATIVE</th>
                                                    <th class="text-center">RFQ</th>
                                                    <th class="text-center">TBE</th>
                                                    <th class="text-center">PO</th>
                                                    <th class="text-center">CUMMULATIVE</th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center">60%</th>
                                                    <th class="text-center">20%</th>
                                                    <th class="text-center">20%</th>
                                                    <th class="text-center">100%</th>
                                                    <th class="text-center">60%</th>
                                                    <th class="text-center">20%</th>
                                                    <th class="text-center">20%</th>
                                                    <th class="text-center">100%</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $week = 0;
                                                $weekPlan = [0, 0, 0, 0, 0, 0, 0, 0];
                                                $weekActual = [0, 0, 0, 0, 0, 0, 0, 0];

                                                foreach ($list_doc_procurement as $row) :
                                                    // scurve data
                                                    if (world_date($row->plan_ifr) <= world_date('8-5-2023')) {
                                                        $weekPlan[0] += 0.6 * $row->weight_factor;
                                                    } else if (world_date($row->plan_ifr) <= world_date('16-5-2023')) {
                                                        $weekPlan[1] += 0.6 * $row->weight_factor;
                                                    } else if (world_date($row->plan_ifr) <= world_date('24-5-2023')) {
                                                        $weekPlan[2] += 0.6 * $row->weight_factor;
                                                    } else if (world_date($row->plan_ifr) <= world_date('1-6-2023')) {
                                                        $weekPlan[3] += 0.6 * $row->weight_factor;
                                                    } else if (world_date($row->plan_ifr) <= world_date('9-6-2023')) {
                                                        $weekPlan[4] += 0.6 * $row->weight_factor;
                                                    } else if (world_date($row->plan_ifr) <= world_date('17-6-2023')) {
                                                        $weekPlan[5] += 0.6 * $row->weight_factor;
                                                    } else if (world_date($row->plan_ifr) <= world_date('25-6-2023')) {
                                                        $weekPlan[6] += 0.6 * $row->weight_factor;
                                                    } else if (world_date($row->plan_ifr) <= world_date('3-7-2023')) {
                                                        $weekPlan[7] += 0.6 * $row->weight_factor;
                                                    }

                                                    if (world_date($row->plan_ifa) <= world_date('8-5-2023')) {
                                                        $weekPlan[0] += 0.2 * $row->weight_factor;
                                                    } else if (world_date($row->plan_ifa) <= world_date('16-5-2023')) {
                                                        $weekPlan[1] += 0.2 * $row->weight_factor;
                                                    } else if (world_date($row->plan_ifa) <= world_date('24-5-2023')) {
                                                        $weekPlan[2] += 0.2 * $row->weight_factor;
                                                    } else if (world_date($row->plan_ifa) <= world_date('1-6-2023')) {
                                                        $weekPlan[3] += 0.2 * $row->weight_factor;
                                                    } else if (world_date($row->plan_ifa) <= world_date('9-6-2023')) {
                                                        $weekPlan[4] += 0.2 * $row->weight_factor;
                                                    } else if (world_date($row->plan_ifa) <= world_date('17-6-2023')) {
                                                        $weekPlan[5] += 0.2 * $row->weight_factor;
                                                    } else if (world_date($row->plan_ifa) <= world_date('25-6-2023')) {
                                                        $weekPlan[6] += 0.2 * $row->weight_factor;
                                                    } else if (world_date($row->plan_ifa) <= world_date('3-7-2023')) {
                                                        $weekPlan[7] += 0.2 * $row->weight_factor;
                                                    }

                                                    if (world_date($row->plan_ifc) <= world_date('8-5-2023')) {
                                                        $weekPlan[0] += 0.2 * $row->weight_factor;
                                                    } else if (world_date($row->plan_ifc) <= world_date('16-5-2023')) {
                                                        $weekPlan[1] += 0.2 * $row->weight_factor;
                                                    } else if (world_date($row->plan_ifc) <= world_date('24-5-2023')) {
                                                        $weekPlan[2] += 0.2 * $row->weight_factor;
                                                    } else if (world_date($row->plan_ifc) <= world_date('1-6-2023')) {
                                                        $weekPlan[3] += 0.2 * $row->weight_factor;
                                                    } else if (world_date($row->plan_ifc) <= world_date('9-6-2023')) {
                                                        $weekPlan[4] += 0.2 * $row->weight_factor;
                                                    } else if (world_date($row->plan_ifc) <= world_date('17-6-2023')) {
                                                        $weekPlan[5] += 0.2 * $row->weight_factor;
                                                    } else if (world_date($row->plan_ifc) <= world_date('25-6-2023')) {
                                                        $weekPlan[6] += 0.2 * $row->weight_factor;
                                                    } else if (world_date($row->plan_ifc) <= world_date('3-7-2023')) {
                                                        $weekPlan[7] += 0.2 * $row->weight_factor;
                                                    }

                                                    // set plan cumulative
                                                    $plan_cumulative = 0;
                                                    if (world_date($row->plan_ifr) <= date_now()) {
                                                        $plan_cumulative += 0.6 * $row->weight_factor;
                                                    }
                                                    if (world_date($row->plan_ifa) <= date_now()) {
                                                        $plan_cumulative += 0.2 * $row->weight_factor;
                                                    }
                                                    if (world_date($row->plan_ifc) <= date_now()) {
                                                        $plan_cumulative += 0.2 * $row->weight_factor;
                                                    }

                                                    // set actual cumulative
                                                    $actual_cumulative = 0;
                                                    if ($row->actual_ifr) {
                                                        $actual_cumulative += 0.6 * $row->weight_factor;
                                                        if (world_date($row->actual_ifr) <= world_date('8-5-2023')) {
                                                            $weekActual[0] += 0.6 * $row->weight_factor;
                                                        } else if (world_date($row->actual_ifr) <= world_date('16-5-2023')) {
                                                            $weekActual[1] += 0.6 * $row->weight_factor;
                                                        } else if (world_date($row->actual_ifr) <= world_date('24-5-2023')) {
                                                            $weekActual[2] += 0.6 * $row->weight_factor;
                                                        } else if (world_date($row->actual_ifr) <= world_date('1-6-2023')) {
                                                            $weekActual[3] += 0.6 * $row->weight_factor;
                                                        } else if (world_date($row->actual_ifr) <= world_date('9-6-2023')) {
                                                            $weekActual[4] += 0.6 * $row->weight_factor;
                                                        } else if (world_date($row->actual_ifr) <= world_date('17-6-2023')) {
                                                            $weekActual[5] += 0.6 * $row->weight_factor;
                                                        } else if (world_date($row->actual_ifr) <= world_date('25-6-2023')) {
                                                            $weekActual[6] += 0.6 * $row->weight_factor;
                                                        } else if (world_date($row->actual_ifr) <= world_date('3-7-2023')) {
                                                            $weekActual[7] += 0.6 * $row->weight_factor;
                                                        }
                                                    }
                                                    if ($row->actual_ifa) {
                                                        $actual_cumulative += 0.2 * $row->weight_factor;
                                                        if (world_date($row->actual_ifa) <= world_date('8-5-2023')) {
                                                            $weekActual[0] += 0.2 * $row->weight_factor;
                                                        } else if (world_date($row->actual_ifa) <= world_date('16-5-2023')) {
                                                            $weekActual[1] += 0.2 * $row->weight_factor;
                                                        } else if (world_date($row->actual_ifa) <= world_date('24-5-2023')) {
                                                            $weekActual[2] += 0.2 * $row->weight_factor;
                                                        } else if (world_date($row->actual_ifa) <= world_date('1-6-2023')) {
                                                            $weekActual[3] += 0.2 * $row->weight_factor;
                                                        } else if (world_date($row->actual_ifa) <= world_date('9-6-2023')) {
                                                            $weekActual[4] += 0.2 * $row->weight_factor;
                                                        } else if (world_date($row->actual_ifa) <= world_date('17-6-2023')) {
                                                            $weekActual[5] += 0.2 * $row->weight_factor;
                                                        } else if (world_date($row->actual_ifa) <= world_date('25-6-2023')) {
                                                            $weekActual[6] += 0.2 * $row->weight_factor;
                                                        } else if (world_date($row->actual_ifa) <= world_date('3-7-2023')) {
                                                            $weekActual[7] += 0.2 * $row->weight_factor;
                                                        }
                                                    }
                                                    if ($row->actual_ifc) {
                                                        $actual_cumulative += 0.2 * $row->weight_factor;
                                                        if (world_date($row->actual_ifc) <= world_date('8-5-2023')) {
                                                            $weekActual[0] += 0.2 * $row->weight_factor;
                                                        } else if (world_date($row->actual_ifc) <= world_date('16-5-2023')) {
                                                            $weekActual[1] += 0.2 * $row->weight_factor;
                                                        } else if (world_date($row->actual_ifc) <= world_date('24-5-2023')) {
                                                            $weekActual[2] += 0.2 * $row->weight_factor;
                                                        } else if (world_date($row->actual_ifc) <= world_date('1-6-2023')) {
                                                            $weekActual[3] += 0.2 * $row->weight_factor;
                                                        } else if (world_date($row->actual_ifc) <= world_date('9-6-2023')) {
                                                            $weekActual[4] += 0.2 * $row->weight_factor;
                                                        } else if (world_date($row->actual_ifc) <= world_date('17-6-2023')) {
                                                            $weekActual[5] += 0.2 * $row->weight_factor;
                                                        } else if (world_date($row->actual_ifc) <= world_date('25-6-2023')) {
                                                            $weekActual[6] += 0.2 * $row->weight_factor;
                                                        } else if (world_date($row->actual_ifc) <= world_date('3-7-2023')) {
                                                            $weekActual[7] += 0.2 * $row->weight_factor;
                                                        }
                                                    }

                                                    // set variance status
                                                    if ($actual_cumulative == $plan_cumulative) {
                                                        $status = '<span class="badge bg-success p-2 w-xs">ON TRACK</span>';
                                                    } else if ($actual_cumulative > $plan_cumulative) {
                                                        $status = '<span class="badge bg-info p-2 w-xs">AHEAD</span>';
                                                    } else {
                                                        $status = '<span class="badge bg-danger p-2 w-xs">LATE</span>';
                                                    }

                                                    // set actual IFR status
                                                    if ($row->actual_ifr_file) {
                                                        $actual_ifr = tgl_indo($row->actual_ifr) .
                                                            '<br><a href="' . $row->actual_ifr_file . '" class="badge bg-success p-2">&nbsp;Cek File&nbsp;</a>';
                                                    } else {
                                                        $actual_ifr = '
                                                                <a href="#" class="badge bg-warning p-2" id="btn-up-ifr-file" 
                                                                    data-id="' . $row->id . '"
                                                                    data-doc_desc="' . $row->description . '"
                                                                >
                                                                    &nbsp;Add File&nbsp;
                                                                </a>
                                                            ';
                                                    }

                                                    // set actual IFA status
                                                    if ($row->actual_ifa_file) {
                                                        $actual_ifa = tgl_indo($row->actual_ifa) .
                                                            '<br><a href="' . $row->actual_ifa_file . '" class="badge bg-success p-2">&nbsp;Cek File&nbsp;</a>';
                                                    } else {
                                                        $actual_ifa = '
                                                                <a href="#" class="badge bg-warning p-2" id="btn-up-ifa-file" 
                                                                    data-id="' . $row->id . '"
                                                                    data-doc_desc="' . $row->description . '"
                                                                >
                                                                    &nbsp;Add File&nbsp;
                                                                </a>
                                                            ';
                                                    }

                                                    // set actual IFC status
                                                    if ($row->actual_ifc_file) {
                                                        $actual_ifc = tgl_indo($row->actual_ifc) .
                                                            '<br><a href="' . $row->actual_ifc_file . '" class="badge bg-success p-2">&nbsp;Cek File&nbsp;</a>';
                                                    } else {
                                                        $actual_ifc = '
                                                                <a href="#" class="badge bg-warning p-2" id="btn-up-ifc-file" 
                                                                    data-id="' . $row->id . '"
                                                                    data-doc_desc="' . $row->description . '"
                                                                >
                                                                    &nbsp;Add File&nbsp;
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
                                                        <td class="text-center"><?= $status ?></td>
                                                        <td class="text-center" nowrap>
                                                            <a href="#" id="btn-edit-doc" data-bs-toggle="modal" data-bs-target="#modal-edit" data-id="<?= $row->id ?>" data-level_code="<?= $row->level_code ?>" data-description="<?= $row->description ?>" data-weight_factor="<?= $row->weight_factor ?>" data-plan_ifr="<?= tgl_indo($row->plan_ifr) ?>" data-plan_ifa="<?= tgl_indo($row->plan_ifa) ?>" data-plan_ifc="<?= tgl_indo($row->plan_ifc) ?>">
                                                                <i class="ri-pencil-fill text-info font-size-20"></i>
                                                            </a>
                                                            &nbsp;
                                                            <a href="#" id="btn-hapus-doc" data-id="<?= $row->id ?>" data-object="Project_detail_procurement/delete">
                                                                <i class="ri-delete-bin-6-fill text-danger font-size-20"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <?php
                                                for ($i_cum_plan = 1; $i_cum_plan < 8; $i_cum_plan++) {
                                                    $weekPlan[$i_cum_plan] += $weekPlan[$i_cum_plan - 1];
                                                }
                                                for ($i_cum_act = 1; $i_cum_act < 8; $i_cum_act++) {
                                                    $weekActual[$i_cum_act] += $weekActual[$i_cum_act - 1];
                                                }
                                                for ($week_counter = 0; $week_counter < 8; $week_counter++) {
                                                    echo '
                                                            <input type="hidden" id="week_plan_' . $week_counter . '" value="' . $weekPlan[$week_counter] . '" />
                                                            <input type="hidden" id="week_actual_' . $week_counter . '" value="' . $weekActual[$week_counter] . '" />
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
                                <input type="text" class="form-control" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" data-date-container="#ifr_date" data-provide="datepicker" name="plan_ifr" id="plan_ifr" />
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">TBE</label>
                            <div class="input-group" id="ifa_date">
                                <input type="text" class="form-control" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" data-date-container="#ifa_date" data-provide="datepicker" name="plan_ifa" id="plan_ifa" />
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">PO</label>
                            <div class="input-group" id="ifc_date">
                                <input type="text" class="form-control" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" data-date-container="#ifc_date" data-provide="datepicker" name="plan_ifc" id="plan_ifc" />
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
                                <input type="text" class="form-control" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" data-date-container="#ifr_date_edit" data-provide="datepicker" name="plan_ifr_edit" id="plan_ifr_edit" />
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">TBE</label>
                            <div class="input-group" id="ifa_date_edit">
                                <input type="text" class="form-control" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" data-date-container="#ifa_date_edit" data-provide="datepicker" name="plan_ifa_edit" id="plan_ifa_edit" />
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">PO</label>
                            <div class="input-group" id="ifc_date_edit">
                                <input type="text" class="form-control" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" data-date-container="#ifc_date_edit" data-provide="datepicker" name="plan_ifc_edit" id="plan_ifc_edit" />
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
                    <button type="button" class="btn btn-success" id="btn-simpan-file" title="ifr" data-object="Project_detail_procurement/update/actual_ifr_file" data-file_desc="ifr">
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
                    <button type="button" class="btn btn-success" id="btn-simpan-file" title="ifa" data-object="Project_detail_procurement/update/actual_ifa_file" data-file_desc="ifa">
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
                    <button type="button" class="btn btn-success" id="btn-simpan-file" title="ifc" data-object="Project_detail_procurement/update/actual_ifc_file" data-file_desc="ifc">
                        Upload
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

</html>


<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jquery.vmap.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/maps/continents/jquery.vmap.indonesia.js"></script>-->

<script>
    // btn simpan document
    // ==========================================================================================================================================================================
    $(document).on('click', '#btn-simpan-doc', function() {
        const objek = $(this).data('object')
        const level_code = document.getElementById("level_code").value;
        const description = document.getElementById("description").value;
        const weight_factor = document.getElementById("weight_factor").value;
        const plan_ifr = document.getElementById("plan_ifr").value;
        const plan_ifa = document.getElementById("plan_ifa").value;
        const plan_ifc = document.getElementById("plan_ifc").value;
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
                    url: objek,
                    method: 'POST',
                    dataType: "JSON",
                    data: {
                        level_code: level_code,
                        description: description,
                        weight_factor: weight_factor,
                        plan_ifr: plan_ifr,
                        plan_ifa: plan_ifa,
                        plan_ifc: plan_ifc
                    }
                });
                Swal.fire({
                    title: 'Disimpan!',
                    icon: 'success',
                    text: 'Data berhasil disimpan.',
                    timer: 1000,
                    confirmButtonColor: "#5664d2",
                    onBeforeOpen: function() {
                        //Swal.showLoading()
                        timerInterval = setInterval(function() {
                            Swal.getContent().querySelector('strong')
                                .textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    onClose: function() {
                        location.reload()
                    }
                })
            }
        })
    })

    // btn delete document
    // ==========================================================================================================================================================================
    $(document).on('click', '#btn-hapus-doc', function() {
        const id = $(this).data('id')
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
                    url: objek + '/' + id,
                    method: 'POST',
                    dataType: "JSON",
                    data: {
                        id_project: id
                    }
                });
                Swal.fire({
                    title: 'Dihapus!',
                    icon: 'success',
                    text: 'Document berhasil dihapus.',
                    timer: 1000,
                    confirmButtonColor: "#5664d2",
                    onBeforeOpen: function() {
                        //Swal.showLoading()
                        timerInterval = setInterval(function() {
                            Swal.getContent().querySelector('strong')
                                .textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    onClose: function() {
                        location.reload()
                    }
                })
            }
        })
    })

    // update document detail
    // ==========================================================================================================================================================================    
    // get Edit document
    $(document).on('click', '#btn-edit-doc', function() {
        // get data from button edit
        const id_edit = $(this).data('id'),
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

    $(document).on('click', '#btn-simpan-edit-doc', function() {
        const objek = $(this).data('object'),
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
                    url: objek + '/' + id,
                    method: 'POST',
                    dataType: "JSON",
                    data: {
                        level_code_edit: levelCodeEdit,
                        description_edit: descriptionEdit,
                        weight_factor_edit: weightFactorEdit,
                        plan_ifr_edit: planIfrEdit,
                        plan_ifa_edit: planIfaEdit,
                        plan_ifc_edit: planIfcEdit
                    }
                });
                Swal.fire({
                    title: 'Diedit!',
                    icon: 'success',
                    text: 'Document Berhasil Diedit.',
                    timer: 1000,
                    confirmButtonColor: "#5664d2",
                    onBeforeOpen: function() {
                        //Swal.showLoading()
                        timerInterval = setInterval(function() {
                            Swal.getContent().querySelector('strong')
                                .textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    onClose: function() {
                        location.reload()
                    }
                })
            }
        })
    })

    // upload file
    // ==========================================================================================================================================================================    
    // get Edit IFR
    $(document).on('click', '#btn-up-ifr-file', function() {
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
    $(document).on('click', '#btn-up-ifa-file', function() {
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
    $(document).on('click', '#btn-up-ifc-file', function() {
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
    $(document).on('click', '#btn-simpan-file', function() {
        const objek = $(this).data('object')
        const fileDesc = $(this).data('file_desc');
        let id_doc, file, swalTitle;
        var timerInterval;

        switch (fileDesc) {
            case 'ifr':
                swalTitle = 'Upload File RFQ';
                id_doc = document.getElementById("id_doc_ifr").value
                file = document.getElementById("file_ifr").value;
                break;
            case 'ifa':
                swalTitle = 'Upload File TBE';
                id_doc = document.getElementById("id_doc_ifa").value
                file = document.getElementById("file_ifa").value;
                break;
            case 'ifc':
                swalTitle = 'Upload File PO';
                id_doc = document.getElementById("id_doc_ifc").value
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
                    url: objek + '/' + id_doc,
                    method: 'POST',
                    dataType: "JSON",
                    data: {
                        file: file
                    }
                });
                Swal.fire({
                    title: 'Diupload!',
                    icon: 'success',
                    text: 'File Berhasil Diupload.',
                    timer: 1000,
                    confirmButtonColor: "#5664d2",
                    onBeforeOpen: function() {
                        //Swal.showLoading()
                        timerInterval = setInterval(function() {
                            Swal.getContent().querySelector('strong')
                                .textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    onClose: function() {
                        location.reload()
                    }
                })
            }
        })
    })

    // chart
    // ==========================================================================================================================================================================    
    //  Scurve mdr
    let weekList = [],
        dataPlan = [],
        dataActual = [],
        cek = document.getElementById("week_plan_0").value;

    weeklist = [1, 2, 3, 4, 5, 6, 7, 8];

    dataPlan = [
        document.getElementById("week_plan_0").value,
        document.getElementById("week_plan_1").value,
        document.getElementById("week_plan_2").value,
        document.getElementById("week_plan_3").value,
        document.getElementById("week_plan_4").value,
        document.getElementById("week_plan_5").value,
        document.getElementById("week_plan_6").value,
        document.getElementById("week_plan_7").value
    ];

    dataActual.push(document.getElementById("week_actual_0").value);
    if (document.getElementById("week_actual_1").value != document.getElementById("week_actual_0").value) {
        dataActual.push(document.getElementById("week_actual_1").value);
    }
    if (document.getElementById("week_actual_2").value != document.getElementById("week_actual_1").value) {
        dataActual.push(document.getElementById("week_actual_2").value);
    }
    if (document.getElementById("week_actual_3").value != document.getElementById("week_actual_2").value) {
        dataActual.push(document.getElementById("week_actual_3").value);
    }
    if (document.getElementById("week_actual_4").value != document.getElementById("week_actual_3").value) {
        dataActual.push(document.getElementById("week_actual_4").value);
    }
    if (document.getElementById("week_actual_5").value != document.getElementById("week_actual_4").value) {
        dataActual.push(document.getElementById("week_actual_5").value);
    }
    if (document.getElementById("week_actual_6").value != document.getElementById("week_actual_5").value) {
        dataActual.push(document.getElementById("week_actual_6").value);
    }
    if (document.getElementById("week_actual_7").value != document.getElementById("week_actual_6").value) {
        dataActual.push(document.getElementById("week_actual_7").value);
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

    // Structural chart
    var options_structural = {
        chart: {
            height: 150,
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                hollow: {
                    size: '30%',
                },
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
                },
            }
        },
        series: [44],
        labels: ['Done'],
        colors: ['#BC4749'],
    };
    var chart_structural = new ApexCharts(
        document.querySelector("#structural_chart"),
        options_structural
    );
    chart_structural.render();

    // piping chart
    var options_piping = {
        chart: {
            height: 150,
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                hollow: {
                    size: '30%',
                },
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
        colors: ['#BC4749'],
    };
    var chart_piping = new ApexCharts(
        document.querySelector("#piping_chart"),
        options_piping
    );
    chart_piping.render();

    // electrical chart
    var options_electrical = {
        chart: {
            height: 150,
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                hollow: {
                    size: '30%',
                },
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
        colors: ['#BC4749'],
    };
    var chart_electrical = new ApexCharts(
        document.querySelector("#electrical_chart"),
        options_electrical
    );
    chart_electrical.render();

    // mechanical chart
    var options_mechanical = {
        chart: {
            height: 150,
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                hollow: {
                    size: '30%',
                },
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
        colors: ['#BC4749'],
    };
    var chart_mechanical = new ApexCharts(
        document.querySelector("#mechanical_chart"),
        options_mechanical
    );
    chart_mechanical.render();

    // procurement progress
    Highcharts.chart('gauge_chart', {
        chart: {
            type: 'gauge',
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false,
            height: '300vh',
            // marginTop: 0,
            marginBottom: 0
        },
        title: {
            text: '',
        },
        pane: {
            startAngle: -90,
            endAngle: 89.9,
            background: null,
            center: ['50%', '50%'],
            // size: '0%'
        },
        credits: {
            position: {
                y: -100,
            },
        },
        // the value axis
        yAxis: {
            min: 0,
            max: 100,
            tickPixelInterval: 72,
            tickPosition: 'inside',
            tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
            tickLength: 20,
            tickWidth: 2,
            minorTickInterval: null,
            labels: {
                distance: 20,
                style: {
                    fontSize: '14px'
                }
            },
            lineWidth: 0,
            plotBands: [{
                from: 0,
                to: 50,
                color: '#55BF3B', // green
                thickness: 20
            }, {
                from: 50,
                to: 75,
                color: '#DDDF0D', // yellow
                thickness: 20
            }, {
                from: 75,
                to: 100,
                color: '#DF5353', // red
                thickness: 20
            }]
        },
        series: [{
            name: 'Percentage',
            data: [80],
            tooltip: {
                valueSuffix: '%'
            },
            dataLabels: {
                format: '{y}%',
                borderWidth: 0,
                color: (
                    Highcharts.defaultOptions.title &&
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || '#333333',
                style: {
                    fontSize: '16px'
                }
            },
            dial: {
                radius: '80%',
                backgroundColor: 'gray',
                baseWidth: 12,
                baseLength: '0%',
                rearLength: '0%'
            },
            pivot: {
                backgroundColor: 'gray',
                radius: 6
            }

        }]

    });

    // Add some life
    // setInterval(() => {
    //     const chart = Highcharts.charts[0];
    //     if (chart && !chart.renderer.forExport) {
    //         const point = chart.series[0].points[0],
    //             inc = Math.round((Math.random() - 0.5) * 20);

    //         let newVal = point.y + inc;
    //         if (newVal < 0 || newVal > 200) {
    //             newVal = point.y - inc;
    //         }

    //         point.update(newVal);
    //     }

    // }, 3000);
</script>