<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">

        <!-- Barang Card -->
        <div class="col-xl-6 col-md-6 mb-4" id="barang">
            <div class="card border-left-secondary shadow h-100 py-2"> 
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Barang</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlbarang ?> Data</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stok Card -->
        <div class="col-xl-6 col-md-6 mb-4" id="stok">
            <div class="card border-left-secondary shadow h-100 py-2"> 
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Total Stok Barang</div>
                            <?php
                            $data = $this->db->select_sum('jumlah_masuk')->from('barang_masuk')->get();
                            $data2 = $this->db->select_sum('jumlah_keluar')->from('barang_keluar')->get();
                            $data3 = $this->db->select_sum('stok')->from('barang')->get();

                            $bm = $data->row();
                            $bk = $data2->row();
                            $b = $data3->row();
                            $hasil = $b->stok + (intval($bm->jumlah_masuk) - intval($bk->jumlah_keluar));
                            ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $hasil ?> Data</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-boxes fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Barang Masuk & Keluar -->
    <div class="row">
        <!-- Barang Masuk -->
        <div class="col-xl-6 col-md-4 mb-4" id="bmterakhir">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-dark">
                    <h6 class="m-0 font-weight-bold border-0 text-white">Barang Masuk</h6>
                    <?php if ($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'gudang'): ?>
                        <a href="<?= base_url() ?>barang_masuk" class="btn btn-dark btn-md btn-circle">
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php foreach ($bm5Terakhir as $bm): ?>
                            <div class="col-lg-10">
                                <h5 class="h5 mb-0 text-gray-800"><b><?= $bm->nama_barang ?></b></h5>
                                <h6 class="h6 mb-0 text-gray-600"><?= $bm->tgl_masuk ?></h6>
                                <span class="badge badge-dark"> <i class="fa fa-plus"></i> <?= $bm->jumlah_masuk ?></span>
                            </div>
                            <div class="col-lg-12"><hr class="sidebar-divider"></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Barang Keluar -->
        <div class="col-xl-6 col-md-4 mb-4" id="bkterakhir">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-dark">
                    <h6 class="m-0 font-weight-bold border-0 text-white">Barang Keluar</h6>
                    <?php if ($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'gudang'): ?>
                        <a href="<?= base_url() ?>barang_keluar" class="btn btn-dark btn-md btn-circle">
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php foreach ($bk5Terakhir as $bk): ?>
                            <div class="col-lg-10">
                                <h5 class="h5 mb-0 text-gray-800"><b><?= $bk->nama_barang ?></b></h5>
                                <h6 class="h6 mb-0 text-gray-600"><?= $bk->tgl_keluar ?></h6>
                                <span class="badge badge-dark"> <i class="fa fa-minus"></i> <?= $bk->jumlah_keluar ?></span>
                            </div>
                            <div class="col-lg-12"><hr class="sidebar-divider"></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

<!-- JS Plugins -->
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/sbadmin/vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url(); ?>assets/js/chart/chart-area.js"></script>
<script src="<?= base_url(); ?>assets/js/chart/pie-chart.js"></script>
<script src="<?= base_url(); ?>assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/js/dashboard.js"></script>

<?php if (!$this->session->flashdata('Pesan')): ?>
<script>
    $(document).ready(function() {
        let timerInterval;
        Swal.fire({
            title: 'Memuat...',
            timer: 1000,
            onBeforeOpen: () => { Swal.showLoading() },
            onClose: () => { clearInterval(timerInterval) }
        }).then((result) => {
            $("#barang, #stok, #bmterakhir, #bkterakhir").addClass("bounceIn");
        });
    });
</script>
<?php endif; ?>
