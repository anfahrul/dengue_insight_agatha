<?= $this->extend('master_user'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Inisiasi Centroid Awal</h1>

<div class="card shadow mb-4">
    <!-- <div class="card-header py-3">
        <label>Nama Titik Pusat (Centroid)</label>
        <input type="text" name="nama_centroid" class="form-control">
    </div> -->
    <div class="card-body">
        <form method=post action="<?= base_url('/dashboard/cluster/add_cluster') ?>">

            <table class="table text-center table-borderless">
                <tr>
                    <th></th>
                    <th>Total Kasus</th>
                    <th>Remaja</th>
                    <th>Perempuan</th>
                    <th>Laki-Laki</th>
                    <th>Balita</th>
                    <th>Orang Dewasa</th>
                </tr>
                <tr>
                    <th>Cluster 1</th>
                    <td>
                        <input type="number" name="c1a" class="form-control text-center">
                    </td>
                    <td>
                        <input type="number" name="c1b" class="form-control text-center">
                    </td>
                    <td>
                        <input type="number" name="c1c" class="form-control text-center">
                    </td>
                    <td>
                        <input type="number" name="c1d" class="form-control text-center">
                    </td>
                    <td>
                        <input type="number" name="c1e" class="form-control text-center">
                    </td>
                    <td>
                        <input type="number" name="c1f" class="form-control text-center">
                    </td>
                </tr>
                <tr>
                    <th>Cluster 2</th>
                    <td>
                        <input type="number" name="c2a" class="form-control text-center">
                    </td>
                    <td>
                        <input type="number" name="c2b" class="form-control text-center">
                    </td>
                    <td>
                        <input type="number" name="c2c" class="form-control text-center">
                    </td>
                    <td>
                        <input type="number" name="c2d" class="form-control text-center">
                    </td>
                    <td>
                        <input type="number" name="c2e" class="form-control text-center">
                    </td>
                    <td>
                        <input type="number" name="c2f" class="form-control text-center">
                    </td>
                </tr>
                <tr>
                    <th>Cluster 3</th>
                    <td>
                        <input type="number" name="c3a" class="form-control text-center">
                    </td>
                    <td>
                        <input type="number" name="c3b" class="form-control text-center">
                    </td>
                    <td>
                        <input type="number" name="c3c" class="form-control text-center">
                    </td>
                    <td>
                        <input type="number" name="c3d" class="form-control text-center">
                    </td>
                    <td>
                        <input type="number" name="c3e" class="form-control text-center">
                    </td>
                    <td>
                        <input type="number" name="c3f" class="form-control text-center">
                    </td>
                </tr>
            </table>
            <button class="btn btn-primary">Simpan Cluster</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>