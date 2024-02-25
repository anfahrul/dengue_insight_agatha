<?= $this->extend('master_admin'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center">Edit Data</h1>
    <div class="row">
        <?php $error = session()->get('error'); ?>
        <div class="col-2"></div>
        <div class="col-8">
            <form action="<?= base_url('/admin/dashboard/edit_data/proses') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group" method="POST">
                    <label>username</label>
                    <input type="text" name="username" value="<?= $data['username']; ?>" class="form-control">
                    <input type="hidden" name="id_user" value="<?= $data['id_user']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>usertype</label>
                    <input type="text" name="usertype" value="<?= $data['usertype']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>email</label>
                    <input type="text" name="email" value="<?= $data['email']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>password</label>
                    <input type="text" name="password" value="<?= $data['password']; ?>" class="form-control">
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