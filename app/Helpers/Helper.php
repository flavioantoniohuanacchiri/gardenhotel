<?php

// Code within app\Helpers\Helper.php

namespace App\Helpers;

use App\Sms;

class Helper
{

    /**
     * @param  string $url
     * @param  array $object assoc [id => name]
     * @param  array $template ['view','update','delete']
     * @return [string]
     */
    public static function actionDatatable($url, $object, $template = ['view', 'update', 'delete'])
    {
        if (is_array($object)) {
            $id = key($object);
            $nombre = $object[$id];
        } else {
            return 'Object model dont exists or Error.';
        }
        $btn['view'] = '<a href="' . url($url, $id)
            . '" class="btn btn-xs btn-primary float-left"><i class="fa fa-eye"></i></a>';
        $btn['update'] = '<a href="' . route($url . '.edit', $id)
            . '" class="btn btn-xs btn-info float-left"><i class="fa fa-edit"></i></a>';
        $btn['delete'] = '<Form class="float-left"  method="post" action="' . route($url . '.destroy', $id)
            . '" onclick="return confirm(\'' . trans('master.delete_confirm', ['value' => $nombre]) . '\')">'
            . csrf_field() . '<input name="_method" type="hidden" value="DELETE">'
            . '<button data-id="' . $id . '" type="submit" class="btn btn-xs btn-danger masterDelete"><i class="fa fa-trash"></i></button>'
            . '</form>';
        $response = [];
        foreach ($template as $val) {
            if (isset($btn[$val])) {
                $response[$val] = $btn[$val];
            }
        }
        return implode(' ', $response) . '<div class="clearfix"></div>';
    }

        /**
     * @param  string $url
     * @param  array $object assoc [id => name]
     * @param  array $template ['view','update','delete']
     * @return [string]
     */
    public static function actionDatatableAjax($url, $object, $template = ['view', 'update', 'delete'])
    {
        if (is_array($object)) {
            $id = key($object);
            $nombre = $object[$id];
        } else {
            return 'Object model dont exists or Error.';
        }
        $btn['view'] = '<a class="btn btn-xs btn-primary" data-url="'.$url.'" data-id="'.$id.'" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i></a>';
        $btn['update'] = '<a href="' . route($url . '.edit', $id)
            . '" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>';
        $btn['delete'] = '<button data-id="' . $id .'" class="btn btn-xs btn-danger masterDelete" data-url="'.$url.'"><i class="fa fa-trash"></i></button>';
        $response = [];
        foreach ($template as $val) {
            if (isset($btn[$val])) {
                $response[$val] = $btn[$val];
            }
        }
        return implode(' ', $response) . '<div class="clearfix"></div>';
    }

            /**
     * @param  string $url
     * @param  array $object assoc [id => name]
     * @param  array $template ['view','update','delete']
     * @return [string]
     */
    public static function actionDatatableAjaxWithOutModal($url, $object, $template = ['view', 'update', 'delete'])
    {
        if (is_array($object)) {
            $id = key($object);
            $nombre = $object[$id];
        } else {
            return 'Object model dont exists or Error.';
        }
        $btn['view'] = '<a class="btn btn-xs btn-primary" data-url="'.$url.'" data-id="'.$id.'"><i class="fa fa-eye"></i></a>';
        $btn['update'] = '<a href="' . route($url . '.edit', $id)
            . '" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>';
        $btn['delete'] = '<button data-id="' . $id .'" class="btn btn-xs btn-danger masterDelete" data-url="'.$url.'"><i class="fa fa-trash"></i></button>';
        $response = [];
        foreach ($template as $val) {
            if (isset($btn[$val])) {
                $response[$val] = $btn[$val];
            }
        }
        return implode(' ', $response) . '<div class="clearfix"></div>';
    }

    public static function enviarSMS($to = "", $message = "")
    {
        $sms = new Sms;
        $result = -9999;
        $urlApi = "http://serversms.sms2peru.com/api/sendsms/";
        $user = "dbrot";
        $password = "dbrottovar1980";
        $message = urlencode($message);
        if ($to!=="") {
            if ($message!=="") {
                $elsql=$urlApi.'plain?user='.
                    $user.'&password='
                    .$password.'&sender=sms2peru&GSM='.
                    $to.'&SMSText='.$message;

                //echo $elsql;

                $result = file_get_contents($elsql);
                //var_dump($result);
                //$sms->historial ($to, $message, 
                    //json_encode($sms->errores[$result]), $result);
                //echo "exito!!!";
                //return ["rst" => $result, "msj" => $sms->errores[$result]];
            }
            //$sms->historial ($to, $message, json_encode([]), $result);
            return ["rst" => 2];
        }
        //$sms->historial ($to, $message, json_encode([]), $result);
        return ["rst" => 3];
    }
}