<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <style>
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0;}
      #map{ height: 100%; }
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
        <div class="col-md-12 contenedor-filtros">
            <div class="col-md-4 pull-right">
                <form id="form-filtros">
                    {{Form::token()}}
                    @if (count($grupos))
                        <select class="lista" name="idgrupo">
                            <option value="">Todos</option>
                            @foreach ($grupos as $key => $value)
                                <option value="{{$value['id']}}">{{$value['nombre']}}</option>
                            @endforeach
                        </select>
                        
                        <!--<button class="btn btn-success btn-buscar form-control">Buscar</button>-->
                    @else
                        <p>No hay grupos de dispositivos disponibles</p>
                    @endif
                </form>
            </div>
            
            <!--<button id="btn-filtros" class="btn btn-primary pull-right">Filtros</button>
            <div id="filtros">
            <h5>Grupos y Dispositivos</h5>
                
            </div>-->
        </div>
    <style type="text/css">
        .contenedor-filtros{padding: 5px 0px; background: #cacaca;}
      #filtros{height: auto; background: #6ea9c5; margin-top: 40px; width: 270px; display: none;}
      #filtros h5 {text-align: center;  padding: 10px 0px; font-weight: 700; background: #fff; float: right; width: 100%;margin-top: 0px;}
      #filtros select {}
      #filtros ul {list-style: none; padding: 5px;}
      #filtros ul ul.sublista{display: none; border-top: dotted 3px #aaa; margin-top: 8px;}
      #filtros ul li input[type=checkbox]{ display: inline-block; vertical-align: middle;}
      #filtros ul li span {vertical-align: middle;  display: inline-block; font-weight: 700; text-transform: uppercase; text-align: center;  width: 235px;}
      #filtros ul li ul li span {width: 220px;}
      #form-filtros .lista {width: 100%;  padding: 2px 8px;}
    </style>
    <div id="map" class="col-md-12"></div>
    <script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
    <script type="text/javascript" src="js/leaflet.ajax.js"></script>
    <script src="js/spin.js"></script>
    <script src="js/leaflet.spin.js"></script>
    <script src="js/leaflet.responsive.popup.js"></script>
    <script type="text/javascript" src="js/Marker.Rotate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-gpx/1.3.0/gpx.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
      integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
      crossorigin="anonymous"></script>
      <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">// Create the map
    var ejecutarepintado = true;
    var map = L.map('map', {
                    center: [ -12.0344, -77.0447],
                    zoom: 13,
                    layers: [
                        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                        })
                    ]
                });
    var gpx ="gpx/prueba1.gpx";
    new L.GPX(gpx, 
        {
            async: true,
            marker_options: {
                startIconUrl: null,
                endIconUrl: null,
                shadowUrl: null
            }
        }
    ).on('loaded', function(e) {
      map.fitBounds(e.target.getBounds());
    }).addTo(map);

    var gpx2 ="gpx/prueba2.gpx";
    new L.GPX(gpx2, {async: true, 
        polyline_options:  {
            color: '#9b1d41',
            weight: 3,
            opacity: 0.6,
            fillOpacity: 0.65,
            fillColor: '#9b1d41'
        }, 
        marker_options: {
            startIconUrl: null,
            endIconUrl: null,
            shadowUrl: null
          } 
}).on('loaded', function(e) {
      map.fitBounds(e.target.getBounds());
    }).addTo(map);

    repintar();
    var mapMarkers = [];
    setInterval( function() {
        if (ejecutarepintado) {
            repintar();
        }
    }, 10000);

    function repintar() {
         $.ajax({
            type: "POST",
            url: 'ubicaciones',
            dataType: 'json',
            data: $("#form-filtros").serialize(),
            success: function (response) {
                cleanMarkers();
                for(var i in response) {
                    var greenIcon = L.icon({
                    iconUrl: response[i].img,

                    iconSize:     [64, 64], // size of the icon
                    shadowSize:   [50, 64], // size of the shadow
                    iconAnchor:   [32, 64], // point of the icon which will correspond to marker's location
                    shadowAnchor: [4, 62],  // the same for the shadow
                    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
                });
                html ="";
                html+="<b>Código : </b>"+response[i].codigo;
                html+="<br><b>Descripcion : </b>"+response[i].descripcion;
                html+="<br><b>Velocidad : </b>"+parseFloat(response[i].velocidad).toFixed(2)+" km/h";
                html+="<br><b>Estado : </b>"+response[i].estado;
                var popup = L.responsivePopup().setContent(html);
                var marker = L.marker([response[i].latitud,response[i].longitud], {icon: greenIcon, iconAngle: response[i].rotate}).addTo(map).bindPopup(popup);
                marker.on('mouseover', function (e) {
                    this.openPopup();
                });
                marker.on('mouseout', function (e) {
                    this.closePopup();
                });
                    mapMarkers[i] = marker;
                }
                ejecutarepintado = true;
            }
        });
    }

    function cleanMarkers()
    {
        for(var i in mapMarkers){
            map.removeLayer(mapMarkers[i]);
        }
    }
    /*$("#filtros .inputfila").click(function(e){
        fila = $(this).parent();
        console.log(fila);
        subfila = fila.find("ul");
        if (subfila.css("display") == "none"){
            subfila.css("display", "block");
        }
        else {
            subfila.css("display", "none");
            subfila.find(" .inputsubfila").prop("checked", true);
        }
    }); */
    $(".btn-buscar").click(function(e){
        ejecutarepintado = false;
        repintar();
        return false;
    });
    $(".lista").change(function(e){
        ejecutarepintado = false;
        repintar();
        console.log("cambiar");
        return false;
    });
    $("#btn-filtros").click(function(e){
        if ($("#filtros").css("display") == "none") {
            $("#filtros").slideDown();
        } else {
            $("#filtros").slideUp();
        }
    });
    </script>
    </body>
</html>
