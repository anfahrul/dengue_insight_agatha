<?= $this->extend('master_user'); ?>

<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard User</h1>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a class="nav-link" href="<?= base_url('dashboard/data_dbd'); ?>">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Data DBD</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Kota Kendari</div>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a class="nav-link" href="<?= base_url('dashboard/data_balita'); ?>">
                                <i class="fa-solid fa-square-plus fa-2x text-gray-300"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-1">
                            <a class="nav-link" href="<?= base_url('dashboard/identifikasi'); ?>">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Identifikasi</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Sebaran DBD</div>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a class="nav-link" href="<?= base_url('/dashboard/identifikasi'); ?>">
                                <i class="fa-solid fa-layer-group fa-2x text-gray-300"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a class="nav-link" href="<?= base_url('/dashboard/peta/sebaran'); ?>">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Peta GIS</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Sebaran DBD</div>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a class="nav-link" href="<?= base_url('/dashboard/peta/sebaran'); ?>">
                                <i class="fa-solid fa-location-dot fa-2x text-gray-300"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>