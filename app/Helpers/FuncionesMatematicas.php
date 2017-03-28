<?php

// Code within app\Helpers\Helper.php

namespace App\Helpers;

class FuncionesMatematicas
{
    public static function geoDistanciaKM($puntoInicio = [], $puntoFin = [])
    {
        $lat1 = $puntoInicio["latitud"];
        $lat2 = $puntoFin["latitud"];
        $long1 = $puntoInicio["longitud"];
        $long2 = $puntoFin["longitud"];
        $km = 111.302;
        $degtorad = 0.01745329;//1 Grado = 0.01745329 Radianes
        $radtodeg = 57.29577951;//1 Radian = 57.29577951 Grados
        $dlong = ($long1 - $long2);
        $dvalue = (sin($lat1 * $degtorad) * sin($lat2 * $degtorad)) + (cos($lat1 * $degtorad) * cos($lat2 * $degtorad) * cos($dlong * $degtorad));
        $dd = acos($dvalue) * $radtodeg;
        if (is_nan($dd)) {
            return 100000000000000000;
        } else {
            return ($dd * $km);
        }
    }

    public static function getVelocidad($distancia = 0, $tiempo = 0)
    {

    }
    public static function rumbo($puntoInicio = [], $puntoFin = [])
    {
        $pi = 3.14159;
        $lat1 = $puntoInicio["latitud"] * $pi / 180;
        $long1 = $puntoInicio["longitud"] * $pi / 180;
        $lat2 = $puntoFin["latitud"] * $pi / 180;
        $long2 = $puntoFin["longitud"] * $pi / 180;

        $dLon = ($long2 - $long1);

        $y = sin($dLon) * cos($lat2);
        $x = cos($lat1) * sin($lat2) - sin($lat1)
            * cos($lat2) * cos($dLon);

        $brng = atan2($y, $x);

        $brng = rad2deg($brng);
        $brng = ($brng + 360) % 360;

        return $brng;
    }
    public static function getIconoRumbo($rumbo = 0)
    {
        $icono = "icono-o_ON.png";
        if ($rumbo < 45) {
            $icono = "icono-e_ON.png";
        }
        /* else if ($rumbo >=45 && $rumbo < 90) {
            $icono = "icono-ne_ON.png";
        } else if ($rumbo >=90 && $rumbo < 135) {
            $icono = "icono-n_ON.png";
        } else if ($rumbo >=135 && $rumbo < 180) {
            $icono = "icono-no_ON.png";
        } else if ($rumbo >=180 && $rumbo < 225) {
            $icono = "icono-o_ON.png";
        } else if ($rumbo >=225 && $rumbo < 270) {
            $icono = "icono-so_ON.png";
        } else if ($rumbo >=270 && $rumbo < 315) {
            $icono = "icono-s_ON.png";
        } else if ($rumbo >=315 && $rumbo < 360) {
            $icono = "icono-o_ON.png";
        }*/
        return $icono;

    }
    public static function anguloGiro($puntosLatitud = [], $puntosLongitud = [])
    {
        $direccion = "";
        $diflatitud = $puntosLatitud[0] - $puntosLatitud[1];
        
        //diferencia de distancias entre latitudes
        // 1 cuadrante es igual a 0.0010350000000017
        if ($diflatitud > 0) {
        // me voy al sur
        // diferencia longitud

            $diflongitud = $puntosLongitud[0] - $puntosLongitud[1];
            if ($diflongitud <=0) {
                if ($diflongitud > -0.000090) {
                    $direccion = "S";
                } else {
                    $direccion = "E";
                }
            } else {
                if ($diflongitud < 0.000090) {
                    $direccion = "S";
                } else {
                    $direccion = "O";
				}
			}

		} else if ($diflatitud < 0) {
			// me voy al norte
			// diferencia longitud
			$diflongitud = $puntosLongitud[0] - $puntosLongitud[1];
			if ($diflongitud <=0) {
				if ($diflongitud > -0.00090) {
					$direccion = "N";
				} else {
					$direccion = "E";
				}
				
			} else {
				if ($diflongitud < 0.00090) {
					$direccion = "N";
				} else {
					$direccion = "O";
				}
			}
		} else {
			$diflongitud = $puntosLongitud[0] - $puntosLongitud[1];
			if ($diflongitud <=0) {
				if ($diflongitud > -0.00090) {
					$direccion = "O";
				} else {
					$direccion = "E";
				}
				
			} else {
				if ($diflongitud < 0.00090) {
					$direccion = "E";
				} else {
					$direccion = "O";
				}
			}
		}

		return ["diflongitud" => $diflongitud, "diflatitud" => $diflatitud, "direccion" => $direccion];
	}
}
