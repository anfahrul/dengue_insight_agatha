<?= $this->extend('master_admin') ?>
<?= $this->section('page-content') ?>

<!-- Begin Page Content -->
<!-- Page Heading -->
<div class="card shadow mb-4 ">
    <div class="card-header py-3">
        <div class="container mt-2">
            <h1 class="h3 mb-4 text-gray-800">Data Kecamatan</h1>
            <div class="d-flex">
                <form action="<?= base_url('/admin/dashboard/add_tahun/proses') ?>" method="post" enctype="multipart/form-data" id="tahun" name="tahun">
                    <div class="d-flex">
                        <div class="form-group">
                            <input type="number" name="tahun" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-outline-primary" type="submit">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body px-0">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Tahun</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data as $d) : ?>
                                <tr class="text-center">
                                    <td>
                                        <?= $no++ ?>
                                    </td>
                                    <td>
                                        <?= $d['tahun']; ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/dashboard/delete/tahun/' . $d['id_tahun']) ?>" class="btn btn-sm btn-danger" onclick="confirm('Yakin ingin menghapus?')">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>