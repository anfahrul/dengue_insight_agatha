<?= $this->extend('master_user') ?>
<?= $this->section('content') ?>

<!-- Begin Page Content -->
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data Demam Berdarah Dengue (DBD)</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4 ">
    <div class="card-header py-3">
        <div class="row align-items-end">
            <div class="col-6">
                <a href="<?= base_url('/dashboard/tambah_data') ?>" class="btn btn-primary float-start">Tambah
                    Data</a>
            </div>
            <!-- <div class="col-6">
                <form method=post action="<?= base_url('/dashboard/cluster') ?>">
                    <table class="table text-center">
                        <input type="text" name="id_cluster" value="<?= $cluster['id_cluster'] ?>" hidden>
                        <tr>
                            <td></td>
                            <td>C1</td>
                            <td>C2</td>
                            <td>C3</td>
                        </tr>
                        <tr>
                            <th>Usia</th>
                            <td><input type=" text" name="c1x" class="form-control text-center" value="<?= $cluster['c1x'] ?>">
                            </td>
                            <td><input type="text" name="c2x" class="form-control text-center" value="<?= $cluster['c2x'] ?>">
                            </td>
                            <td style="width: 7rem;"><input type="text" name="c3x" class="form-control text-center" value="<?= $cluster['c3x'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>Berat Badan</th>
                            <td style="width: 7rem;"><input type="text" name="c1y" class="form-control text-center" value="<?= $cluster['c1y'] ?>">
                            </td>
                            <td><input type="text" name="c2y" class="form-control text-center" value="<?= $cluster['c2y'] ?>">
                            </td>
                            <td><input type="text" name="c3y" class="form-control text-center" value="<?= $cluster['c3y'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>Tinggi Badan</th>
                            <td><input type="text" name="c1z" class="form-control text-center" value="<?= $cluster['c1z'] ?>">
                            </td>
                            <td style="width: 7rem;"><input type="text" name="c2z" class="form-control text-center" value="<?= $cluster['c2z'] ?>">
                            </td>
                            <td><input type="text" name="c3z" class="form-control text-center" value="<?= $cluster['c3z'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><button class="btn btn-primary float-end w-100">Proses</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div> -->
        </div>

        <div class="card-body px-0">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nik</th>
                            <th>Nama Anak</th>
                            <th>Tanggal Lahir</th>
                            <th>Usia (Bulan)</th>
                            <th>TB</th>
                            <th>BB</th>
                            <th style="width: 6rem;">Aksi</th>
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
                                    <?= $d['nik'] ?>
                                </td>
                                <td>
                                    <?= $d['nama_anak'] ?>
                                </td>
                                <td>
                                    <?php
                                    $originalDate = ($d['tgl_lahir']);
                                    $newDate = date("d-m-Y", strtotime($originalDate));
                                    echo $newDate;
                                    ?>
                                </td>
                                <td class='text-center'>
                                    <?php
                                    $tgl1 = strtotime($d['tgl_ukur']);
                                    $tgl2 = strtotime($d['tgl_lahir']);

                                    $jarak = $tgl1 - $tgl2;

                                    $bulan = $jarak / 60 / 60 / 24 / 31;
                                    ?>
                                    <?= ceil($bulan) ?>

                                </td>
                                <td>
                                    <?= $d['tinggi_anak'] ?>
                                </td>
                                <td>
                                    <?= $d['berat_anak'] ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('/dashboard/edit_data/' . $d['id_data']) ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="<?= base_url('/dashboard/hapus_data/' . $d['id_data']) ?>" class="btn btn-sm btn-danger" onclick="confirm('Yakin ingin menghapus?')">Hapus</a>
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