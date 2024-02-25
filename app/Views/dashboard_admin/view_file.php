<?= $this->extend('master_admin') ?>
<?= $this->section('page-content') ?>

<!-- Begin Page Content -->
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data Balita</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4 ">
    <div class="card-header py-3">
        <div class="card-body px-0">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nik</th>
                            <th>Nama Anak</th>
                            <th>Tanggal Lahir</th>
                            <th>Tanggal ukur</th>
                            <th>Usia (Bulan)</th>
                            <th>TB</th>
                            <th>BB</th>
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
                                <td>
                                    <?php
                                    $originalDate = ($d['tgl_ukur']);
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
                                    <?= $d['tinggi_badan'] ?>
                                </td>
                                <td>
                                    <?= $d['berat_badan'] ?>
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