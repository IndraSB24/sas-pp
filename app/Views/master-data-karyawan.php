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
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex flex-column flex-sm-row justify-content-end mb-3">
                                    <button class="btn btn-primary waves-effect waves-light float-right" data-bs-toggle="modal" data-bs-target="#modal_add"><i class="fas fa-plus"></i> Add Data</button>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="table_main" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr class="bg-primary text-light">
                                                        <th>No.</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
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
            <!--Modal Add Document-->
    <div id="modal_add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="#" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Add Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="level_code" id="name" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Email</label>
                        <input type="text" class="form-control" name="description" id="email" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control num-only" name="weight_factor" id="phone" />
                            <small class="text-muted">Please enter only numeric characters (0-9).</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="btn_simpan" title="Add Data">
                        Add
                    </button>
                </div>
            </div>
            </form>
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
    // var
    const baseUrl = "<?= base_url() ?>";
    var mainTable;

    // Call the function when the document is ready
    $(document).ready(function() {
        mainDatatable();
    });

    // Initialize or reinitialize the DataTable
    function mainDatatable() {
        // Destroy the existing DataTable instance if it exists
        if (mainTable) {
            mainTable.destroy();
        }

        // Initialize the DataTable
        mainTable = $('#table_main').DataTable({
            "processing": true,
            "serverSide": true,
            language: {
                "paginate": {
                    "first": "&laquo",
                    "last": "&raquo",
                    "next": "&gt",
                    "previous": "&lt"
                },
            },
            lengthMenu: [
                [10, 25, 50, 100, -1],
                ['10', '25', '50', '100', 'ALL']
            ],
            ajax: {
                "url": "<?= site_url('karyawan/ajax_get_list') ?>",
                "type": "POST",
                "data": function (data) {
                    data.searchValue = $('#table_main_filter input').val();
                }
            },
            columnDefs: [
                { 
                    "targets": [ 0, 1, 2, 3, 4 ],
                    "className": "text-center"
                },
                { 
                    "targets": [ 0, 4 ],
                    "orderable": false,
                },
            ],
        });
    }

    // simpan
    $(document).on('click', '#btn_simpan', function () {
        const path = "<?= site_url('Karyawan/add_Karyawan') ?>";
        const data = {
            nama: $('#name').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
        };
        
        loadQuestionalSwal(
            path, data, 'Tambahkan karyawan dengan nama: '+$('#name').val()+' ?', 
            'Disimpan!', 'Karyawan dengan nama: '+$('#name').val()+' berhasil ditambahkan.', 'modal_add'
        );
    });

    // delete
    $(document).on('click', '#btn_delete', function () {
        const thisData = $(this).data();
        const path = "<?= site_url('karyawan/delete_karyawan') ?>";
        const data = {
            id : thisData['id']
        };
        
        loadQuestionalSwal(
            path, data, 'Hapus Karyawan dengan nama: '+thisData['name']+' ?', 
            'Dihapus!', 'Karyawan dengan nama: '+thisData['name']+' berhasil dihapus.', ''
        );
    });

    // load edit modal
    $(document).on('click', '#btn_edit', function() {
        var idItem = $(this).data('id');
        const path = "<?= site_url('item/ajax_get_item_data') ?>";
        const kode_urut = $(this).data('kode_urut');
        
        $.ajax({
            url: path,
            method: 'POST',
            data: { id_item: idItem },
            dataType: 'json',
            success: function(response) {
                // Populate modal fields with fetched data
                $('#edit_id').val(idItem);
                $('#kode_item_edit').val(response.kode_item);
                $('#barcode_edit').val(response.barcode);
                $('#nama_edit').val(response.nama);
                $('#kategori_edit').val(response.id_kategori_item).trigger('change');
                $('#jenis_edit').val(response.id_kategori_jenis).trigger('change');
                $('#brand_edit').val(response.id_brand).trigger('change');
                $('#supplier_edit').val(response.id_supplier).trigger('change');
                $('#stok_minimum_edit').val(response.stok_minimum);
                $('#satuan_edit').val(response.id_satuan).trigger('change');
                $('#harga_dasar_edit').val(response.harga_dasar);
                
                // Show the modal
                $('#modal_edit').modal('show');
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText);
            }
        });
    });

    // konfirmasi edit
    $(document).on('click', '#btn_konfirmasi_edit', function () {
        const thisData = $(this).data();
        const path = "<?= site_url('item/edit_item') ?>";
        const data = {
            edit_id: $('#edit_id').val(),
            kode_item: $('#kode_item_edit').val(),
            barcode: $('#barcode_edit').val(),
            nama: $('#nama_edit').val(),
            id_kategori_jenis: $('#jenis_edit').val(),
            id_satuan: $('#satuan_edit').val(),
            id_kategori_item: $('#kategori_edit').val(),
            id_brand: $('#brand_edit').val(),
            id_supplier: $('#supplier_edit').val(),
            stok_minimum: $('#stok_minimum_edit').val(),
            harga_dasar: $('#harga_dasar_edit').val()
        };
        
        loadQuestionalSwal(
            path, data, 'Konfirmasi edit Item dengan Kode: '+ $('#kode_item_edit').val() +' ?', 
            'Diedit!', 'Item dengan kode: '+ $('#kode_item_edit').val() +' berhasil diedit.', 'modal_edit'
        );
    });

</script>
