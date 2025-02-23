<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="col-xl-5 col-lg-6 col-md-8">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-4">
                <div class="text-center">
                    <h1 class="h2 text-primary font-weight-bold">APLIKASI</h1>
                    <h1 class="h4 text-dark font-weight-bold mb-4">INVENTORY BARANG</h1>
                </div>

                <div class="text-center">
                    <h5 class="text-gray-900 mb-3"><b>Silakan Login</b></h5>
                </div>

                <form class="user">
                    <div class="form-group position-relative">
                        <input type="text" class="form-control form-control-user pl-4" id="user" name="user" 
                            placeholder="Username" autocomplete="off">
                        </div>

                    <div class="form-group position-relative">
                        <input type="password" class="form-control form-control-user pl-4" id="pwd" name="pwd" 
                            placeholder="Password">
                        </div>

                    <button type="button" onclick="proses_login()" 
                        class="btn btn-primary btn-user btn-block shadow-lg">
                        <i class="fa fa-sign-in-alt"></i> Login
                    </button> <br>
                    <div class="col-lg-12 d-flex align-items-center justify-content-start mb-4">
                    <a href="../../../../iventory/inventory" class="btn btn-custom" style="background: linear-gradient(45deg,rgb(66, 152, 252),rgb(52, 124, 233)); color: white; padding: 12px 25px; border-radius: 30px; font-weight: bold; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); text-decoration: none; display: flex; align-items: center;">
                        <i class="fa fa-arrow-left" style="margin-right: 8px;"></i> Kembali
                    </a>
                </div>
                </form>

                <hr>

                <div class="text-center">
                    <small class="text-muted">© 2025  Kelompok Inventory Barang ci3</small>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/login.js"></script>

<?php if ($this->session->flashdata('Pesan')): ?>
    <?= $this->session->flashdata('Pesan'); ?>
<?php else: ?>
    <script>
        $(document).ready(function() {
            Swal.fire({
                title: 'Memuat...',
                timer: 1000,
                showConfirmButton: false,
                didOpen: () => Swal.showLoading()
            });
        });
    </script>
<?php endif; ?>
