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
    public static function getIconoRumbo($puntosLatitud = [], $puntosLongitud = [], $rumbo = 0)
    {
        $anguloGiro = $rumbo*180/pi();
        $icono = "";
        if ($puntosLatitud[0] === $puntosLatitud[1]) {
            return $icono = "_E";
        }

        if ($puntosLongitud[0] === $puntosLongitud[1]) {
            return $icono = "_S";
        }

        if ($anguloGiro > 0) {
            // hacia el estes
            if ($anguloGiro <= 22.5) {
                $icono = "_O2230N";
            } else if ($anguloGiro > 22.5 && $anguloGiro <=45) {
                $icono = "_O45N";
            } else if ($anguloGiro > 45 && $anguloGiro <= 77.5) {
                $icono = "_O7730O";
            } else if ($anguloGiro > 77.5 && $anguloGiro <= 90) {
                $icono = "_N";
            } else if ($anguloGiro > 90 && $anguloGiro <= 112.5) {
                $icono = "_N2230E";
            } else if ($anguloGiro > 112.5 && $anguloGiro <= 135) {
                $icono = "_N45E";
            } else if ($anguloGiro > 135 && $anguloGiro <= 157.5) {
                $icono = "_N7730E";
            } else if ($anguloGiro > 157.5 && $anguloGiro <= 180) {
                $icono = "_E";
            } else if ($anguloGiro > 180 && $anguloGiro <= 202.5) {
                $icono = "_E2230S";
            } else if ($anguloGiro > 202.5 && $anguloGiro <= 225) {
                $icono = "_E45S";
            } else if ($anguloGiro > 225 && $anguloGiro <= 247.5) {
                $icono = "_E7730S";
            } else if ($anguloGiro > 247.5 && $anguloGiro <= 270) {
                $icono = "_S";
            } else if ($anguloGiro > 270 && $anguloGiro <= 292.5) {
                $icono = "_S2230O";
            } else if ($anguloGiro > 292.5 && $anguloGiro <= 315) {
                $icono = "_S45O";
            } else if ($anguloGiro > 315 && $anguloGiro <= 337.5) {
                $icono = "_S7730O";
            } else if ($anguloGiro > 337.5 && $anguloGiro <= 360) {
                $icono = "_O";
            }
        }

        if ($anguloGiro < 0) {
            // hacia el oeste
            if ($anguloGiro >= -22.5) {
                $icono = "_S7730O";
            } else if ($anguloGiro < -22.5 && $anguloGiro >=-45) {
                $icono = "_S45O";
            } else if ($anguloGiro < -45 && $anguloGiro >= -77.5) {
                $icono = "_O7730O";
            } else if ($anguloGiro > -77.5 && $anguloGiro >= -90) {
                $icono = "_S2230O";
            } else if ($anguloGiro < -90 && $anguloGiro >= -112.5) {
                $icono = "_S";
            } else if ($anguloGiro < -112.5 && $anguloGiro >= -135) {
                $icono = "_E7730S";
            } else if ($anguloGiro < -135 && $anguloGiro >= -157.5) {
                $icono = "_E45S";
            } else if ($anguloGiro < -157.5 && $anguloGiro >= -180) {
                $icono = "_E2230S";
            } else if ($anguloGiro < -180 && $anguloGiro >= -202.5) {
                $icono = "_E";
            } else if ($anguloGiro < -202.5 && $anguloGiro >= -225) {
                $icono = "_N7730E";
            } else if ($anguloGiro < -225 && $anguloGiro >= -247.5) {
                $icono = "_N45E";
            } else if ($anguloGiro < -247.5 && $anguloGiro >= -270) {
                $icono = "_N2230E";
            } else if ($anguloGiro < -270 && $anguloGiro >= -292.5) {
                $icono = "_N";
            } else if ($anguloGiro < -292.5 && $anguloGiro >= -315) {
                $icono = "_O7730O";
            } else if ($anguloGiro < -315 && $anguloGiro >= -337.5) {
                $icono = "_O45N";
            } else if ($anguloGiro < -337.5 && $anguloGiro >= -360) {
                $icono = "_O2230N";
            }
	    }

    }
    public static function anguloGiro($puntosLatitud = [], $puntosLongitud = [])
    {
        $direccion = "";
        $diflatitud = $puntosLatitud[0] - $puntosLatitud[1];
        $direcciones = ["O" => 0
        	"O2230N" => 22.5];
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
