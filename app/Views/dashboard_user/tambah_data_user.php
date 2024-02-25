<?= $this->extend('master_user'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Data</h1>
    <section>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <?php $error = session()->get('error'); ?>
                        <h5 class="card-title">Data Balita <span>| Tambah</span></h5>
                        <form action="<?= base_url('/dashboard/tambah_data/proses') ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group py-2" method="POST">
                                        <label class="mb-1">NIK</label>
                                        <input type="text" name="nik" class="form-control">
                                        <?php if ($error) : ?>
                                            <p class='text-danger'><?= $error['nik'] ?></p>
                                        <?php endif ?>
                                        <!-- Solusi mengatasi ketika inputan nik sama dengan sebelumnya -->
                                    </div>
                                    <div class="form-group py-2">
                                        <label class="mb-1">NAMA ANAK</label>
                                        <input type="text" name="nama_anak" class="form-control">
                                        <?php if ($error) : ?>
                                            <p class='text-danger'><?= $error['nama_anak'] ?></p>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group py-2">
                                        <label class="mb-1">TANGGAL LAHIR</label>
                                        <input type="date" name="tgl_lahir" class="form-control">
                                        <?php if ($error) : ?>
                                            <p class='text-danger'><?= $error['tgl_lahir'] ?></p>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group py-2">
                                        <label class="mb-1">JENIS KELAMIN</label>
                                        <select class="form-control" name="jk" id="jk">
                                            <option value="">--pilih--</option>
                                            <option value="L">L</option>
                                            <option value="P">P</option>
                                        </select>
                                        <?php if ($error) : ?>
                                            <p class='text-danger'><?= $error['jk'] ?></p>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group py-2">
                                        <label class="mb-1">NAMA ORANG TUA</label>
                                        <input type="text" name="nama_ortu" class="form-control">
                                        <?php if ($error) : ?>
                                            <p class='text-danger'><?= $error['nama_ortu'] ?></p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group py-2">
                                        <label class="mb-1">TANGGAL UKUR</label>
                                        <input type="date" name="tgl_ukur" class="form-control">
                                        <?php if ($error) : ?>
                                            <p class='text-danger'><?= $error['tgl_ukur'] ?></p>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group py-2">
                                        <label class="mb-1">TINGGI ANAK</label>
                                        <input type="text" name="tinggi_anak" class="form-control" placeholder="example. 100.5">
                                        <?php if ($error) : ?>
                                            <p class='text-danger'><?= $error['tinggi_anak'] ?></p>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group py-2">
                                        <label class="mb-1">BERAT BADAN ANAK</label>
                                        <input type="text" name="berat_anak" class="form-control" placeholder="example. 10.5">
                                        <?php if ($error) : ?>
                                            <p class='text-danger'><?= $error['berat_anak'] ?></p>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group py-2">
                                        <label class="mb-1">LATITUDE</label>
                                        <input type="text" name="lat" class="form-control">
                                        <?php if ($error) : ?>
                                            <p class='text-danger'><?= $error['lat'] ?></p>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group py-2">
                                        <label class="mb-1">LONGITUDE</label>
                                        <input type="text" name="long" class="form-control">
                                        <?php if ($error) : ?>
                                            <p class='text-danger'><?= $error['long'] ?></p>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end">
                                <button class="btn btn-primary mt-3" type="submit">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?= $this->endSection(); ?>