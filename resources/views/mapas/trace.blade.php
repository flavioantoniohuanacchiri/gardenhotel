<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <title>Leaflet rotated marker example</title>

    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v1.0.0/leaflet.css" />
    <style>
        * { margin: 0; padding: 0; }
        html, body { height: 100%; }
        #map { width:100%; height:100%; }
    </style>

    <script src="http://cdn.leafletjs.com/leaflet/v1.0.0/leaflet-src.js"></script>
    <script src="leaflet.rotatedMarker.js"></script>
    <script>
        window.onload = function() {
            var map = L.map('map', {
                center: [-12.0344, -77.0447],
                zoom: 8,
                layers: [
                    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                    })
                ]
            });

            var m = L.marker(map.getCenter(), {
                rotationAngle: 45,
                draggable: true
            }).addTo(map);
        };
    </script>
    </head>

    <body>
        <div id="map"></div>
    </body>
</html>