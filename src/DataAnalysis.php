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
 * Time: 15:21
 */

namespace BHOM\WechatMP;

use BHOM\WechatMP\Http\HttpHelper;

class DataAnalysis extends BaseConf
{
    /**
     * 概况
     * @param $token
     * @param $begin_date
     * @param $end_date
     * @return array
     */
    public static function summary($token,$begin_date,$end_date){
        $url = parent::config("data_analysis.getweanalysisappiddailysummarytrend");
        return self::getData($url,$token,$begin_date,$end_date);
    }

    /**
     * 日趋势
     * @param $token
     * @param $begin_date 20170313
     * @param $end_date 20170313
     * @return array
     */
    public static function daily_visit($token,$begin_date,$end_date){
        $url = parent::config("data_analysis.getweanalysisappiddailyvisittrend");
        return self::getData($url,$token,$begin_date,$end_date);
    }

    /**
     * 周趋势
     * @param $token
     * @param $begin_date 开始日期，为周一日期
     * @param $end_date 结束日期，为周日日期，限定查询一周数据
     * @return array
     */
    public static function weekly_visit($token,$begin_date,$end_date){
        $url = parent::config("data_analysis.getweanalysisappidweeklyvisittrend");
        return self::getData($url,$token,$begin_date,$end_date);
    }

    /**
     * 月趋势
     * @param $token
     * @param $begin_date 开始日期，为自然月第一天
     * @param $end_date 结束日期，为自然月最后一天，限定查询一个月数据
     * @return array
     */
    public static function monthly_visit($token,$begin_date,$end_date){
        $url = parent::config("data_analysis.getweanalysisappidmonthlyvisittrend");
        return self::getData($url,$token,$begin_date,$end_date);
    }

    /**
     * 访问分布
     * @param $token
     * @param $begin_date 开始日期
     * @param $end_date 结束日期，限定查询1天数据，end_date允许设置的最大值为昨日
     * @return array
     */
    public static function visit_distribution($token,$begin_date,$end_date){
        $url = parent::config("data_analysis.getweanalysisappidvisitdistribution");
        return self::getData($url,$token,$begin_date,$end_date);
    }

    /**
     * 日留存
     * @param $token
     * @param $begin_date
     * @param $end_date
     * @return array
     */
    public static function daily_retain_info($token,$begin_date,$end_date){
        $url = parent::config("data_analysis.getweanalysisappiddailyretaininfo");
        return self::getData($url,$token,$begin_date,$end_date);
    }

    /**
     * 周留存
     * @param $token
     * @param $begin_date 开始日期，为周一日期
     * @param $end_date 结束日期，为周日日期，限定查询一周数据
     * @return array
     */
    public static function weekly_retain_info($token,$begin_date,$end_date){
        $url = parent::config("data_analysis.getweanalysisappidweeklyretaininfo");
        return self::getData($url,$token,$begin_date,$end_date);
    }

    /**
     * 月留存
     * @param $token
     * @param $begin_date 开始日期，为自然月第一天
     * @param $end_date 结束日期，为自然月最后一天，限定查询一个月数据
     * @return array
     */
    public static function monthly_retain_info($token,$begin_date,$end_date){
        $url = parent::config("data_analysis.getweanalysisappidmonthlyretaininfo");
        return self::getData($url,$token,$begin_date,$end_date);
    }

    /**
     * 访问页面
     * @param $token
     * @param $begin_date 开始日期
     * @param $end_date 结束日期，限定查询1天数据，end_date允许设置的最大值为昨日
     * @return array
     */
    public static function visit_page($token,$begin_date,$end_date){
        $url = parent::config("data_analysis.getweanalysisappidvisitpage");
        return self::getData($url,$token,$begin_date,$end_date);
    }

    /**
     * @param $url
     * @param $token
     * @return array
     */
    private static function getData($url,$token,$begin_date,$end_date){
        $url = parent::splice($url,$token);
        $params = [
            "begin_date" => $begin_date,
            "end_date" => $end_date
        ];
        $data = HttpHelper::inter_curl($url,json_encode($params,JSON_UNESCAPED_UNICODE),1,1);
        $data_arr = json_decode($data,true);
        if(isset($data_arr["errcode"])){
            if($data_arr["errcode"] == 0){
                return parent::return_format(200,"获取成功",$data_arr);
            }
            return parent::return_format(500,$data_arr["errmsg"],$data_arr);
        }
        return parent::return_format(500,"调用获取失败",$data_arr);
    }
}