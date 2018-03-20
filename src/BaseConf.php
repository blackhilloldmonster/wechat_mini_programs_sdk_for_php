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
 * Time: 10:56
 */

namespace BHOM\WechatMP;

class BaseConf
{
    protected $url;//本地配置的地址配置
    public function __construct(){
        //加载
        $this->url = include("Config/wechat.php");
    }

    /**
     * 拼接一些需要token参数的请求URL
     * @param $url
     * @param $token
     * @return string
     */
    public static function splice($url,$token){
        return "{$url}?access_token={$token}";
    }

    /**
     * 根据需要的配置路径获取地址如（"token.get_token"）
     * @param $string
     * @return mixed
     */
    public static function config($string){
        $url_config = new self();
        $url = $url_config->url;
        $arr = explode(".",$string);
        foreach ($arr as $k=>$v){
            $url = $url["{$v}"];
        }
        return $url;
    }

    /**
     * @param array $data
     * @return array
     */
    public static function format_template_data(array $data){
        $i = 1;
        $new_arr = [];
        foreach ($data as $item){
            $new_arr["keyword{$i}"] = $item;
            $i++;
        }
        return $new_arr;
    }

    /**
     * 格式化返回参数
     * @param $code
     * @param $message
     * @param array $data
     * @return array
     */
    public static function return_format($code,$message,array $data = []){
        return ["code"=>$code,"message"=>$message,"data"=>$data];
    }
}