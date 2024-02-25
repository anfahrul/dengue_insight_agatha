<?= $this->extend('master_admin'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center">Edit Data Puskesmas</h1>
    <div class="row">
        <?php $error = session()->get('error'); ?>
        <div class="col-2"></div>
        <div class="col-8">
            <form action="<?= base_url('/admin/dashboard/edit_data/puskesmas/proses') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group" method="POST">
                    <label>Nama Puskesmas</label>
                    <input type="text" name="nama_puskesmas" value="<?= $data['nama_puskesmas']; ?>" class="form-control">
                    <input type="hidden" name="id_puskesmas" value="<?= $data['id_puskesmas']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="kecamatan">Kecamatan</label>
                    <select class="js-kecamatan form-control" id="kecamatan" name="kecamatan">
                        <option selected="true" value="<?= $data['id_kecamatan']; ?>"><?= $modelKecamatan->getNamaKecamatanById($data['id_kecamatan']); ?></option>
                        <?php
                            foreach ($kecamatan as $kec) : ?>
                            <option value="<?= $kec['id_kecamatan']; ?>"><?= $kec['nama_kecamatan']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="text-end">
                    <button class="btn btn-primary mt-3" type="submit">Ubah</button>
                </div>
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>
<?= $this->endSection(); ?>