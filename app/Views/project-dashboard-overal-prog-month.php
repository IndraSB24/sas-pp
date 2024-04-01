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

                <!-- start page title -->
                <?= $page_title ?>
                <!-- end page title -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row mb-4">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">SCurve Engineering</h4>
                                        <div id="scurve-engineering" class="apex-charts" dir="ltr"></div>                              
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Progress</th>
                                                        <th>Jan</th>
                                                        <th>Feb</th>
                                                        <th>Mar</th>
                                                        <th>Apr</th>
                                                        <th>May</th>
                                                        <th>Jun</th>
                                                        <th>Jul</th>
                                                        <th>Aug</th>
                                                        <th>Sep</th>
                                                        <th>Oct</th>
                                                        <th>Nov</th>
                                                        <th>Dec</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Early</td>
                                                        <td>0</td>
                                                        <td>4</td>
                                                        <td>20</td>
                                                        <td>30</td>
                                                        <td>40</td>
                                                        <td>50</td>
                                                        <td>70</td>
                                                        <td>85</td>
                                                        <td>97</td>
                                                        <td>100</td>
                                                        <td>100</td>
                                                        <td>100</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Median</td>
                                                        <td>0</td>
                                                        <td>4</td>
                                                        <td>10</td>
                                                        <td>18</td>
                                                        <td>22</td>
                                                        <td>30</td>
                                                        <td>42</td>
                                                        <td>55</td>
                                                        <td>72</td>
                                                        <td>91</td>
                                                        <td>97</td>
                                                        <td>100</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Actual</td>
                                                        <td>0</td>
                                                        <td>4</td>
                                                        <td>20</td>
                                                        <td>30</td>
                                                        <td>40</td>
                                                        <td>50</td>
                                                        <td>70</td>
                                                        <td>85</td>
                                                        <td>97</td>
                                                        <td>100</td>
                                                        <td>100</td>
                                                        <td>100</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Late</td>
                                                        <td>0</td>
                                                        <td>4</td>
                                                        <td>20</td>
                                                        <td>30</td>
                                                        <td>40</td>
                                                        <td>50</td>
                                                        <td>70</td>
                                                        <td>85</td>
                                                        <td>97</td>
                                                        <td>100</td>
                                                        <td>100</td>
                                                        <td>100</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">SCurve Procurement</h4>
                                        <div id="scurve-procurement" class="apex-charts" dir="ltr"></div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Progress</th>
                                                        <th>Jan</th>
                                                        <th>Feb</th>
                                                        <th>Mar</th>
                                                        <th>Apr</th>
                                                        <th>May</th>
                                                        <th>Jun</th>
                                                        <th>Jul</th>
                                                        <th>Aug</th>
                                                        <th>Sep</th>
                                                        <th>Oct</th>
                                                        <th>Nov</th>
                                                        <th>Dec</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Early</td>
                                                        <td>0</td>
                                                        <td>4</td>
                                                        <td>20</td>
                                                        <td>30</td>
                                                        <td>40</td>
                                                        <td>50</td>
                                                        <td>70</td>
                                                        <td>85</td>
                                                        <td>97</td>
                                                        <td>100</td>
                                                        <td>100</td>
                                                        <td>100</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Median</td>
                                                        <td>0</td>
                                                        <td>4</td>
                                                        <td>10</td>
                                                        <td>18</td>
                                                        <td>22</td>
                                                        <td>30</td>
                                                        <td>42</td>
                                                        <td>55</td>
                                                        <td>72</td>
                                                        <td>91</td>
                                                        <td>97</td>
                                                        <td>100</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Actual</td>
                                                        <td>0</td>
                                                        <td>4</td>
                                                        <td>20</td>
                                                        <td>30</td>
                                                        <td>40</td>
                                                        <td>50</td>
                                                        <td>70</td>
                                                        <td>85</td>
                                                        <td>97</td>
                                                        <td>100</td>
                                                        <td>100</td>
                                                        <td>100</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Late</td>
                                                        <td>0</td>
                                                        <td>4</td>
                                                        <td>20</td>
                                                        <td>30</td>
                                                        <td>40</td>
                                                        <td>50</td>
                                                        <td>70</td>
                                                        <td>85</td>
                                                        <td>97</td>
                                                        <td>100</td>
                                                        <td>100</td>
                                                        <td>100</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- End Page-content -->

        <?= $this->include('partials/footer') ?>

    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?= $this->include('partials/right-sidebar') ?>

<?= $this->include('partials/vendor-scripts') ?>

<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- apexcharts init -->
<script src="assets/js/pages/apexcharts.init.js"></script>

<!-- jquery.vectormap map -->
<script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<script src="assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>

<script>
    // chart scurve engineering
    var options = {
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
        colors: ['#5664d2', '#1cbb8c', '#000000', '#dc1818'],
        dataLabels: {
            enabled: false,
        },
        stroke: {
            width: [3, 3, 3, 3],
            curve: 'straight'
        },
        series: [{
            name: "Early",
            data: [0, 4, 20, 30, 40, 50, 70, 85, 97, 100, 100, 100]
        },
        {
            name: "Median",
            data: [0, 4, 10, 18, 23, 30, 42, 55, 73, 91, 97, 100]
        },
        {
            name: "Actual",
            data: [0, 4, 10, 20, 29, 35, 50]
        },
        {
            name: "Late",
            data: [0, 4, 5, 6, 8, 10, 15, 28, 55, 83, 97, 100]
        }],
        title: {
            text: 'SCurve Engineering',
            align: 'left'
        },
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
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            title: {
                text: 'Month'
            }
        },
        yaxis: {
            title: {
                text: 'Progress Plan'
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
        document.querySelector("#scurve-engineering"),
        options
    );
    chart.render();
    
    
    // chart scurve procurement
    var options = {
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
        colors: ['#5664d2', '#1cbb8c', '#000000', '#dc1818'],
        dataLabels: {
            enabled: false,
        },
        stroke: {
            width: [3, 3, 3, 3],
            curve: 'straight'
        },
        series: [{
            name: "Early",
            data: [0, 4, 20, 30, 40, 50, 70, 85, 97, 100, 100, 100]
        },
        {
            name: "Median",
            data: [0, 4, 10, 18, 23, 30, 42, 55, 73, 91, 97, 100]
        },
        {
            name: "Actual",
            data: [0, 4, 10, 20, 29, 35, 50]
        },
        {
            name: "Late",
            data: [0, 4, 5, 6, 8, 10, 15, 28, 55, 83, 97, 100]
        }],
        title: {
            text: 'SCurve Procurement',
            align: 'left'
        },
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
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            title: {
                text: 'Month'
            }
        },
        yaxis: {
            title: {
                text: 'Progress Plan'
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
        document.querySelector("#scurve-procurement"),
        options
    );
    chart.render();
</script>