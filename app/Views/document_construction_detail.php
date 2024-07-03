<?= $this->include('partials/main') ?>

<head>
    <?= $title_meta ?>
    <?= $this->include('partials/head-css') ?>
    <style>
        td:nth-child(3) {
            position: sticky;
            left: 0;
            z-index: 1;
        }

        /* td:nth-child(7) {
            position: sticky;
            left: 13em;
            z-index: 1;
        } */
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
                <div class="row">
                    <div class="col-12 mb-3">
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#modal-add-document">
                            Add Document
                        </button>
                        <a href="<?= base_url('construction-dashboard') ?>" class="btn btn-warning waves-effect waves-light">
                            Construction Dashboard
                        </a>
                        <a href="<?= base_url('measurement_basis_list') ?>" class="btn btn-success waves-effect waves-light">
                            Measurement Basis
                        </a>
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
                                <!-- <div style="overflow-x:auto;"> -->
                                <font size="2">
                                    <table id="scroll-vertical-datatable" class="table table-bordered nowrap">
                                        <thead style="border-top-width: 4px">
                                            <tr>
                                                <th rowspan="3" style="background-color: #b0cbf7;">NO</th>
                                                <th rowspan="3" style="background-color: #b0cbf7;">DOCUMENT NUMBER</th>
                                                <th rowspan="3" style="background-color: #D6CCC2;position: sticky;left: 0;z-index: 1;">DESCRIPTION</th>
                                                <th rowspan="3" style="width: 0px;background-color: #D6CCC2">QUANTITY</th>
                                                <th rowspan="3" style="width: 0px;background-color: #D6CCC2">UNIT</th>
                                                <th rowspan="1" colspan="2" style="width: 0px;background-color:#CF8BA9" class="desc text-center">HARGA SATUAN</th>
                                                <th colspan="2" class="desc text-center" style="background-color:#FF8FAB">TOTAL HARGA</th>
                                                <th rowspan="3" style="background-color: #b0cbf7">TOTAL AMOUNT</th>
                                                <th rowspan="3" style="background-color: #b0cbf7">WF</th>
                                                <th rowspan="1" colspan="10" class="text-center" style="background-color:#9dc9ae">PROGRESS (%)</th>
                                                <th rowspan="2" colspan="3" class="text-center" style="background-color:#EDE580">BASELINE SCHEDULE</th>
                                                <th rowspan="3" class="text-center" style="background-color: #b0cbf7">
                                                    ACTION
                                                </th>
                                            </tr>
                                            <tr>
                                                <th rowspan="2" class="text-center" style="background-color:#DCB6D5">MATERIAL (IDR)</th>
                                                <th rowspan="2" class="text-center" style="background-color:#DCB6D5">JASA (IDR)</th>
                                                <th rowspan="2" class="text-center" style="background-color:#FFC2D1">MATERIAL (IDR)</th>
                                                <th rowspan="2" class="text-center" style="background-color:#FFC2D1">JASA (IDR)</th>
                                                <th colspan="3" class="text-center" style="background-color:#C5EDAC">PLAN</th>
                                                <th colspan="3" class="text-center" style="background-color:#57CC99">ACTUAL</th>
                                                <th colspan="3" class="text-center" style="background-color:#80ED99">VARIANCE</th>
                                                <th rowspan="2" class="text-center" style="background-color:#90BE6D">REMAINING (%)</th>
                                            </tr>
                                            <tr>
                                                <th style="background-color:#C5EDAC">Last Week Cummulative Progress</th>
                                                <th style="background-color:#C5EDAC">This Week</th>
                                                <th style="background-color:#C5EDAC">Cummulative up to This Week</th>
                                                <th style="background-color:#57CC99">Last Week Cummulative Progress</th>
                                                <th style="background-color:#57CC99">This Week</th>
                                                <th style="background-color:#57CC99">Cummulative up to This Week</th>
                                                <th style="background-color:#80ED99">Last Week Cummulative Progress</th>
                                                <th style="background-color:#80ED99">This Week</th>
                                                <th style="background-color:#80ED99">Cummulative up to This Week</th>
                                                <th class="text-center" style="background-color:#EDE580">START</th>
                                                <th class="text-center" style="background-color:#EDE580">FINISH</th>
                                                <th class="text-center" style="background-color:#EDE580">DURATION</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ($list_doc as $index => $item) :
                                                $update = "
                                                    <a href='#' id='btn-edit-doc' data-detail='" . json_encode($item) . "'>
                                                        <i class='ri-pencil-fill text-info font-size-20'></i>
                                                    </a>
                                                "

                                            ?>
                                                <tr>
                                                    <td class="text-center" style="background-color:#d2e5f7"> <?= $index + 1 ?> </td>
                                                    <td class="text-center" style="background-color:#d2e5f7"> <?= $item->document_number ?> </td>
                                                    <td style="background-color:#faf1e3; white-space: normal;word-wrap: break-word;max-width: 450px;">
                                                        <?= $item->level_1 ? 'Level 1: ' .  $item->level_1 : '' ?> <br>
                                                        <?= $item->level_2 ? 'Level 2: ' .  $item->level_2 : '' ?> <br>
                                                        <?= $item->level_3 ? 'Level 3: ' .  $item->level_3 : '' ?> <br>
                                                        <?= $item->level_4 ? 'Level 4: ' .  $item->level_4 : '' ?> <br>
                                                        <?= $item->level_5 ? 'Level 5: ' .  $item->level_5 : '' ?>
                                                    </td>
                                                    <td class="text-center" style="background-color:#faf1e3"> <?= $item->quantity ?> </td>
                                                    <td class="text-center" style="background-color:#faf1e3"> <?= $item->unit ?> </td>
                                                    <td class="text-center" style="background-color:#F4CAE0"> <?= $item->harga_satuan_material ?> </td>
                                                    <td class="text-center" style="background-color:#F4CAE0"> <?= $item->harga_satuan_jasa ?> </td>
                                                    <td class="text-center" style="background-color:#FFE5EC"> <?= $item->total_harga_material ?> </td>
                                                    <td class="text-center" style="background-color:#FFE5EC"> <?= $item->total_harga_jasa ?> </td>
                                                    <td class="text-center" style="background-color:#d2e5f7"> <?= $item->total_amount ?> </td>
                                                    <td class="text-center" style="background-color:#d2e5f7"> <?= $item->wf ?> </td>
                                                    <td class="text-center" style="background-color:#DBFEB8"> - </td>
                                                    <td class="text-center" style="background-color:#DBFEB8"> - </td>
                                                    <td class="text-center" style="background-color:#DBFEB8"> - </td>
                                                    <td class="text-center" style="background-color:#C7F9CC"> - </td>
                                                    <td class="text-center" style="background-color:#C7F9CC"> - </td>
                                                    <td class="text-center" style="background-color:#C7F9CC"> - </td>
                                                    <td class="text-center" style="background-color:#D9FFF5"> - </td>
                                                    <td class="text-center" style="background-color:#D9FFF5"> - </td>
                                                    <td class="text-center" style="background-color:#D9FFF5"> - </td>
                                                    <td class="text-center" style="background-color:#A1E5AB"> - </td>
                                                    <td class="text-center" style="background-color:#faf5b6"> <?= $item->baseline_schedule_start ?> </td>
                                                    <td class="text-center" style="background-color:#faf5b6"> <?= $item->baseline_schedule_finish ?> </td>
                                                    <td class="text-center" style="background-color:#faf5b6"> <?= $item->baseline_schedule_duration ?> </td>
                                                    <td class="text-center" nowrap style="background-color: #d2e5f7"><?= $update ?></td>

                                                </tr>
                                            <?php endforeach; ?>
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
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Add Construction Document</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Level 1</label>
                            <input type="text" class="form-control" name="level_code" id="level_code" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Level 2</label>
                            <input type="text" class="form-control" name="level_code_2" id="level_code_2" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Level 3</label>
                            <input type="text" class="form-control" name="level_code_3" id="level_code_3" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Level 4</label>
                            <input type="text" class="form-control" name="level_code_4" id="level_code_4" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Level 5</label>
                            <input type="text" class="form-control" name="level_code_5" id="level_code_5" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Group</label>
                            <select class="form-control" id="group">
                                <option value="">--Select--</option>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <input type="text" class="form-control" name="description" id="description" />
                        </div>
                    </div> -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Weight Factor</label>
                            <input type="number" class="form-control" name="weight_factor" id="weight_factor" />
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Quantity</label>
                            <select class="form-control" id="quantity">
                                <option value="">--Select--</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Unit</label>
                            <select class="form-control" id="unit">
                                <option value="">--Select--</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="form-label">Plan</label>
                        <div class="col-md-4">
                            <label class="form-label">PO</label>
                            <div class="input-group" id="po_date">
                                <input type="text" class="form-control" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" data-date-container="#po_date" data-provide="datepicker" name="po_date" id="plan_po" />
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">FAT</label>
                            <div class="input-group" id="fat_date">
                                <input type="text" class="form-control" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" data-date-container="#fat_date" data-provide="datepicker" name="fat_date" id="plan_fat" />
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">RFS</label>
                            <div class="input-group" id="rfs_date">
                                <input type="text" class="form-control" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" data-date-container="#rfs_date" data-provide="datepicker" name="rfs_date" id="plan_rfs" />
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                        <!-- <div class="col-md-4">
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
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">ONSITE</label>
                            <div class="input-group" id="onsite_date">
                                <input type="text" class="form-control" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" data-date-container="#onsite_date" data-provide="datepicker" name="onsite_date" id="plan_onsite" />
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">INSTALL</label>
                            <div class="input-group" id="install_date">
                                <input type="text" class="form-control" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" data-date-container="#install_date" data-provide="datepicker" name="install_date" id="plan_install" />
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">COMM</label>
                            <div class="input-group" id="comm_date">
                                <input type="text" class="form-control" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" data-date-container="#comm_date" data-provide="datepicker" name="comm_date" id="plan_comm" />
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
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Update Construction</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>ACTIVITY:</label>
                            <div class="mb-2 col-md-12">
                                <small class="form-label">DISCIPLINE</small>
                                <input type="text" class="form-control" name="discipline" id="discipline" disabled />
                            </div>
                            <div class="mb-2 col-md-12">
                                <small class="form-label">SUB-DISCIPLINE</small>
                                <input type="text" class="form-control" name="subDiscipline" id="subDiscipline" disabled />
                            </div>
                            <div class="mb-2 col-md-12">
                                <small class="form-label">ACTIVITY</small>
                                <input type="text" class="form-control" name="activity" id="activity" disabled />
                            </div>
                            <div class="mb-2 col-md-12">
                                <small class="form-label">SUB ACTIVITY</small>
                                <input type="text" class="form-control" name="subActivity" id="subActivity" disabled />
                            </div>
                            <div class="mb-2 col-md-12">
                                <small class="form-label">DETAIL SUB ACTIVITY</small>
                                <input type="text" class="form-control" name="detailSubActivity" id="detailSubActivity" disabled />
                            </div>
                            <div class="mb-2 col-md-12">
                                <small class="form-label">WEIGHT FACTOR</small>
                                <input type="text" class="form-control" name="weightfactor" id="weightfactor" disabled />
                            </div>
                            <div class="mb-2 col-md-12">
                                <small class="form-label">VOLUME/UNIT</small>
                                <input type="text" class="form-control" name="volume" id="volume" disabled />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>DATA ACTUAL:</label>
                            <div class="mb-2 col-md-12">
                                <small class="form-label">VOLUME STEP - 1 &nbsp; <span class="text-warning">Progressed: </span><span class="text-warning progressVolumeStep1">-</span></small>
                                <input type="number" class="form-control" name="volumeStep1" id="volumeStep1" />
                            </div>
                            <div class="mb-2 col-md-12">
                                <small class="form-label">VOLUME STEP - 2 &nbsp; <span class="text-warning">Progressed: </span><span class="text-warning progressVolumeStep2">-</span></small>
                                <input type="number" class="form-control" name="volumeStep2" id="volumeStep2" />
                            </div>
                            <div class="mb-2 col-md-12">
                                <small class="form-label">VOLUME STEP - 3 &nbsp; <span class="text-warning">Progressed: </span><span class="text-warning progressVolumeStep3">-</span></small>
                                <input type="number" class="form-control" name="volumeStep3" id="volumeStep3" />
                            </div>
                            <div class="mb-2 col-md-12">
                                <small class="form-label">VOLUME STEP - 4 &nbsp; <span class="text-warning">Progressed: </span><span class="text-warning progressVolumeStep4">-</span></small>
                                <input type="number" class="form-control" name="volumeStep4" id="volumeStep4" />
                            </div>
                            <div class="mb-2 col-md-12">
                                <small class="form-label">VOLUME STEP - 5 &nbsp; <span class="text-warning">Progressed: </span><span class="text-warning progressVolumeStep5">-</span></small>
                                <input type="number" class="form-control" name="volumeStep5" id="volumeStep5" />
                            </div>
                            <div class="mb-2 col-md-12">
                                <small class="form-label">VOLUME STEP - 6 &nbsp; <span class="text-warning">Progressed: </span><span class="text-warning progressVolumeStep6">-</span></small>
                                <input type="number" class="form-control" name="volumeStep6" id="volumeStep6" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>ACTUAL WORK:</label>
                            <div class="row mb-2">
                                <div class="col-md-8">
                                    <small class="form-label">ACTIVITY STEP - 1</small>
                                    <input type="text" class="form-control" name="activityStep1" id="activityStep1" disabled />
                                </div>
                                <div class="col-md-4">
                                    <small class="form-label">WEIGHT FACTOR</small>
                                    <input type="text" class="form-control" name="activityStep1Wf" id="activityStep1Wf" disabled />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-8">
                                    <small class="form-label">ACTIVITY STEP - 2</small>
                                    <input type="text" class="form-control" name="activityStep2" id="activityStep2" disabled />
                                </div>
                                <div class="col-md-4">
                                    <small class="form-label">WEIGHT FACTOR</small>
                                    <input type="text" class="form-control" name="activityStep2Wf" id="activityStep2Wf" disabled />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-8">
                                    <small class="form-label">ACTIVITY STEP - 3</small>
                                    <input type="text" class="form-control" name="activityStep3" id="activityStep3" disabled />
                                </div>
                                <div class="col-md-4">
                                    <small class="form-label">WEIGHT FACTOR</small>
                                    <input type="text" class="form-control" name="activityStep3Wf" id="activityStep3Wf" disabled />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-8">
                                    <small class="form-label">ACTIVITY STEP - 4</small>
                                    <input type="text" class="form-control" name="activityStep4" id="activityStep4" disabled />
                                </div>
                                <div class="col-md-4">
                                    <small class="form-label">WEIGHT FACTOR</small>
                                    <input type="text" class="form-control" name="activityStep4Wf" id="activityStep4Wf" disabled />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-8">
                                    <small class="form-label">ACTIVITY STEP - 5</small>
                                    <input type="text" class="form-control" name="activityStep5" id="activityStep5" disabled />
                                </div>
                                <div class="col-md-4">
                                    <small class="form-label">WEIGHT FACTOR</small>
                                    <input type="text" class="form-control" name="activityStep5Wf" id="activityStep5Wf" disabled />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-8">
                                    <small class="form-label">ACTIVITY STEP - 6</small>
                                    <input type="text" class="form-control" name="activityStep6" id="activityStep6" disabled />
                                </div>
                                <div class="col-md-4">
                                    <small class="form-label">WEIGHT FACTOR</small>
                                    <input type="text" class="form-control" name="activityStep6Wf" id="activityStep6Wf" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>PERCENTAGE:</label>
                            <div class="mb-2 col-md-12">
                                <small class="form-label">PROGRESS STEP - 1</small>
                                <input type="text" class="form-control text-center" name="progressStep1" id="progressStep1" disabled />
                            </div>
                            <div class="mb-2 col-md-12">
                                <small class="form-label">PROGRESS STEP - 2</small>
                                <input type="text" class="form-control text-center" name="progressStep2" id="progressStep2" disabled />
                            </div>
                            <div class="mb-2 col-md-12">
                                <small class="form-label">PROGRESS STEP - 3</small>
                                <input type="text" class="form-control text-center" name="progressStep3" id="progressStep3" disabled />
                            </div>
                            <div class="mb-2 col-md-12">
                                <small class="form-label">PROGRESS STEP - 4</small>
                                <input type="text" class="form-control text-center" name="progressStep4" id="progressStep4" disabled />
                            </div>
                            <div class="mb-2 col-md-12">
                                <small class="form-label">PROGRESS STEP - 5</small>
                                <input type="text" class="form-control text-center" name="progressStep5" id="progressStep5" disabled />
                            </div>
                            <div class="mb-2 col-md-12">
                                <small class="form-label">PROGRESS STEP - 6</small>
                                <input type="text" class="form-control text-center" name="progressStep6" id="progressStep6" disabled />
                            </div>
                            <div class="mb-2 col-md-12">
                                <small class="form-label">PROGRESS INDIVIDUAL</small>
                                <input type="number" class="form-control" name="progressIndividual" id="progressIndividual" disabled />
                            </div>
                            <div class="mb-2 col-md-12">
                                <small class="form-label">Accumulative Previous</small>
                                <input type="number" class="form-control" name="accumulativePrevious" id="accumulativePrevious" disabled />
                            </div>
                            <div class="mb-2 col-md-12">
                                <small class="form-label">Accumulative Todate</small>
                                <input type="number" class="form-control" name="accumulativeTodate" id="accumulativeTodate" disabled />
                            </div>
                            <div class="mb-2 col-md-12">
                                <small class="form-label">Incrimental Input</small>
                                <input type="number" class="form-control" name="incrimentalInput" id="incrimentalInput" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="id_construction" />
                        <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="btn-update" title="Edit Document" data-object="Project_detail_construction/addProgress">Save</button>
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

<!--Modal Upload All File-->
<div id="modal-upload-file" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                        <!-- <div class="row mb-4">
                            <div class="col-md-12">
                                <label for="actual_man_hour" class="form-label">Actual Man Hour</label>
                                <input type="number" class="form-control" name="actual_man_hour" id="actual_man_hour" />
                            </div>
                        </div> -->
                        <div>
                            <label for="upload_uploaded_file" id="upload_btn_choose_file" class="btn btn-info">Choose File</label>
                            <input name="upload_uploaded_file" id="upload_uploaded_file" type="file" multiple="multiple" style="display: none;" />
                            &nbsp;<span id="upload_file_name">No File Choosen</span>
                        </div>
                        <!-- <div class="col-md-4 mt-4">
                            <label class="form-label">Backdate</label>
                            <div class="input-group" id="backdate1">
                                <input type="text" class="form-control" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" data-date-container="#backdate1" data-provide="datepicker" name="backdate" id="backdate" />
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div> -->
                        <!-- <div class="row mb-4">
                            <div class="col-md-12">
                                <label class="form-label">Please input your Man-Hour</label></label>
                                <input type="number" class="form-control" name="upload_man_hour" id="upload_man_hour"/>
                            </div>
                        </div> -->
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="upload_id_doc" />
                        <button type="button" class="btn btn-success" id="upload_btn_up" data-path="#" data-step="#" data-version="#" data-doc_name="#" data-doc_code="#">
                            Upload
                        </button>
                    </div>
                </div>
        </form>
    </div>
</div>

</html>

<script>
    console.log(<?= json_encode($list_doc) ?>, 'LIST DOC');
    
    $(document).ready(function() {
        $('#update_btn_choose_file').click(function(e) {
            e.preventDefault(); // Prevent default behavior
            $('#upload_uploaded_file').trigger('click');
        });

        $('#upload_uploaded_file').change(function() {
            var fileInput = $(this);
            var fileName = fileInput.val().split('\\').pop();
            $('#upload_file_name').text("File Choosen: " + fileName);
        });
    });

    // upload file
    $(document).on('click', '#btn-upload-file', function() {
        // Set data from button to Form Approval
        $('.upload_step').text($(this).data('step'));
        $('#upload_doc_desc').val($(this).data('doc_desc'));
        $('#upload_id_doc').val($(this).data('id'));
        $("#upload_btn_up").data("path", $(this).data('path'));
        $("#upload_btn_up").data("step", $(this).data('step'));
        $("#upload_btn_up").data("actual_man_hour", $(this).data('actual_man_hour'));
        $("#upload_btn_up").data("version", $(this).data('version'));
        $("#upload_btn_up").data("doc_name", $(this).data('doc_name'));
        $("#upload_btn_up").data("doc_code", $(this).data('doc_code'));
        $('#upload_file_name').text("No File Choosen");

        // Call Modal Approval
        $('#modal-upload-file').modal('show');
    })

    $(document).on('click', '#upload_btn_up', function() {
        const path = $(this).data('path');
        const fileDesc = $(this).data('step');
        const version = $(this).data('version');
        let id_doc, swalTitle;
        var timerInterval, i, file;
        var formData = new FormData();

        id_doc = document.getElementById("upload_id_doc").value;
        i = $('#upload_uploaded_file'),
            file = i[0].files[0];
        formData.append('file', file);
        formData.append('id_doc', id_doc);
        formData.append('doc_name', $(this).data('doc_name'));
        formData.append('doc_step', fileDesc);
        // formData.append('version', version);
        // formData.append('backdate', $('#backdate').val());
        // formData.append('doc_code', $(this).data('doc_code'));
        // formData.append('man_hour_actual', $('#actual_man_hour').val());

        swalTitle = 'Upload File ' + fileDesc;
        console.log(file);

        Swal.fire({
            title: swalTitle,
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: "<?= base_url('Project_detail_procurement/up_file') ?>",
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: () => {
                        Swal.fire({
                            title: "Loading",
                            text: "Please wait...",
                            icon: "info",
                            buttons: false,
                            closeOnClickOutside: false,
                            closeOnEsc: false,
                            showConfirmButton: false
                        });
                    },
                    success: () => {
                        Swal.fire({
                            title: 'Diupload!',
                            icon: 'success',
                            text: 'File Berhasil Diupload.',
                            buttons: false,
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
                    },
                    error: err => console.log(err),
                });
            }
        })
    })

    // btn simpan document
    // ==========================================================================================================================================================================
    $(document).on('click', '#btn-simpan-doc', function() {
        const objek = $(this).data('object')
        const level_code = document.getElementById("level_code").value;
        const level_code_2 = document.getElementById("level_code_2").value;
        const level_code_3 = document.getElementById("level_code_3").value;
        const level_code_4 = document.getElementById("level_code_4").value;
        const level_code_5 = document.getElementById("level_code_5").value;
        const group = document.getElementById("group").value;
        const quantity = document.getElementById("quantity").value;
        const unit = document.getElementById("unit").value;
        // const description = document.getElementById("description").value;
        const weight_factor = document.getElementById("weight_factor").value;
        // const plan_ifr = document.getElementById("plan_ifr").value;
        // const plan_ifa = document.getElementById("plan_ifa").value;
        // const plan_ifc = document.getElementById("plan_ifc").value;
        const plan_po = document.getElementById("plan_po").value;
        const plan_fat = document.getElementById("plan_fat").value;
        const plan_rfs = document.getElementById("plan_rfs").value;
        const plan_onsite = document.getElementById("plan_onsite").value;
        const plan_install = document.getElementById("plan_install").value;
        const plan_comm = document.getElementById("plan_comm").value;
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
                        // description: description,
                        weight_factor: weight_factor,
                        // plan_ifr: plan_ifr,
                        // plan_ifa: plan_ifa,
                        // plan_ifc: plan_ifc
                        level_code_2: level_code_2,
                        level_code_3: level_code_3,
                        level_code_4: level_code_4,
                        level_code_5: level_code_5,
                        group: group,
                        quantity: quantity,
                        unit: unit,
                        plan_po: plan_po,
                        plan_fat: plan_fat,
                        plan_rfs: plan_rfs,
                        plan_onsite: plan_onsite,
                        plan_install: plan_install,
                        plan_comm: plan_com,
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
                    },
                    success: () => {
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
                });
            }
        })
    })

    $(document).on('input', '#volumeStep1', () => {
        const val = $('#volumeStep1').val()
        const progress = $('.progressVolumeStep1').text()
        const qty = $('#volume').val()
        const total = qty ? qty.split(' ')[0].trim() : 0
        const wf = $('#activityStep1Wf').val()
        
        if ((parseFloat(total) - parseFloat(progress)) < parseFloat(val)) {
            $('#volumeStep1').val(parseFloat(total) - parseFloat(progress))
        }

        if (parseFloat(val) > 0) {
            const livePercent = ( (parseFloat(progress) + parseFloat(val)) / parseFloat(total) ) * parseFloat(wf)
            $('#progressStep1').val(livePercent.toFixed(2) + '%')
        } else {
            $('#progressStep1').val('')
        }
    })
    $(document).on('input', '#volumeStep2', () => {
        const val = $('#volumeStep2').val()
        const progress = $('.progressVolumeStep2').text()
        const qty = $('#volume').val();
        const total = qty ? qty.split(' ')[0].trim() : 0
        if ((parseFloat(total) - parseFloat(progress)) < parseFloat(val)) {
            $('#volumeStep2').val(parseFloat(total) - parseFloat(progress))
        }

        if (parseFloat(val) > 0) {
            $('#progressStep2').val('%')
        } else {
            $('#progressStep2').val('')
        }
    })
    $(document).on('input', '#volumeStep3', () => {
        const val = $('#volumeStep3').val()
        const progress = $('.progressVolumeStep3').text()
        const qty = $('#volume').val();
        const total = qty ? qty.split(' ')[0].trim() : 0
        if ((parseFloat(total) - parseFloat(progress)) < parseFloat(val)) {
            $('#volumeStep3').val(parseFloat(total) - parseFloat(progress))
        }
    })
    $(document).on('input', '#volumeStep4', () => {
        const val = $('#volumeStep4').val()
        const progress = $('.progressVolumeStep4').val()
        const qty = $('#volume').val();
        const total = qty ? qty.split(' ')[0].trim() : 0
        if ((parseFloat(total) - parseFloat(progress)) < parseFloat(val)) {
            $('#volumeStep4').val(parseFloat(total) - parseFloat(progress))
        }
    })
    $(document).on('input', '#volumeStep5', () => {
        const val = $('#volumeStep5').val()
        const progress = $('.progressVolumeStep5').text()
        const qty = $('#volume').val();
        const total = qty ? qty.split(' ')[0].trim() : 0
        if ((parseFloat(total) - parseFloat(progress)) < parseFloat(val)) {
            $('#volumeStep5').val(parseFloat(total) - parseFloat(progress))
        }
    })
    $(document).on('input', '#volumeStep6', () => {
        const val = $('#volumeStep6').val()
        const progress = $('.progressVolumeStep6').text()
        const qty = $('#volume').val();
        const total = qty ? qty.split(' ')[0].trim() : 0
        if ((parseFloat(total) - parseFloat(progress)) < parseFloat(val)) {
            $('#volumeStep6').val(parseFloat(total) - parseFloat(progress))
        }
    })

    // update document detail
    // ==========================================================================================================================================================================    
    // get Edit document
    $(document).on('click', '#btn-edit-doc', function() {
        const data = $(this).data('detail')
        console.log(data);
        $('#id_construction').val(data.id);
        $('#discipline').val(data.level_1);
        $('#subDiscipline').val(data.level_2);
        $('#activity').val(data.level_3);
        $('#subActivity').val(data.level_4);
        $('#detailSubActivity').val(data.level_5);
        $('#weightfactor').val(`${data.wf}%`);
        $('#volume').val(`${data.quantity} ${data.unit}`);

        $('#volumeStep1').val(null);
        $('#volumeStep2').val(null);
        $('#volumeStep3').val(null);
        $('#volumeStep4').val(null);
        $('#volumeStep5').val(null);
        $('#volumeStep6').val(null);

        $('.progressVolumeStep1').html(data.step_1_actual_volume || '');
        $('.progressVolumeStep2').html(data.step_2_actual_volume || '');
        $('.progressVolumeStep3').html(data.step_3_actual_volume || '');
        $('.progressVolumeStep4').html(data.step_4_actual_volume || '');
        $('.progressVolumeStep5').html(data.step_5_actual_volume || '');
        $('.progressVolumeStep6').html(data.step_6_actual_volume || '');

        $('#volumeStep1').prop('disabled', !data.step_1_name);
        $('#volumeStep2').prop('disabled', !data.step_2_name);
        $('#volumeStep3').prop('disabled', !data.step_3_name);
        $('#volumeStep4').prop('disabled', !data.step_4_name);
        $('#volumeStep5').prop('disabled', !data.step_5_name);
        $('#volumeStep6').prop('disabled', !data.step_6_name);

        $('#activityStep1').val(data.step_1_name);
        $('#activityStep2').val(data.step_2_name);
        $('#activityStep3').val(data.step_3_name);
        $('#activityStep4').val(data.step_4_name);
        $('#activityStep5').val(data.step_5_name);
        $('#activityStep6').val(data.step_6_name);

        $('#activityStep1Wf').val(data.step_1_wf ? `${data.step_1_wf}%`: '');
        $('#activityStep2Wf').val(data.step_2_wf ? `${data.step_2_wf}%`: '');
        $('#activityStep3Wf').val(data.step_3_wf ? `${data.step_3_wf}%`: '');
        $('#activityStep4Wf').val(data.step_4_wf ? `${data.step_4_wf}%`: '');
        $('#activityStep5Wf').val(data.step_5_wf ? `${data.step_5_wf}%`: '');
        $('#activityStep6Wf').val(data.step_6_wf ? `${data.step_6_wf}%`: '');

        // $('#progressStep1').val(data);
        // $('#progressStep2').val(data);
        // $('#progressStep3').val(data);
        // $('#progressStep4').val(data);
        // $('#progressStep5').val(data);
        // $('#progressStep6').val(data);

        $('#progressIndividual').val(data);
        $('#accumulativePrevious').val(data);
        $('#accumulativeTodate').val(data);
        $('#incrimentalInput').val(data);
        $('#modal-edit-document').modal('show');
    })

    $(document).on('click', '#btn-update', function() {
        const base = '<?= base_url() ?>'
        const link = `${base}/${$(this).data('object')}`
        
        const id_construction = document.getElementById("id_construction").value;
        const volumeStep1 = $('#volumeStep1').val();
        const volumeStep2 = $('#volumeStep2').val();
        const volumeStep3 = $('#volumeStep3').val();
        const volumeStep4 = $('#volumeStep4').val();
        const volumeStep5 = $('#volumeStep5').val();
        const volumeStep6 = $('#volumeStep6').val();
        const progressData = [];
        if (volumeStep1) {
            progressData.push({step: '1', actual_volume: volumeStep1})
        }
        if (volumeStep2) {
            progressData.push({step: '2', actual_volume: volumeStep2})
        }
        if (volumeStep3) {
            progressData.push({step: '3', actual_volume: volumeStep3})
        }
        if (volumeStep4) {
            progressData.push({step: '4', actual_volume: volumeStep4})
        }
        if (volumeStep5) {
            progressData.push({step: '5', actual_volume: volumeStep5})
        }
        if (volumeStep6) {
            progressData.push({step: '6', actual_volume: volumeStep6})
        }

        var timerInterval;
        Swal.fire({
            title: 'Update Progress?',
            icon: 'info',
            text: 'Patikan Data yang Diketik Sudah Sesuai!',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: link,
                    method: 'POST',
                    dataType: "JSON",
                    data: {
                        id_construction: id_construction,
                        progressData: progressData,
                    },
                    success: () => {
                        Swal.fire({
                            title: 'Diupdate!',
                            icon: 'success',
                            text: 'Document Berhasil Diupdate.',
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
                });
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

    function waitingSwal() {
        Swal.fire({
            title: 'Nothing You Can Do Here!',
            icon: 'warning',
            text: 'The progress is not here yet',
            timer: 5000,
            confirmButtonColor: "#5664d2",
        })
    }
</script>
