<?= $this->extend('master_admin'); ?>

<?= $this->section('page-content'); ?>
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Hasil Identifikasi DBD</h1>

<?php
$c1a = $cluster->c1a;
$c1b = $cluster->c1b;
$c1c = $cluster->c1c;
$c1d = $cluster->c1d;
$c1e = $cluster->c1e;
$c1f = $cluster->c1f;
$c2a = $cluster->c2a;
$c2b = $cluster->c2b;
$c2c = $cluster->c2c;
$c2d = $cluster->c2d;
$c2e = $cluster->c2e;
$c2f = $cluster->c2f;
$c3a = $cluster->c3a;
$c3b = $cluster->c3b;
$c3c = $cluster->c3c;
$c3d = $cluster->c3d;
$c3e = $cluster->c3e;
$c3f = $cluster->c3f;

$c1a_previously = 0;
$c1b_previously = 0;
$c1c_previously = 0;
$c1d_previously = 0;
$c1e_previously = 0;
$c1f_previously = 0;
$c2a_previously = 0;
$c2b_previously = 0;
$c2c_previously = 0;
$c2d_previously = 0;
$c2e_previously = 0;
$c2f_previously = 0;
$c3a_previously = 0;
$c3b_previously = 0;
$c3c_previously = 0;
$c3d_previously = 0;
$c3e_previously = 0;
$c3f_previously = 0;

$iterasi = 1;

$jumlah_c1 = 0;
$jumlah_c2 = 0;
$jumlah_c3 = 0;

$array_c1 = [];
$array_c2 = [];
$array_c3 = [];

$lat_c1 = [];
$lat_c2 = [];
$lat_c3 = [];
$lon_c1 = [];
$lon_c2 = [];
$lon_c3 = [];

$pembagian_cluster_seluruh_iterasi = [];

$final_result = [];

$final_cluster = [
    'c1' => [],
    'c2' => [],
    'c3' => [],
];

while (true) { ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-utama">Iterasi ke
                <?= $iterasi ?>
            </h6>
            <p>Pusat Cluster 1: {
                <?= number_format($c1a, 2) ?>, <?= number_format($c1b, 2)  ?>, <?= number_format($c1c, 2)  ?>, <?= number_format($c1d, 2)  ?>, <?= number_format($c1e, 2)  ?>, <?= number_format($c1f, 2)  ?> 
            }
        </p>
        <p>Pusat Cluster 2: {
                <?= number_format($c2a, 2) ?>, <?= number_format($c2b, 2)  ?>, <?= number_format($c2c, 2)  ?>, <?= number_format($c2d, 2)  ?>, <?= number_format($c2e, 2)  ?>, <?= number_format($c2f, 2)  ?> 
            }
        </p>
        <p>Pusat Cluster 3: {
                <?= number_format($c3a, 2) ?>, <?= number_format($c3b, 2)  ?>, <?= number_format($c3c, 2)  ?>, <?= number_format($c3d, 2)  ?>, <?= number_format($c3e, 2)  ?>, <?= number_format($c3f, 2)  ?> 
            }
            </p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="display table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Kelurahan</th>
                            <th>Total Kasus</th>
                            <th>Remaja</th>
                            <th>Wanita</th>
                            <th>Pria</th>
                            <th>Balita</th>
                            <th>Orang Dewasa</th>
                            <th>d(k,c1)</th>
                            <th>d(k,c2)</th>
                            <th>d(k,c3)</th>
                            <th>Cluster</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php $no = 1;
                        foreach ($data as $dat) : ?>
                            <tr>
                                <td>
                                    <?= $no++ ?>
                                </td>
                                <td>
                                    <?= $modelKelurahan->getNamaKelurahanById($dat['id_kelurahan']); ?>
                                </td>
                                <td>
                                    <?= $dat['jumlah_kasus'] ?>
                                </td>
                                <td>
                                    <?= $dat['remaja'] ?>
                                </td>
                                <td>
                                    <?= $dat['perempuan'] ?>
                                </td>
                                <td>
                                    <?= $dat['laki_laki'] ?>
                                </td>
                                <td>
                                    <?= $dat['balita'] ?>
                                </td>
                                <td>
                                    <?= $dat['dewasa'] ?>
                                </td>

                                <?php
                                    $a = $dat['jumlah_kasus'];
                                    $b = $dat['remaja'];
                                    $c = $dat['perempuan'];
                                    $d = $dat['laki_laki'];
                                    $e = $dat['balita'];
                                    $f = $dat['dewasa'];
                                    $c1 = sqrt(pow(($a - $c1a), 2) + pow(($b - $c1b), 2) + pow(($c - $c1c), 2) + pow(($d - $c1d), 2) + pow(($e - $c1e), 2) + pow(($f - $c1f), 2));
                                    $c2 = sqrt(pow(($a - $c2a), 2) + pow(($b - $c2b), 2) + pow(($c - $c2c), 2) + pow(($d - $c2d), 2) + pow(($e - $c2e), 2) + pow(($f - $c2f), 2));
                                    $c3 = sqrt(pow(($a - $c3a), 2) + pow(($b - $c3b), 2) + pow(($c - $c3c), 2) + pow(($d - $c3d), 2) + pow(($e - $c3e), 2) + pow(($f - $c3f), 2));
                                    
                                    if ($c1 < $c2 and $c1 < $c3) {
                                        $ketmin = 'C1';
                                        $jumlah_c1++;

                                        $newData = [
                                            'a' => $a,
                                            'b' => $b,
                                            'c' => $c,
                                            'd' => $d,
                                            'e' => $e,
                                            'f' => $f,
                                        ];
                                        array_push($array_c1, $newData);
                                        $final_cluster['c1'][] = $modelKelurahan->getNamaKelurahanById($dat['id_kelurahan']);
                                        array_push($lat_c1, $modelKelurahan->getLatById($dat['id_kelurahan']));
                                        array_push($lon_c1, $modelKelurahan->getLonById($dat['id_kelurahan']));
                                    } elseif ($c2 < $c1 and $c2 < $c3) {
                                        $ketmin = 'C2';
                                        $jumlah_c2++;
                                        
                                        $newData = [
                                            'a' => $a,
                                            'b' => $b,
                                            'c' => $c,
                                            'd' => $d,
                                            'e' => $e,
                                            'f' => $f
                                        ];
                                        array_push($array_c2, $newData);
                                        $final_cluster['c2'][] = $modelKelurahan->getNamaKelurahanById($dat['id_kelurahan']);
                                        array_push($lat_c2, $modelKelurahan->getLatById($dat['id_kelurahan']));
                                        array_push($lon_c2, $modelKelurahan->getLonById($dat['id_kelurahan']));
                                    } else {
                                        $ketmin = 'C3';
                                        $jumlah_c3++;
                                        
                                        $newData = [
                                            'a' => $a,
                                            'b' => $b,
                                            'c' => $c,
                                            'd' => $d,
                                            'e' => $e,
                                            'f' => $f
                                        ];
                                        array_push($array_c3, $newData);
                                        $final_cluster['c3'][] = $modelKelurahan->getNamaKelurahanById($dat['id_kelurahan']);
                                        array_push($lat_c3, $modelKelurahan->getLatById($dat['id_kelurahan']));
                                        array_push($lon_c3, $modelKelurahan->getLonById($dat['id_kelurahan']));
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
                    <!-- <canvas id="myChart"></canvas> -->
                    <?php $chartId = "myChart" . $iterasi; ?>
                    <canvas id="<?= $chartId ?>"></canvas>
                </div>
            </div>
        </div>
    </div>

    <?php
    $pembagian_cluster_iterasi_ke_i = [
        'c1' => $jumlah_c1, 
        'c2' => $jumlah_c2, 
        'c3' => $jumlah_c3, 
    ];
    array_push($pembagian_cluster_seluruh_iterasi, $pembagian_cluster_iterasi_ke_i);

    $c1a_previously = $c1a;
    $c1b_previously = $c1b;
    $c1c_previously = $c1c;
    $c1d_previously = $c1d;
    $c1e_previously = $c1e;
    $c1f_previously = $c1f;
    $c2a_previously = $c2a;
    $c2b_previously = $c2b;
    $c2c_previously = $c2c;
    $c2d_previously = $c2d;
    $c2e_previously = $c2e;
    $c2f_previously = $c2f;
    $c3a_previously = $c3a;
    $c3b_previously = $c3b;
    $c3c_previously = $c3c;
    $c3d_previously = $c3d;
    $c3e_previously = $c3e;
    $c3f_previously = $c3f;

    $c1a = 0;
    $c1b = 0;
    $c1c = 0;
    $c1d = 0;
    $c1e = 0;
    $c1f = 0;
    $c2a = 0;
    $c2b = 0;
    $c2c = 0;
    $c2d = 0;
    $c2e = 0;
    $c2f = 0;
    $c3a = 0;
    $c3b = 0;
    $c3c = 0;
    $c3d = 0;
    $c3e = 0;
    $c3f = 0;

    for ($i = 0; $i < $jumlah_c1; $i++) {
        $c1a += $array_c1[$i]['a'];
        $c1b += $array_c1[$i]['b'];
        $c1c += $array_c1[$i]['c'];
        $c1d += $array_c1[$i]['d'];
        $c1e += $array_c1[$i]['e'];
        $c1f += $array_c1[$i]['f'];
    }
    
    for ($i = 0; $i < $jumlah_c2; $i++) {
        $c2a += $array_c2[$i]['a'];
        $c2b += $array_c2[$i]['b'];
        $c2c += $array_c2[$i]['c'];
        $c2d += $array_c2[$i]['d'];
        $c2e += $array_c2[$i]['e'];
        $c2f += $array_c2[$i]['f'];
    }
    
    for ($i = 0; $i < $jumlah_c3; $i++) {
        $c3a += $array_c3[$i]['a'];
        $c3b += $array_c3[$i]['b'];
        $c3c += $array_c3[$i]['c'];
        $c3d += $array_c3[$i]['d'];
        $c3e += $array_c3[$i]['e'];
        $c3f += $array_c3[$i]['f'];
    }
    
    $c1a /= $jumlah_c1;
    $c1b /= $jumlah_c1;
    $c1c /= $jumlah_c1;
    $c1d /= $jumlah_c1;
    $c1e /= $jumlah_c1;
    $c1f /= $jumlah_c1;
    $c2a /= $jumlah_c2;
    $c2b /= $jumlah_c2;
    $c2c /= $jumlah_c2;
    $c2d /= $jumlah_c2;
    $c2e /= $jumlah_c2;
    $c2f /= $jumlah_c2;
    $c3a /= $jumlah_c3;
    $c3b /= $jumlah_c3;
    $c3c /= $jumlah_c3;
    $c3d /= $jumlah_c3;
    $c3e /= $jumlah_c3;
    $c3f /= $jumlah_c3;

    $centroidAreEqual = true;
    $groups = ['c1', 'c2', 'c3'];
    $letters = ['a', 'b', 'c', 'd', 'e', 'f'];

    foreach ($groups as $group) {
        foreach ($letters as $letter) {
            $previouslyVariable = $group . $letter . '_previously';            
            $currentVariable = $group . $letter;
            
            if ($$previouslyVariable !== $$currentVariable) {
                $centroidAreEqual = false;
                break 2;
            }
        }
    }
    if ($centroidAreEqual) {
        array_push($final_result, $array_c1);
        array_push($final_result, $array_c2);
        array_push($final_result, $array_c3);

        break;
    } else {
        $final_cluster = [
            'c1' => [],
            'c2' => [],
            'c3' => [],
        ];

        $lat_c1 = [];
        $lat_c2 = [];
        $lat_c3 = [];
        $lon_c1 = [];
        $lon_c2 = [];
        $lon_c3 = [];
    }

    $jumlah_c1 = 0;
    $jumlah_c2 = 0;
    $jumlah_c3 = 0;

    $array_c1 = [];
    $array_c2 = [];
    $array_c3 = [];

    $iterasi++;
}

?>

<h1 class="h3 mb-3 mt-5 text-gray-800">Kesimpulan</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col">
                <h6 class="font-weight-bold text-utama">Pembagian Cluster Kelurahan</h6>
            </div>
            <div class="d-flex justify-content-end mr-3">
                <form method=post action="<?= base_url('/dashboard/identifikasi/add_identifikasi') ?>">
                    <input type="hidden" name="finalCluster" value="<?php echo htmlentities(json_encode($final_cluster)); ?>">
                    <!-- <button type="submit" class="btn btn-sm btn-outline-primary ">Simpan</button> -->
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php
        $cluster_key = 'c';
        $cluster_strings = [];

        for ($c = 1; $c <= count($final_cluster); $c++) {
            $current_cluster_key = $cluster_key . $c;
            $cluster_data = $final_cluster[$current_cluster_key];

            $cluster_strings[$c] = "";

            foreach ($cluster_data as $res) :
                $cluster_strings[$c] .= "$res, ";
            endforeach;
        }

        foreach ($cluster_strings as $key => $cluster_string):
            echo "<p><b>Cluster $key :</b><br> " . rtrim($cluster_string, ', ') . "</p>";
        endforeach;
        ?>
        
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="font-weight-bold text-utama">Ringkasan</h6>
        <p>Nilai Rata-Rata Setiap Indikator pada Masing-Masing Cluster</p>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6 mx-auto">
                <canvas id="chartResult1"></canvas>
            </div>
            <div class="col-6 mx-auto">
                <canvas id="chartResult2"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <canvas id="chartResult3"></canvas>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<script>
    // Data yang akan ditampilkan di grafik
    <?php for ($i = 1; $i <= count($pembagian_cluster_seluruh_iterasi); $i++): ?>
        var data<?= $i ?> = {
            labels: ['Cluster 1', 'Cluster 2', 'Cluster 3'],
            datasets: [{
                data: [<?= $pembagian_cluster_seluruh_iterasi[$i-1]['c1']; ?>, <?= $pembagian_cluster_seluruh_iterasi[$i-1]['c2']; ?>, <?= $pembagian_cluster_seluruh_iterasi[$i-1]['c3']; ?>],
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

        var options<?= $i ?> = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        var ctx<?= $i ?> = document.getElementById('myChart<?= $i ?>').getContext('2d');
        var myChart<?= $i ?> = new Chart(ctx<?= $i ?>, {
            type: 'bar',
            data: data<?= $i ?>,
            options: options<?= $i ?>
        });
    <?php endfor; ?>

</script>

<script>
    // Data yang akan ditampilkan di grafik
    <?php for ($c = 0; $c < count($final_result); $c++): ?>
        var data<?= $c+1 ?> = {
            labels: ['Total Kasus', 'Remaja', 'Wanita', 'Pria', 'Balita', 'Orang Dewasa'],
            datasets: [{
                <?php
                $c_a = 0;
                $c_b = 0;
                $c_c = 0;
                $c_d = 0;
                $c_e = 0;
                $c_f = 0;

                foreach ($final_result[$c] as $res) :
                    $c_a = $c_a + $res['a'];
                    $c_b = $c_b + $res['b'];
                    $c_c = $c_c + $res['c'];
                    $c_d = $c_d + $res['d'];
                    $c_e = $c_e + $res['e'];
                    $c_f = $c_f + $res['f'];
                endforeach;
                ?>

                label: 'Cluster ' + <?= $c+1 ?>,
                data: [
                    <?= $c_a/count($final_result[$c]); ?>,
                    <?= $c_b/count($final_result[$c]); ?>,
                    <?= $c_c/count($final_result[$c]); ?>,
                    <?= $c_d/count($final_result[$c]); ?>,
                    <?= $c_e/count($final_result[$c]); ?>,
                    <?= $c_f/count($final_result[$c]); ?>,
                ],
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

        var options<?= $c+1 ?> = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        var ctx<?= $c+1 ?> = document.getElementById('chartResult<?= $c+1 ?>').getContext('2d');
        var chartResult<?= $c+1 ?> = new Chart(ctx<?= $c+1 ?>, {
            type: 'bar',
            data: data<?= $c+1 ?>,
            options: options<?= $c+1 ?>
        });
    <?php endfor; ?>

</script>

<?= $this->endSection(); ?>