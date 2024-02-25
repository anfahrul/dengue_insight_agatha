<?= $this->extend('master_admin') ?>
<?= $this->section('page-content') ?>

<!-- Begin Page Content -->
<!-- Page Heading -->
<div class="card shadow mb-4 ">
    <div class="card-header py-3">
        <div class="container mt-2">
            <h1 class="h3 mb-4 text-gray-800">Data Kelurahan</h1>
            <div class="d-flex justify-content-end">
                <a href="<?= base_url('admin/dashboard/add_kelurahan') ?>" class="btn btn-primary mb-2">Tambah Kelurahan</a>
            </div>

            <div class="card-body px-0">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Nama Kelurahan</th>
                                <th>Kecamatan</th>
                                <th>Puskesmas</th>
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
                                        <?= $d['nama_kelurahan']; ?>
                                    </td>
                                    <td>
                                        <?= $modelKecamatan->getNamaKecamatanById($d['id_kecamatan']); ?>
                                    </td>
                                    <td>
                                        <?= $modelPuskesmas->getNamaPuskesmasById($d['id_puskesmas']); ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/dashboard/edit_data/kelurahan/' . $d['id_kelurahan']) ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="<?= base_url('admin/dashboard/delete/kelurahan/' . $d['id_kelurahan']) ?>" class="btn btn-sm btn-danger" onclick="confirm('Yakin ingin menghapus?')">Delete</a>
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