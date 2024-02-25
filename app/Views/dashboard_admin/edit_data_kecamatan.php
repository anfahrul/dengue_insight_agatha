<?= $this->extend('master_admin'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center">Edit Data Kecamatan</h1>
    <div class="row">
        <?php $error = session()->get('error'); ?>
        <div class="col-2"></div>
        <div class="col-8">
            <form action="<?= base_url('/admin/dashboard/edit_data/kecamatan/proses') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group" method="POST">
                    <label>Nama Kecamatan</label>
                    <input type="text" name="nama_kecamatan" value="<?= $data['nama_kecamatan']; ?>" class="form-control">
                    <input type="hidden" name="id_kecamatan" value="<?= $data['id_kecamatan']; ?>" class="form-control">
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