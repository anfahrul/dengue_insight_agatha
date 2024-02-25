<?= $this->extend('master_admin'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center">Add Puskesmas</h1>
    <div class="row">
        <?php $error = session()->get('error'); ?>
        <div class="col-2"></div>
        <div class="col-8">
            <form action="<?= base_url('admin/dashboard/add_puskesmas/proses') ?>" method="post" enctype="multipart/form-data" id="add_create" name="add_create">
                <div class="form-group" method="POST">
                    <label>Nama Puskesmas</label>
                    <input type="text" name="nama_puskesmas" class="form-control">
                    <?php if ($error) : ?>
                        <p class='text-danger'><?= $error['nama_puskesmas'] ?></p>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label for="kecamatan">Kecamatan</label>
                    <select class="js-kecamatan form-control" id="kecamatan" name="kecamatan">
                        <?php
                            foreach ($kecamatan as $kec) : ?>
                            <option value="<?= $kec['id_kecamatan']; ?>"><?= $kec['nama_kecamatan']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if ($error) : ?>
                        <p class='text-danger'><?= $error['kecamatan'] ?></p>
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

<?= $this->section('script'); ?>
    <script>
        $(document).ready(function() {
            $('.js-kecamatan').select2();
        });
    </script>
<?= $this->endSection(); ?>