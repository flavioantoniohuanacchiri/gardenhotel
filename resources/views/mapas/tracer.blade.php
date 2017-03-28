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
        <div class="col-md-12 contenedor-filtros form-control ">
            <div class="col-md-4 pull-right">
                <form id="form-filtros">
                    {{Form::token()}}
                    @if (count($grupos))
                        <script type="text/javascript">
                            var gruposgpx = <?php echo json_encode($grupos); ?>;
                        </script>
                        <select class="lista" name="idgrupo">
                            <option value="">Seleccione...</option>
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
    .leaflet-control-zoom.leaflet-bar.leaflet-control{margin-top: 80px !important;}
        .contenedor-filtros{padding: 5px 0px; background: #cacaca; position: fixed;z-index: 9999999;}
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

    repintar();
    var mapMarkers = [];
    var mapGpxs = [];
    var idgrupodispositivo = 0;
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

                var dispositivos = response.dispositivos;
                var gpxs = response.gpxs;
                for(var i in dispositivos) {
                    var dispositivo = dispositivos[i];
                    var greenIcon = L.icon({
                    iconUrl: dispositivo.img,

                    iconSize:     [64, 64], // size of the icon
                    shadowSize:   [50, 64], // size of the shadow
                    iconAnchor:   [32, 64], // point of the icon which will correspond to marker's location
                    shadowAnchor: [4, 62],  // the same for the shadow
                    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
                });
                html ="";
                //html+="<b>Código : </b>"+dispositivo.codigo;
                html+="<br><b>Descripcion : </b>"+dispositivo.descripcion;
                html+="<br><b>Velocidad : </b>"+parseFloat(dispositivo.velocidad).toFixed(2)+" km/h";
                html+="<br><b>Estado : </b>"+dispositivo.estado;
                var popup = L.responsivePopup().setContent(html);
                var marker = L.marker([dispositivo.latitud,dispositivo.longitud], {icon: greenIcon}).addTo(map).bindPopup(popup);
                marker.on('mouseover', function (e) {
                    this.openPopup();
                });
                marker.on('mouseout', function (e) {
                    this.closePopup();
                });
                    mapMarkers[i] = marker;
                }
                ejecutarepintado = true;
                console.log(idgrupodispositivo);
                if (idgrupodispositivo > 0) {
                    pintadogpx = gruposgpx[idgrupodispositivo].pintadogpx;
                    //pintadogpx = false;
                    if (pintadogpx == false) {
                        cleanGpxs();
                        for (var j in gpxs) {
                            var gpx = gpxs[j].url;
                            var mapgpx = new L.GPX(gpx, {async: true, 
                                polyline_options:  {
                                    color: gpxs[j].color,
                                    weight: 3,
                                    opacity: 0.6,
                                    fillOpacity: 0.65,
                                    fillColor: gpxs[j].color
                                }, 
                                marker_options: {
                                    startIconUrl: null,
                                    endIconUrl: null,
                                    shadowUrl: null
                                } 
                            }).on('loaded', function(e) {
                                    //map.fitBounds(e.target.getBounds());
                            }).addTo(map);
                            mapGpxs[j] = mapgpx;
                        }
                        gruposgpx[idgrupodispositivo].pintadogpx = true;
                    }
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

    function cleanGpxs()
    {
        for(var i in mapGpxs){
            map.removeLayer(mapGpxs[i]);
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
        idgrupodispositivo = $(this).val();
        for(var i in gruposgpx){
            gruposgpx[i].pintadogpx = false;
        }
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
