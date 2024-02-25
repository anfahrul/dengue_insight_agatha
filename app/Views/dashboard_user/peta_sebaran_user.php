<?= $this->extend('master_user'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Peta Sebaran</h1>
    <!-- <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: new google.maps.LatLng(-3.9743961, 122.4471867),
                zoom: 12
            });

        }
    </script> -->
    <div id="map"> </div>
    <!-- 
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD37zmyOf10mshnWVckhuXEDoT2hRtyghM&callback=initMap">
    </script> -->

    <?= $this->endSection(); ?>

    <?= $this->section('script'); ?>
    <?php
    $lat_c1 = $lat_c1;
    $long_c1 = $long_c1;
    $lat_c2 = $lat_c2;
    $long_c2 = $long_c2;
    $lat_c3 = $lat_c3;
    $long_c3 = $long_c3;

    $kordinatc1 = array_combine($lat_c1, $long_c1);
    $kordinatc2 = array_combine($lat_c2, $long_c2);
    $kordinatc3 = array_combine($lat_c3, $long_c3);

    ?>

    <script>
        const cities = L.layerGroup();
        <?php foreach ($kordinatc2 as $key => $value) : ?>
            L.marker([<?= $key ?>, <?= $value ?>]).bindPopup('Ini Lokasi anak gizi kurang.').addTo(cities);
        <?php endforeach ?>
        const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        });

        const osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles style by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
        });

        const map = L.map('map', {
            center: [-5.489488620660947, 123.74777327972306],
            zoom: 10,
            layers: [osm, cities]
        });

        const baseLayers = {
            'OpenStreetMap': osm,
            'OpenStreetMap.HOT': osmHOT
        };

        const overlays = {
            'Kurang': cities
        };

        var redIcon = L.icon({
            iconUrl: '<?= base_url(); ?>/img/map.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34]
        });
        const layerControl = L.control.layers(baseLayers, overlays).addTo(map);

        const parks = L.layerGroup();
        <?php foreach ($kordinatc3 as $key => $value) : ?>
            L.marker([<?= $key ?>, <?= $value ?>], {
                icon: redIcon
            }).bindPopup('Ini Lokasi anak gizi lebih.').addTo(parks);
        <?php endforeach ?>

        const openTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
        });
        layerControl.addBaseLayer(openTopoMap, 'OpenTopoMap');
        layerControl.addOverlay(parks, 'Lebih');

        /////// Normal ////////
        const normal = L.layerGroup();
        <?php foreach ($kordinatc1 as $key => $value) : ?>
            L.marker([<?= $key ?>, <?= $value ?>]).bindPopup('Ini Lokasi anak gizi Normal.').addTo(normal);
        <?php endforeach ?>
        layerControl.addOverlay(normal, 'normal');
    </script>



    <?= $this->endSection(); ?>