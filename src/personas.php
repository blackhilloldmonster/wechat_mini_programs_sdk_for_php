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
 * User: php_developer_01 wuweilong
 * Date: 2018/03/20星期二
 * Time: 15:48
 */

namespace BHOM\WechatMP;

use BHOM\WechatMP\Http\HttpHelper;
class personas extends BaseConf
{
    /**
     * 用户画像
     * @param $token
     * @param int $offset
     * @param int $count
     * @return array
     */
    public static function user_portrait($token,$begin_date,$end_date){
        $url = parent::config("personas.getweanalysisappiduserportrait");
        $url = parent::splice($url,$token);
        $params = [
            "begin_date" => $begin_date,
            "end_date" => $end_date
        ];
        $data = HttpHelper::inter_curl($url,json_encode($params,JSON_UNESCAPED_UNICODE),1,1);
        $data_arr = json_decode($data,true);
        if(isset($data_arr["errcode"])){
            if($data_arr["errcode"] == 0){
                return parent::return_format(200,"列表获取成功",$data_arr);
            }
            return parent::return_format(500,$data_arr["errmsg"],$data_arr);
        }
        return parent::return_format(500,"调用获取失败",$data_arr);
    }
}