<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <style>
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0;}
      #map{ height: 100% }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
    <link rel="stylesheet" href="css/leaflet.responsive.popup.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.6.4/leaflet.ie.css" />
    <![endif]-->
    <title>Tracker AJAX</title>
    </head>
    <body>
    <div id="map"></div>
    <script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
    <script type="text/javascript" src="js/leaflet.ajax.js"></script>
    <script src="js/spin.js"></script>
    <script src="js/leaflet.spin.js"></script>
    <script src="js/leaflet.responsive.popup.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
      integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
      crossorigin="anonymous"></script>
      <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">// Create the map
    var map = L.map('map', {
                    center: [ -12.0344, -77.0447],
                    zoom: 13,
                    layers: [
                        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                        })
                    ]
                });


    repintar();
    var mapMarkers = [];
    setInterval( function() {
        repintar();
    }, 10000);

    function repintar() {
         $.ajax({
            type: "GET",
            url: '../ubicaciones',
            dataType: 'json',
            success: function (response) {
                cleanMarkers();
                for(var i in response) {
                    var greenIcon = L.icon({
                    iconUrl: response[i].img,

                    iconSize:     [64, 64], // size of the icon
                    shadowSize:   [50, 64], // size of the shadow
                    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
                    shadowAnchor: [4, 62],  // the same for the shadow
                    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
                });
                html ="";
                html+="<b>Código : </b>"+response[i].codigo;
                html+="<br><b>Velocidad : </b>"+parseFloat(response[i].velocidad).toFixed(2)+" km/h";
                html+="<br><b>Estado : </b>"+response[i].estado;
                var popup = L.responsivePopup().setContent(html);
                var marker = L.marker([response[i].latitud,response[i].longitud], {icon: greenIcon}).addTo(map).bindPopup(popup);
                   
                    mapMarkers[i] = marker;
                }
            }
        });
    }

    function cleanMarkers()
    {
        for(var i in mapMarkers){
            map.removeLayer(mapMarkers[i]);
        }
    }
    </script>
    </body>
</html>
