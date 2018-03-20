<?php
/**
 * MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
 * MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
 * MMMMMMMMMMM           MMMM     MMMMMMMMMMMMMMMMMMMMMMMM    MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
 * MMMMMMMMMMM     MM;  MMMMM     MMMMMMMMMMMMMMMMMMMMMMMM    MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
 * MMMMMMMMMMM     MMMMMMMMMM     MMMMMMMMMMMMMMMMMMMMMMMM    MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
 * MMMMMMMMMMM      MMMMMMMMM     MMMMMMMMMMMMMMMMMMMMMMMM    MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
 * MMMMMMMMMMMM      'MMMMMMM     MMMMMMMMMMMMMMMMMMMMMMMM    MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
 * MMMMMMMMMMMMMN       MMMMM          MMMMN    MK    MMMM    MM    MMMM0         MMMMMMMMMMM
 * MMMMMMMMMMMMMMMM      MMMM     M    0MMMN    MK    MMMM    M    ;MMMM    M     MMMMMMMMMMM
 * MMMMMMMMMMMMMMMMM      MMM     M    'MMMN    MK    MMMM         MMMMN         MMMMMMMMMMMM
 * MMMMMMMMMMMMK ;MMM     MMM     M    'MMMM    MK    MMMM    O    KMMMM    MMMM MMMMMMMMMMMM
 * MMMMMMMMMMM0    M     oMMM     M    'MMMM     o    MMMM    MM     MMM     MM    MMMMMMMMMM
 * MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
 * MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
 * Created by PhpStorm.
 * User: Shuke
 * Date: 2018/03/20星期二
 * Time: 14:20
 */

namespace BHOM\WechatMP;

use BHOM\WechatMP\Http\HttpHelper;

class MakeQR extends BaseConf
{
    /**
     * 数量有限的小程序码生成
     * @param $token
     * @param $path
     * @param int $width
     * @param bool $auto_color
     * @param string $line_color
     * @return array
     */
    public static function make_qr_a($token,$path,$width=430,$auto_color=false,$line_color=""){
        $url = parent::config("qr.mack_qr_a");
        $url = parent::splice($url,$token);
        $params = [
            "path" => $path,
            "width" => (int)$width,
            "auto_color" => (boolean)$auto_color,
            "line_color" => $line_color
        ];
        if(empty($line_color)){
            unset($params["line_color"]);
        }
        $data = HttpHelper::inter_curl($url,json_encode($params,JSON_UNESCAPED_UNICODE),1,1);
        $data_arr = json_decode($data,true);
        if(isset($data_arr["errcode"])){
            return parent::return_format(500,$data_arr["errmsg"],$data_arr);
        }
        if(empty($data)){
            return parent::return_format(500,"生成失败",[]);
        }
        return parent::return_format(200,"生成完成",["pic_text"=>$data]);
    }

    /**
     * 数量无限的小程序码
     * @param $scene
     * @param $token
     * @param $path
     * @param int $width
     * @param bool $auto_color
     * @param string $line_color
     * @return array
     */
    public static function make_qr_b($token,$scene,$path,$width=430,$auto_color=false,$line_color=""){
        $url = parent::config("qr.mack_qr_b");
        $url = parent::splice($url,$token);
        $params = [
            "scene" => $scene,
            "path" => $path,
            "width" => (int)$width,
            "auto_color" => (boolean)$auto_color,
            "line_color" => $line_color
        ];
        if(empty($line_color)){
            unset($params["line_color"]);
        }
        $data = HttpHelper::inter_curl($url,json_encode($params,JSON_UNESCAPED_UNICODE),1,1);
        $data_arr = json_decode($data,true);
        if(isset($data_arr["errcode"])){
            return parent::return_format(500,$data_arr["errmsg"],$data_arr);
        }
        if(empty($data)){
            return parent::return_format(500,"生成失败",[]);
        }
        return parent::return_format(200,"生成完成",["pic_text"=>$data]);
    }

    /**
     * 数量有限的小程序二维码
     * @param $token
     * @param $path
     * @param int $width
     * @return array
     */
    public static function make_qr_c($token,$path,$width=430){
        $url = parent::config("qr.mack_qr_c");
        $url = parent::splice($url,$token);
        $params = [
            "path" => $path,
            "width" => (int)$width,
        ];
        $data = HttpHelper::inter_curl($url,json_encode($params,JSON_UNESCAPED_UNICODE),1,1);
        $data_arr = json_decode($data,true);
        if(isset($data_arr["errcode"])){
            return parent::return_format(500,$data_arr["errmsg"],$data_arr);
        }
        if(empty($data)){
            return parent::return_format(500,"生成失败",[]);
        }
        return parent::return_format(200,"生成完成",["pic_text"=>$data]);
    }
}