<?= $this->extend('master_user'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Data DBD Kelurahan <b><?= $modelKelurahan->getNamaKelurahanById($data['id_kelurahan']); ?></b></h1>
    <section>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="<?= base_url('/dashboard/edit_data/proses') ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-6">
                                    <input type="hidden" name="id_data_dbd" value="<?= $data['id_data_dbd'] ?>">
                                    <div class="form-group py-2" method="POST">
                                        <label class="mb-1">Jumlah Penduduk</label>
                                        <input type="hidden" name="jumlah_penduduk" value="<?= $data['jumlah_penduduk'] ?>">
                                        <input type="number" name="jumlah_penduduk" class="form-control" value="<?= $data['jumlah_penduduk'] ?>">
                                    </div>
                                    <div class="form-group py-2" method="POST">
                                        <label class="mb-1">Kasus pada Perempuan</label>
                                        <input type="hidden" name="perempuan" value="<?= $data['perempuan'] ?>">
                                        <input type="number" name="perempuan" class="form-control" value="<?= $data['perempuan'] ?>">
                                    </div>
                                    <div class="form-group py-2" method="POST">
                                        <label class="mb-1">Kasus pada Laki-Laki</label>
                                        <input type="hidden" name="laki_laki" value="<?= $data['laki_laki'] ?>">
                                        <input type="number" name="laki_laki" class="form-control" value="<?= $data['laki_laki'] ?>">
                                    </div>
                                    <div class="form-group py-2" method="POST">
                                        <label class="mb-1">Kasus pada Balita</label>
                                        <input type="hidden" name="balita" value="<?= $data['balita'] ?>">
                                        <input type="text" name="balita" class="form-control" value="<?= $data['balita'] ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group py-2" method="POST">
                                        <label class="mb-1">Kasus pada Remaja</label>
                                        <input type="hidden" name="remaja" value="<?= $data['remaja'] ?>">
                                        <input type="text" name="remaja" class="form-control" value="<?= $data['remaja'] ?>">
                                    </div>
                                    <div class="form-group py-2" method="POST">
                                        <label class="mb-1">Kasus pada Orang Dewasa</label>
                                        <input type="hidden" name="dewasa" value="<?= $data['dewasa'] ?>">
                                        <input type="text" name="dewasa" class="form-control" value="<?= $data['dewasa'] ?>">
                                    </div>
                                    <div class="form-group py-2" method="POST">
                                        <label class="mb-1">Total Kasus</label>
                                        <input type="hidden" name="jumlah_kasus" value="<?= $data['jumlah_kasus'] ?>">
                                        <input type="text" name="jumlah_kasus" class="form-control" value="<?= $data['jumlah_kasus'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary mt-3" type="submit">Perbarui</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?= $this->endSection(); ?>