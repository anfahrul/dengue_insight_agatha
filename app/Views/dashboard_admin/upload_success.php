<?= $this->extend('master_admin') ?>
<?= $this->section('page-content') ?>

<!-- Begin Page Content -->
<!-- Page Heading -->
<div class="card shadow mb-4 ">
    <div class="card-header py-3">
        <div class="container mt-2">
            <h1 class="h3 mb-4 text-gray-800">Data Batas Wilayah</h1>
            <p>Upload batas wilayah kelurahan se-kota Kendari dengan dengan format data <b>.geojson</b></p>
            <div class="d-flex justify-content-end">
            </div>

            <div class="card-body px-0">
            <h3>File berhasil diupload!</h3>
                <p><?= anchor('admin/data/batas_wilayah', '<- Kembali') ?></p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>