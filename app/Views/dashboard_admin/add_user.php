<?= $this->extend('master_admin'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center">Add User</h1>
    <div class="row">
        <?php $error = session()->get('error'); ?>
        <div class="col-2"></div>
        <div class="col-8">
            <form action="<?= base_url('admin/dashboard/add_user/proses') ?>" method="post" enctype="multipart/form-data" id="add_create" name="add_create">
                <div class="form-group" method="POST">
                    <label>username</label>
                    <input type="text" name="username" class="form-control">
                    <?php if ($error) : ?>
                        <p class='text-danger'><?= $error['username'] ?></p>
                    <?php endif ?>
                </div>
                <div class="form-group" method="POST">
                    <label>usertype</label>
                    <input type="text" name="usertype" class="form-control">
                    <?php if ($error) : ?>
                        <p class='text-danger'><?= $error['usertype'] ?></p>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>email</label>
                    <input type="text" name="email" class="form-control">
                    <?php if ($error) : ?>
                        <p class='text-danger'><?= $error['email'] ?></p>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>password</label>
                    <input type="text" name="password" class="form-control">
                    <?php if ($error) : ?>
                        <p class='text-danger'><?= $error['password'] ?></p>
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