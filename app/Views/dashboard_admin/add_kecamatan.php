<?= $this->extend('master_admin'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center">Add Kecamatan</h1>
    <div class="row">
        <?php $error = session()->get('error'); ?>
        <div class="col-2"></div>
        <div class="col-8">
            <form action="<?= base_url('admin/dashboard/add_kecamatan/proses') ?>" method="post" enctype="multipart/form-data" id="add_create" name="add_create">
                <div class="form-group" method="POST">
                    <label>Nama Kecamatan</label>
                    <input type="text" name="nama_kecamatan" class="form-control">
                    <?php if ($error) : ?>
                        <p class='text-danger'><?= $error['nama_kecamatan'] ?></p>
                    <?php endif ?>
                </div>
                <div class="text-end">
                    <button class="btn btn-primary mt-3" type="submit">Submit Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>