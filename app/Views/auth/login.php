<?php

use PharIo\Manifest\Url;
?>
<?= $this->extend('auth/template/index'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center mt-5">

        <div class="col-md-5 mt-5">
            <div class="card o-hidden border-0 shadow-lg mt-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                </div>
                                <?php if (session()->get('error')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= session()->get('error') ?>
                                    </div>
                                <?php endif ?>

                                <?php if (session()->get('success')) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= session()->get('success') ?>
                                    </div>
                                <?php endif ?>
                                <form class="user " action="<?= base_url('/login/proses') ?>" method="POST">
                                    <div class="form-group">
                                        <input type="username" name="username" class="form-control form-control-user" id="exampleInputUsername" aria-describedby="usernameHelp" placeholder="Input Username Anda...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<?= $this->endSection(); ?>