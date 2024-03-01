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
                <!-- <form>
                    <div class="form-group">
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form> -->

                <?php foreach ($errors as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>

                <?= form_open_multipart('/admin/data/batas_wilayah/upload') ?>
                    <input type="file" name="userfile">
                    <br><br>
                    <input type="submit" class="btn btn-primary" value="upload">
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>