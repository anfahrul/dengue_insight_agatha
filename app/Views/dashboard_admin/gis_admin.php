<?= $this->extend('master_admin'); ?>

<?= $this->section('style'); ?>

<style>
		html, body {
			height: 100%;
			margin: 0;
		}
		.leaflet-container {
			height: 400px;
			width: 600px;
			max-width: 100%;
			max-height: 100%;
		}
	</style>

	<style>#map { width: 100%; height: 500px; }
.info { padding: 6px 8px; font: 14px/16px Arial, Helvetica, sans-serif; background: white; background: rgba(255,255,255,0.8); box-shadow: 0 0 15px rgba(0,0,0,0.2); border-radius: 5px; } .info h4 { margin: 0 0 5px; color: #777; }
.legend { text-align: left; line-height: 18px; color: #555; } .legend i { width: 18px; height: 18px; float: left; margin-right: 8px; opacity: 0.7; }
    </style>

<?= $this->endSection(); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Peta Sebaran</h1>
    <div id="map"> </div>

    <?= $this->endSection(); ?>

    <?= $this->section('script'); ?>

    <script type="text/javascript">

        const map = L.map('map').setView([-3.992350142513427, 122.52349485683202], 12);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // control that shows state info on hover
        const info = L.control();

        info.onAdd = function (map) {
            this._div = L.DomUtil.create('div', 'info');
            this.update();
            return this._div;
        };

        info.update = function (props) {
            const contents = props ? `<b>${props.WADMKD}</b><br />Cluster ${props.cluster}` : 'Hover over a state';
            this._div.innerHTML = `<h5>Cluster Sebaran DBD Kota Kendari</h5>${contents}`;
        };

        info.addTo(map);

        // get color depending on population density value
        function getColor(d) {
            return d == 1 ? '#4BC0C0' :
                d == 2   ? '#FF6384' : '#FFCD56';
        }

        function style(feature) {
            return {
                weight: 2,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 0.7,
                fillColor: getColor(feature.properties.cluster)
            };
        }

        function highlightFeature(e) {
            const layer = e.target;

            layer.setStyle({
                weight: 5,
                color: '#666',
                dashArray: '',
                fillOpacity: 0.8
            });

            layer.bringToFront();

            info.update(layer.feature.properties);
        }

        /* global data */
        $.getJSON("<?php echo base_url('geo/') . $lastInsertedGeoLocationFile ?>", function(result) {
            var clusterInfo = {};
            <?php
                foreach ($lastIdentificationHistory as $record) {
                    $objectId = $modelKelurahan->getObjectIdById($record['id_kelurahan']);
            ?>
                    clusterInfo["<?php echo addslashes($objectId); ?>"] = <?php echo addslashes($record['cluster']); ?>;
            <?php
                }
            ?>

            result.features.forEach(function(element, index) {
                var cluster = clusterInfo[element.properties.OBJECTID];
                element.properties.cluster = parseInt(cluster, 10);
            });

            const geojson = L.geoJson(result, {
                style,
                onEachFeature: function(feature, layer) {
                    layer.on({
                        mouseover: highlightFeature,
                        mouseout: resetHighlight,
                        click: zoomToFeature
                    });
                }
            }).addTo(map);
            
            function resetHighlight(e) {
                geojson.resetStyle(e.target);
                info.update();
            }
    
            function zoomToFeature(e) {
                map.fitBounds(e.target.getBounds());
            }
        });

        map.attributionControl.addAttribution('Data DBD Kota Kendari &copy; <a href="http://test.gov/">KendariGov</a>');

        const legend = L.control({position: 'bottomright'});

        legend.onAdd = function (map) {

            const div = L.DomUtil.create('div', 'info legend');
            const grades = [1, 2, 3];
            const labels = [];
            let label;
            
            for (let i = 0; i < grades.length; i++) {
                label = grades[i];
                labels.push(`<i style="background:${getColor(label)}"></i>Cluster ${label}`);
            }

            div.innerHTML = labels.join('<br>');
            return div;
        };

        legend.addTo(map);

    </script>

    <?= $this->endSection(); ?>