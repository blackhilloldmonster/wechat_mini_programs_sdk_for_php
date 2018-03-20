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
 * Date: 2018/03/19星期一
 * Time: 14:57
 */

namespace BHOM\WechatMP;

use BHOM\WechatMP\Http\HttpHelper;

class Token extends BaseConf
{
    /**
     * 获取token
     * @param $appid
     * @param $appsecret
     * @param $grant_type
     * @return array
     */
    public static function get_token($appid,$appsecret,$grant_type="client_credential"){
        $url = parent::config("token.get_token");
        $params = [
            "grant_type" =>$grant_type,
            "appid" => $appid,
            "secret" => $appsecret
        ];
        $data = HttpHelper::inter_curl($url,$params,0,1);
        $data_arr = json_decode($data,true);
        if(isset($data_arr["errcode"])){
            return parent::return_format(500,$data_arr["errmsg"],$data_arr);
        }
        if(empty($data_arr)){
            return parent::return_format(500,"生成失败",[]);
        }
        return parent::return_format(200,"成功",$data_arr);
    }
}