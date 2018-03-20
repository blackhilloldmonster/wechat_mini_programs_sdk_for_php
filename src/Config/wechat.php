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
 * Time: 14:14
 */
return [
    //本地第三方服务器获取小程序的token
    "token" => [
        "get_token" => "https://api.weixin.qq.com/cgi-bin/token",
    ],
    //用户登陆小程序，通过本地服务器换取本地服务器访问权限验证码
    "login" => [
        "get_login" => "https://api.weixin.qq.com/sns/jscode2session",
    ],
    "qr" => [
        "mack_qr_a" => "https://api.weixin.qq.com/wxa/getwxacode",//数量有限的小程序码
        "mack_qr_b" => "https://api.weixin.qq.com/wxa/getwxacodeunlimit",//数量无限的小程序码
        "mack_qr_c" => "https://api.weixin.qq.com/cgi-bin/wxaapp/createwxaqrcode",//数量有限小程序的二维码
    ],
    "template_msg" => [
        "get_template_list" => "https://api.weixin.qq.com/cgi-bin/wxopen/template/library/list",
        "get_template_keyword_list" => "https://api.weixin.qq.com/cgi-bin/wxopen/template/library/get",
        "add_template_tomy" => "https://api.weixin.qq.com/cgi-bin/wxopen/template/add",
        "get_mytemplate_list" => "https://api.weixin.qq.com/cgi-bin/wxopen/template/list",
        "del_template_from_mylist" => "https://api.weixin.qq.com/cgi-bin/wxopen/template/del",
        "send_template" => "https://api.weixin.qq.com/cgi-bin/message/wxopen/template/send",
    ],
    "data_analysis" => [
        "getweanalysisappiddailysummarytrend" => "https://api.weixin.qq.com/datacube/getweanalysisappiddailysummarytrend",//整体趋势
        "getweanalysisappiddailyvisittrend" => "https://api.weixin.qq.com/datacube/getweanalysisappiddailyvisittrend",//日趋势
        "getweanalysisappidweeklyvisittrend" => "https://api.weixin.qq.com/datacube/getweanalysisappidweeklyvisittrend",//周趋势
        "getweanalysisappidmonthlyvisittrend" => "https://api.weixin.qq.com/datacube/getweanalysisappidmonthlyvisittrend",//月趋势
        "getweanalysisappidvisitdistribution" => "https://api.weixin.qq.com/datacube/getweanalysisappidvisitdistribution",//访问分布
        "getweanalysisappiddailyretaininfo" => "https://api.weixin.qq.com/datacube/getweanalysisappiddailyretaininfo",//日留存
        "getweanalysisappidweeklyretaininfo"=>"https://api.weixin.qq.com/datacube/getweanalysisappidweeklyretaininfo",//周留存
        "getweanalysisappidmonthlyretaininfo" => "https://api.weixin.qq.com/datacube/getweanalysisappidmonthlyretaininfo",//月留存
        "getweanalysisappidvisitpage" => "https://api.weixin.qq.com/datacube/getweanalysisappidvisitpage",//访问页面
    ],
    "personas" => [
        "getweanalysisappiduserportrait" => "https://api.weixin.qq.com/datacube/getweanalysisappiduserportrait",//用户画像
    ]

];