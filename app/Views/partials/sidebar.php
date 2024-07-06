<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="<?= base_url('dashboard') ?>" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('karyawan') ?>" class="waves-effect">
                        <i class="ri-group-line"></i>
                    <!-- <i class="fas fa-users"></i> -->
                        <span>Employee Master Data</span>
                    </a>
                </li>

                <!-- list project -->
                <?php $sidebar_data = get_data_list_project(); ?>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-book-open"></i>
                        <span>Project List</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('entitas-usaha-get-list') ?>">Data Entitas Usaha</a></li>
                        <li><a href="<?= base_url('item-get-list') ?>">Data Produk</a></li>
                        <li><a href="<?= base_url('satuan-get-list') ?>">Data Satuan</a></li>
                        <li><a href="<?= base_url('paymentMethod-get-list') ?>">Data Metode Bayar</a></li>
                        <li><a href="<?= base_url('distributionChanel-get-list') ?>">Data Chanel Distribusi</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
