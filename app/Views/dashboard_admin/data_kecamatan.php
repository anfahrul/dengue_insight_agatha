<?= $this->extend('master_admin') ?>
<?= $this->section('page-content') ?>

<!-- Begin Page Content -->
<!-- Page Heading -->
<div class="card shadow mb-4 ">
    <div class="card-header py-3">
        <div class="container mt-2">
            <h1 class="h3 mb-4 text-gray-800">Data Kecamatan</h1>
            <div class="d-flex justify-content-end">
                <a href="<?= base_url('admin/dashboard/add_kecamatan') ?>" class="btn btn-primary mb-2">Tambah Kecamatan</a>
            </div>

            <div class="card-body px-0">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Nama Kecamatan</th>
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
                                        <?= $d['nama_kecamatan']; ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/dashboard/edit_data/kecamatan/' . $d['id_kecamatan']) ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="<?= base_url('admin/dashboard/delete/kecamatan/' . $d['id_kecamatan']) ?>" class="btn btn-sm btn-danger" onclick="confirm('Yakin ingin menghapus?')">Delete</a>
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