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
                        <h5 class="card-title">Data Balita <span>| Tambah</span></h5>
                        <form action="<?= base_url('/dashboard/edit_data/proses') ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group py-2" method="POST">
                                        <label class="mb-1">NIK</label>
                                        <input type="hidden" name="id_data" value="<?= $data['id_data'] ?>">
                                        <input type="text" name="nik" class="form-control" value="<?= $data['nik'] ?>">
                                    </div>
                                    <div class="form-group py-2">
                                        <label class="mb-1">NAMA ANAK</label>
                                        <input type="text" name="nama_anak" class="form-control" value="<?= $data['nama_anak'] ?>">
                                    </div>
                                    <div class="form-group py-2">
                                        <label class="mb-1">TANGGAL LAHIR</label>
                                        <input type="date" name="tgl_lahir" class="form-control" value="<?= $data['tgl_lahir'] ?>">
                                    </div>
                                    <div class="form-group py-2">
                                        <label class="mb-1">JENIS KELAMIN</label>
                                        <select class="form-control" name="jk" id="jk" value="<?= $data['jk'] ?>">
                                            <option value="">--pilih--</option>
                                            <option value="L">L</option>
                                            <option value="P">P</option>
                                        </select>
                                    </div>
                                    <div class="form-group py-2">
                                        <label class="mb-1">NAMA ORANG TUA</label>
                                        <input type="text" name="nama_ortu" class="form-control" value="<?= $data['nama_ortu'] ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group py-2">
                                        <label class="mb-1">TANGGAL UKUR</label>
                                        <input type="date" name="tgl_ukur" class="form-control" value="<?= $data['tgl_ukur'] ?>">
                                    </div>
                                    <div class="form-group py-2">
                                        <label class="mb-1">TINGGI ANAK</label>
                                        <input type="text" name="tinggi_anak" class="form-control" value="<?= $data['tinggi_anak'] ?>">
                                    </div>
                                    <div class="form-group py-2">
                                        <label class="mb-1">BERAT BADAN ANAK</label>
                                        <input type="text" name="berat_anak" class="form-control" value="<?= $data['berat_anak'] ?>">
                                    </div>
                                    <div class="form-group py-2">
                                        <label class="mb-1">LATITUDE</label>
                                        <input type="text" name="lat" class="form-control" value="<?= $data['lat'] ?>">
                                    </div>
                                    <div class="form-group py-2">
                                        <label class="mb-1">LONGITUDE</label>
                                        <input type="text" name="long" class="form-control" value="<?= $data['long'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary mt-3" type="submit">Ubah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?= $this->endSection(); ?>