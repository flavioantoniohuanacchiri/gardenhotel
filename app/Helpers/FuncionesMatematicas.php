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
        $diflongitud = $puntoInicio["longitud"] - $puntoFin["longitud"];
        $diflatitud = $puntoInicio["latitud"] - $puntoFin["latitud"];
        $latitudmedia = ($puntoInicio["latitud"] + $puntoFin["latitud"])/2;
        $apartamiento = $diflongitud*cos($latitudmedia);
        $rumbo = atan($apartamiento / $diflatitud);

        return $rumbo;
    }
    public static function getIconoRumbo($rumbo = 0)
    {
        $anguloGiro = (int)($rumbo*180/pi());
        //dd($anguloGiro);
        if ($anguloGiro < 0) {
            if ($anguloGiro >= -180) {
                $anguloGiro = 180 + $anguloGiro;
            } else {
                $anguloGiro = abs($anguloGiro) - 180;
                $anguloGiro = 360 - $anguloGiro;
            }
        } else {
            //$anguloGiro+=90;
            if ($anguloGiro <=180) {
                $anguloGiro+=180;
            } else {
                $anguloGiro-=180;
            }
        }
        $icono = "";
        return $icono.="_".$anguloGiro;

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