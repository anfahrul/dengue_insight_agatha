<?= $this->extend('master_admin'); ?>

<?= $this->section('page-content'); ?>

<?php

//mengambil data c1x, c1y, c2x, c2y dari database
$c1x = $cluster['c1x'];
$c2x = $cluster['c2x'];
$c3x = $cluster['c3x'];
$c1y = $cluster['c1y'];
$c2y = $cluster['c2y'];
$c3y = $cluster['c3y'];
$c1z = $cluster['c1z'];
$c2z = $cluster['c2z'];
$c3z = $cluster['c3z'];

// dd($cluster);

$iterasi1 = [
    'c1x' => $c1x,
    'c2x' => $c2x,
    'c3x' => $c3x,
    'c1y' => $c1y,
    'c2y' => $c2y,
    'c3y' => $c3y,
    'c1z' => $c1z,
    'c2z' => $c2z,
    'c3z' => $c3z,
];

$iterasi = 1;

$jumlah_c1 = 0;
$jumlah_c2 = 0;
$jumlah_c3 = 0;

?>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Identifikasi Balita</h1>

<!-- DataTales Example -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="font-weight-bold text-utama">Iterasi ke
            <?= $iterasi ?>
        </h6>
        <p>Pusat Cluster Ke-1 : {
            <?= $c1x ?> ,
            <?= $c1y ?> ,
            <?= $c1z ?> }
        </p>
        <p>Pusat Cluster Ke-2 : {
            <?= $c2x ?> ,
            <?= $c2y ?> ,
            <?= $c2z ?> }
        </p>
        <p>Pusat Cluster Ke-3 : {
            <?= $c3x ?> ,
            <?= $c3y ?> ,
            <?= $c3z ?> }
        </p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="display table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nik</th>
                        <th>Nama Anak</th>
                        <th>Tanggal Lahir</th>
                        <th>Usia (Bulan)</th>
                        <th>TB</th>
                        <th>BB</th>
                        <th>C1 (Normal)</th>
                        <th>C2 (Kurang)</th>
                        <th>C3 (Lebih)</th>
                        <th>C</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $no = 1;
                    foreach ($data as $d) : ?>
                        <tr>
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

                            <?php
                            $x = ceil($bulan);
                            $y = $d['berat_anak'];
                            $z = $d['tinggi_anak'];
                            $c1 = sqrt(pow(($x - $c1x), 2) + pow(($y - $c1y), 2) + pow(($z - $c1z), 2));
                            $c2 = sqrt(pow(($x - $c2x), 2) + pow(($y - $c2y), 2) + pow(($z - $c2z), 2));
                            $c3 = sqrt(pow(($x - $c3x), 2) + pow(($y - $c3y), 2) + pow(($z - $c3z), 2));


                            if ($c1 < $c2 and $c1 < $c3) {
                                $ketmin = 'C1';
                                $jumlah_c1++;
                                $array_c1x[] = $x;
                                $array_c1y[] = $y;
                                $array_c1z[] = $z;
                            } elseif ($c2 < $c1 and $c2 < $c3) {
                                $ketmin = 'C2';
                                $jumlah_c2++;
                                $array_c2x[] = $x;
                                $array_c2y[] = $y;
                                $array_c2z[] = $z;
                            } else {
                                $ketmin = 'C3';
                                $jumlah_c3++;
                                $array_c3x[] = $x;
                                $array_c3y[] = $y;
                                $array_c3z[] = $z;
                            }

                            ?>

                            <td>
                                <?= number_format($c1, 2) ?>
                            </td>
                            <td>
                                <?= number_format($c2, 2) ?>
                            </td>
                            <td>
                                <?= number_format($c3, 2) ?>
                            </td>
                            <td>
                                <?= $ketmin ?>
                            </td>
                        <?php endforeach; ?>

                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-10 mx-auto">
                <canvas id="myChart1"></canvas>
            </div>
        </div>
    </div>
</div>

<?php
$i1_c1 = $jumlah_c1;
$i1_c2 = $jumlah_c2;
$i1_c3 = $jumlah_c3;

$iterasic1 = [
    'c1x' => $array_c1x,
    'c1y' => $array_c1y,
    'c1z' => $array_c1z,
];

$iterasic2 = [
    'c2x' => $array_c2x,
    'c2y' => $array_c2y,
    'c2z' => $array_c2z,
];

$iterasic3 = [
    'c3x' => $array_c3x,
    'c3y' => $array_c3y,
    'c3z' => $array_c3z,
];

session()->set('iterasic1', $iterasic1);
session()->set('iterasic2', $iterasic2);
session()->set('iterasic3', $iterasic3);

$iterasi++;
$c1x = array_sum($array_c1x) / $jumlah_c1;
$c1y = array_sum($array_c1y) / $jumlah_c1;
$c1z = array_sum($array_c1z) / $jumlah_c1;
$c2x = array_sum($array_c2x) / $jumlah_c2;
$c2y = array_sum($array_c2y) / $jumlah_c2;
$c2z = array_sum($array_c2z) / $jumlah_c2;
$c3x = array_sum($array_c3x) / $jumlah_c3;
$c3y = array_sum($array_c3y) / $jumlah_c3;
$c3z = array_sum($array_c3z) / $jumlah_c3;

$jumlah_c1 = 0;
$jumlah_c2 = 0;
$jumlah_c3 = 0;

$array_c1x = [];
$array_c1y = [];
$array_c1z = [];
$array_c2x = [];
$array_c2y = [];
$array_c2z = [];
$array_c3x = [];
$array_c3y = [];
$array_c3z = [];

?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class=" font-weight-bold text-utama">Iterasi ke
            <?= $iterasi ?>
        </h6>
        <p>Pusat Cluster Ke-1 : {
            <?= number_format($c1x, 2) ?> ,
            <?= number_format($c1y, 2) ?> ,
            <?= number_format($c1z, 2) ?> }
        </p>
        <p>Pusat Cluster Ke-2 : {
            <?= number_format($c2x, 2) ?> ,
            <?= number_format($c2y, 2) ?> ,
            <?= number_format($c2z, 2) ?> }
        </p>
        <p>Pusat Cluster Ke-3 : {
            <?= number_format($c3x, 2) ?> ,
            <?= number_format($c3y, 2) ?> ,
            <?= number_format($c3z, 2) ?> }
        </p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="display table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nik</th>
                        <th>Nama Anak</th>
                        <th>Tanggal Lahir</th>
                        <th>Usia (Bulan)</th>
                        <th>TB</th>
                        <th>BB</th>
                        <th>C1 (Normal)</th>
                        <th>C2 (Kurang)</th>
                        <th>C3 (Lebih)</th>
                        <th>C</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $no = 1;
                    foreach ($data as $d) : ?>
                        <tr>
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

                            <?php
                            $x = ceil($bulan);
                            $y = $d['berat_anak'];
                            $z = $d['tinggi_anak'];
                            $c1 = sqrt(pow(($x - $c1x), 2) + pow(($y - $c1y), 2) + pow(($z - $c1z), 2));
                            $c2 = sqrt(pow(($x - $c2x), 2) + pow(($y - $c2y), 2) + pow(($z - $c2z), 2));
                            $c3 = sqrt(pow(($x - $c3x), 2) + pow(($y - $c3y), 2) + pow(($z - $c3z), 2));


                            if ($c1 < $c2 and $c1 < $c3) {
                                $ketmin = 'C1';
                                $jumlah_c1++;
                                $array_c1x[] = $x;
                                $array_c1y[] = $y;
                                $array_c1z[] = $z;
                            } elseif ($c2 < $c1 and $c2 < $c3) {
                                $ketmin = 'C2';
                                $jumlah_c2++;
                                $array_c2x[] = $x;
                                $array_c2y[] = $y;
                                $array_c2z[] = $z;
                            } else {
                                $ketmin = 'C3';
                                $jumlah_c3++;
                                $array_c3x[] = $x;
                                $array_c3y[] = $y;
                                $array_c3z[] = $z;
                            }
                            ?>

                            <td>
                                <?= number_format($c1, 2) ?>
                            </td>
                            <td>
                                <?= number_format($c2, 2) ?>
                            </td>
                            <td>
                                <?= number_format($c3, 2) ?>
                            </td>
                            <td>
                                <?= $ketmin ?>
                            </td>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-10 mx-auto">
                <canvas id="myChart2"></canvas>
            </div>
        </div>
    </div>
</div>

<?php
$i2_c1 = $jumlah_c1;
$i2_c2 = $jumlah_c2;
$i2_c3 = $jumlah_c3;

$iterasi++;
$c1x = array_sum($array_c1x) / $jumlah_c1;
$c1y = array_sum($array_c1y) / $jumlah_c1;
$c1z = array_sum($array_c1z) / $jumlah_c1;
$c2x = array_sum($array_c2x) / $jumlah_c2;
$c2y = array_sum($array_c2y) / $jumlah_c2;
$c2z = array_sum($array_c2z) / $jumlah_c2;
$c3x = array_sum($array_c3x) / $jumlah_c3;
$c3y = array_sum($array_c3y) / $jumlah_c3;
$c3z = array_sum($array_c3z) / $jumlah_c3;

$iterasi2 = [
    'c1x' => $c1x,
    'c2x' => $c2x,
    'c3x' => $c3x,
    'c1y' => $c1y,
    'c2y' => $c2y,
    'c3y' => $c3y,
    'c1z' => $c1z,
    'c2z' => $c2z,
    'c3z' => $c3z,
];

$jumlah_c1 = 0;
$jumlah_c2 = 0;
$jumlah_c3 = 0;

$array_c1x = [];
$array_c1y = [];
$array_c1z = [];
$array_c2x = [];
$array_c2y = [];
$array_c2z = [];
$array_c3x = [];
$array_c3y = [];
$array_c3z = [];

$nilai = [
    'c1x' => $c1x,
    'c2x' => $c2x,
    'c3x' => $c3x,
    'c1y' => $c1y,
    'c2y' => $c2y,
    'c3y' => $c3y,
    'c1z' => $c1z,
    'c2z' => $c2z,
    'c3z' => $c3z,
];

session()->set('nilai', $nilai);
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class=" font-weight-bold text-utama">Iterasi ke
            <?= $iterasi ?>
        </h6>
        <p>Pusat Cluster Ke-1 : {
            <?= number_format($c1x, 2) ?> ,
            <?= number_format($c1y, 2) ?> }
            <?= number_format($c1z, 2) ?> }
        </p>
        <p>Pusat Cluster Ke-2 : {
            <?= number_format($c2x, 2) ?> ,
            <?= number_format($c2y, 2) ?> ,
            <?= number_format($c2z, 2) ?> }
        </p>
        <p>Pusat Cluster Ke-3 : {
            <?= number_format($c3x, 2) ?> ,
            <?= number_format($c3y, 2) ?> ,
            <?= number_format($c3z, 2) ?> }
        </p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="display table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nik</th>
                        <th>Nama Anak</th>
                        <th>Tanggal Lahir</th>
                        <th>Usia (Bulan)</th>
                        <th>TB</th>
                        <th>BB</th>
                        <th>C1 (Normal)</th>
                        <th>C2 (Kurang)</th>
                        <th>C3 (Lebih)</th>
                        <th>C</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $no = 1;
                    foreach ($data as $d) : ?>
                        <tr>
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

                            <?php
                            $x = ceil($bulan);
                            $y = $d['berat_anak'];
                            $z = $d['tinggi_anak'];
                            $c1 = sqrt(pow(($x - $c1x), 2) + pow(($y - $c1y), 2) + pow(($z - $c1z), 2));
                            $c2 = sqrt(pow(($x - $c2x), 2) + pow(($y - $c2y), 2) + pow(($z - $c2z), 2));
                            $c3 = sqrt(pow(($x - $c3x), 2) + pow(($y - $c3y), 2) + pow(($z - $c3z), 2));


                            if ($c1 < $c2 and $c1 < $c3) {
                                $ketmin = 'C1';
                                $jumlah_c1++;
                                $array_c1x[] = $x;
                                $array_c1y[] = $y;
                                $array_c1z[] = $z;
                                $long_c1[] = $d['long'];
                                $lat_c1[] = $d['lat'];
                            } elseif ($c2 < $c1 and $c2 < $c3) {
                                $ketmin = 'C2';
                                $jumlah_c2++;
                                $array_c2x[] = $x;
                                $array_c2y[] = $y;
                                $array_c2z[] = $z;
                                $long_c2[] = $d['long'];
                                $lat_c2[] = $d['lat'];
                            } else {
                                $ketmin = 'C3';
                                $jumlah_c3++;
                                $array_c3x[] = $x;
                                $array_c3y[] = $y;
                                $array_c3z[] = $z;
                                $long_c3[] = $d['long'];
                                $lat_c3[] = $d['lat'];
                            }
                            ?>

                            <td>
                                <?= number_format($c1, 2) ?>
                            </td>
                            <td>
                                <?= number_format($c2, 2) ?>
                            </td>
                            <td>
                                <?= number_format($c3, 2) ?>
                            </td>
                            <td>
                                <?= $ketmin ?>
                            </td>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-10 mx-auto">
                <canvas id="myChart3"></canvas>
            </div>
        </div>
    </div>
</div>

<?php
$i3_c1 = $jumlah_c1;
$i3_c2 = $jumlah_c2;
$i3_c3 = $jumlah_c3;

session()->set('lat_c1', $lat_c1);
session()->set('long_c1', $long_c1);
session()->set('lat_c2', $lat_c2);
session()->set('long_c2', $long_c2);
session()->set('lat_c3', $lat_c3);
session()->set('long_c3', $long_c3);


?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<script>
    // Data yang akan ditampilkan di grafik
    var data = {
        labels: ['Normal', 'Kurang', 'Lebih'],
        datasets: [{
            label: 'Data Balita',
            data: [<?= $i1_c1; ?>, <?= $i1_c2; ?>, <?= $i1_c3; ?>],
            backgroundColor: [
                'rgba(75, 192, 192, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 205, 86, 0.2)',
            ],
            borderColor: [
                'rgb(75, 192, 192)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
            ],
            borderWidth: 1
        }]
    };

    // Opsi konfigurasi grafik
    var options = {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    };

    // Membuat grafik batang dengan menggunakan Chart.js
    var ctx = document.getElementById('myChart1').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });
</script>

<script>
    // Data yang akan ditampilkan di grafik
    var data = {
        labels: ['Normal', 'Kurang', 'Lebih'],
        datasets: [{
            label: 'Data Balita',
            data: [<?= $i2_c1; ?>, <?= $i2_c2; ?>, <?= $i2_c3; ?>],
            backgroundColor: [
                'rgba(75, 192, 192, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 205, 86, 0.2)',
            ],
            borderColor: [
                'rgb(75, 192, 192)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
            ],
            borderWidth: 1
        }]
    };

    // Opsi konfigurasi grafik
    var options = {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    };

    // Membuat grafik batang dengan menggunakan Chart.js
    var ctx = document.getElementById('myChart2').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });
</script>

<script>
    // Data yang akan ditampilkan di grafik
    var data = {
        labels: ['Normal', 'Kurang', 'Lebih'],
        datasets: [{
            label: 'Data Balita',
            data: [<?= $i3_c1; ?>, <?= $i3_c2; ?>, <?= $i3_c3; ?>],
            backgroundColor: [
                'rgba(75, 192, 192, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 205, 86, 0.2)',
            ],
            borderColor: [
                'rgb(75, 192, 192)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
            ],
            borderWidth: 1
        }]
    };

    // Opsi konfigurasi grafik
    var options = {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    };

    // Membuat grafik batang dengan menggunakan Chart.js
    var ctx = document.getElementById('myChart3').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });
</script>
<?= $this->endSection(); ?>