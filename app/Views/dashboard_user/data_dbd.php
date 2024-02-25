<?= $this->extend('master_user') ?>
<?= $this->section('content') ?>

<!-- Begin Page Content -->
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data Demam Berdarah Dengue (DBD)</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4 ">
    <div class="card-header py-3">
        <div class="d-flex justify-content-between">
            <div>
                
            </div>
            <div>
                <form action="<?= base_url('/dashboard/data_dbd/get_by_year') ?>" method="post" enctype="multipart/form-data" id="get_by_year" name="get_by_year">
                    <div class="d-flex">
                        <div class="form-group">
                            <select class="js-tahun form-control" id="tahun" name="tahun">
                                <option selected="true" value="<?= $year; ?>" disabled>Tahun <?= $modelTahun->getNamaTahunById($year); ?></option>
                                <?php
                                    foreach ($tahun as $t) : ?>
                                    <option value="<?= $t['id_tahun']; ?>">Tahun <?= $t['tahun']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">Lihat Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card-body px-0">
        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th rowspan="2">No</th>
                        <th rowspan="2">Kelurahan</th>
                        <th rowspan="2">Penduduk</th>
                        <th colspan="5">Kasus DBD</th>
                        <th rowspan="2">Total Kasus</th>
                        <th rowspan="2" style="width: 6rem;">Aksi</th>
                    </tr>
                    <tr class="text-center">
                        <th>Wanita</th>
                        <th>Pria</th>
                        <th>Balita</th>
                        <th>Remaja</th>
                        <th>Dewasa</th>
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
                                <?= $modelKelurahan->getNamaKelurahanById($d['id_kelurahan']); ?>
                            </td>
                            <td>
                                <?= $d['jumlah_penduduk'] ?>
                            </td>
                            <td>
                                <?= $d['perempuan'] ?>
                            </td>
                            <td>
                                <?= $d['laki_laki'] ?>
                            </td>
                            <td>
                                <?= $d['balita'] ?>
                            </td>
                            <td>
                                <?= $d['remaja'] ?>
                            </td>
                            <td>
                                <?= $d['dewasa'] ?>
                            </td>
                            <td>
                                <?= $d['jumlah_kasus'] ?>
                            </td>
                            
                            <td>
                                <a href="<?= base_url('/dashboard/edit_data/' . $d['id_data_dbd']) ?>" class="btn btn-sm btn-warning">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script'); ?>
    <script>
        $(document).ready(function() {
            $('.js-tahun').select2();
        });
    </script>
<?= $this->endSection(); ?>