<!-- JAVASCRIPT -->
<script src="<?= base_url('assets/libs/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/metismenu/metisMenu.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/simplebar/simplebar.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/node-waves/waves.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/sweetalert2/sweetalert2.min.js') ?>"></script>

<!-- Script -->
<!-- apexcharts -->
<script src="<?= base_url('assets/libs/apexcharts/apexcharts.min.js') ?>"></script>

<!-- apexcharts init -->
<script src="<?= base_url('assets/js/pages/apexcharts.init.js') ?>"></script>

<!-- jquery.vectormap map -->
<script src="<?= base_url('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') ?>"></script>

<!-- Required datatable js -->
<script src="<?= base_url('assets/libs/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>

<!-- Responsive examples -->
<script src="<?= base_url('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') ?>"></script>

<!-- Buttons examples -->
<script src="<?= base_url('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/jszip/jszip.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/pdfmake/build/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/pdfmake/build/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/datatables.net-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') ?>"></script>

<script src="<?= base_url('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/datatables.net-select/js/dataTables.select.min.js') ?>"></script>

<script src="<?= base_url('assets/js/pages/dashboard.init.js') ?>"></script>
<script src="<?= base_url('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
        
<!-- App js -->
<script src="<?= base_url('assets/js/app.js') ?>"></script>
<script src="<?= base_url('assets/js/myjs.js') ?>"></script>
<script src="<?= base_url('assets/libs/sweetalert2/sweetalert2.min.js') ?>"></script>
        
<!-- Datatable init js -->
<script src="<?= base_url('assets/js/pages/datatables.init.js') ?>"></script>
        
<!-- google maps api -->
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI"></script>

<!-- Gmaps file -->
<script src="<?= base_url('assets/libs/gmaps/gmaps.min.js') ?>"></script>
        
<!-- demo codes -->
<script src="<?= base_url('assets/js/pages/gmaps.init.js') ?>"></script>
        
<script src="<?= base_url('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') ?>"></script>
<script src="<?= base_url('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') ?>"></script>
<script src="<?= base_url('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-in-mill-en.js') ?>"></script>
<script src="<?= base_url('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-au-mill-en.js') ?>"></script>
<script src="<?= base_url('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-il-chicago-mill-en.js') ?>"></script>
<script src="<?= base_url('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-uk-mill-en.js') ?>"></script>
<script src="<?= base_url('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-ca-lcc-en.js') ?>"></script>

<!-- Init js-->
<script src="<?= base_url('assets/js/pages/vector-maps.init.js') ?>"></script>

<script>
    $(document).on('click','.btn-logout',function(){
        const id    = $(this).data('id')
        const objek = $(this).data('object')
        var timerInterval;
        Swal.fire({
            title: 'Yakin Untuk Logout?',
            icon: 'question',
            text: '',
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
                        id_project : id
                    }
                });
                Swal.fire({
                    title: 'Logout!',
                    icon: 'success',
                    text: 'Anda berhasil Logout.',
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
                        location.href="<?php echo base_url(); ?>";
                    }
                })
            }
        })
    })
</script>
