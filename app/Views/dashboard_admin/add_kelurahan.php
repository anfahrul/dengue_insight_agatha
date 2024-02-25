<?= $this->extend('master_admin'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center">Add Kelurahan</h1>
    <div class="row">
        <?php $error = session()->get('error'); ?>
        <div class="col-2"></div>
        <div class="col-8">
            <form action="<?= base_url('admin/dashboard/add_kelurahan/proses') ?>" method="post" enctype="multipart/form-data" id="add_create" name="add_create">
                <div class="form-group" method="POST">
                    <label>Nama Kelurahan</label>
                    <input type="text" name="nama_kelurahan" class="form-control">
                    <?php if ($error) : ?>
                        <p class='text-danger'><?= $error['nama_kelurahan'] ?></p>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label for="kecamatan">Kecamatan</label>
                    <select class="js-select form-control" id="kecamatan" name="kecamatan">
                        <?php
                            foreach ($kecamatan as $kec) : ?>
                            <option value="<?= $kec['id_kecamatan']; ?>"><?= $kec['nama_kecamatan']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if ($error) : ?>
                        <p class='text-danger'><?= $error['kecamatan'] ?></p>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label for="puskesmas">Puskesmas</label>
                    <select class="js-select form-control" id="puskesmas" name="puskesmas">
                        <?php
                            foreach ($puskesmas as $p) : ?>
                            <option value="<?= $p['id_puskesmas']; ?>"><?= $p['nama_puskesmas']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if ($error) : ?>
                        <p class='text-danger'><?= $error['puskesmas'] ?></p>
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
            $('.js-select').select2();
        });
    </script>
<?= $this->endSection(); ?>