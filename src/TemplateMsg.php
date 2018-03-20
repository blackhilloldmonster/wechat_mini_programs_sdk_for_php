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
 * Time: 14:41
 */

namespace BHOM\WechatMP;

use BHOM\WechatMP\Http\HttpHelper;
class TemplateMsg extends BaseConf
{
    /**
     * @param $token
     * @param int $offset
     * @param int $count
     * @return array
     */
    public static function get_wxtemplat($token,$offset=0,$count=100){
        $url = parent::config("template_msg.get_template_list");
        $url = parent::splice($url,$token);
        $params = [
            "access_token" => $token,
            "offset" => (int)$offset,
            "count" => (int)$count,
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

    /**
     * @param $token
     * @param $id
     * @return array
     */
    public static function get_wxtemplat_by_id($token,$id){
        $url = parent::config("template_msg.get_template_keyword_list");
        $url = parent::splice($url,$token);
        $params = [
            "access_token" => $token,
            "id" => $id
        ];
        $data = HttpHelper::inter_curl($url,json_encode($params,JSON_UNESCAPED_UNICODE),1,1);
        $data_arr = json_decode($data,true);
        if(isset($data_arr["errcode"])){
            if($data_arr["errcode"] == 0){
                return parent::return_format(200,"获取模版详情成功",$data_arr);
            }
            return parent::return_format(500,$data_arr["errmsg"],$data_arr);
        }
        return parent::return_format(500,"调用获取失败",$data_arr);
    }

    /**
     * @param $token
     * @param $id
     * @param $keyword_id_list
     * @return array
     */
    public static function add_mytemplat($token,$id,$keyword_id_list){
        $url = parent::config("template_msg.add_template_tomy");
        $url = parent::splice($url,$token);
        $params = [
            "access_token" => $token,
            "id" => $id,
            "keyword_id_list" => $keyword_id_list
        ];
        $data = HttpHelper::inter_curl($url,json_encode($params,JSON_UNESCAPED_UNICODE),1,1);
        $data_arr = json_decode($data,true);
        if(isset($data_arr["errcode"])){
            if($data_arr["errcode"] == 0){
                return parent::return_format(200,"模版添加成功",$data_arr);
            }
            return parent::return_format(500,$data_arr["errmsg"],$data_arr);
        }
        return parent::return_format(500,"调用添加失败",$data_arr);
    }

    /**
     * @param $token
     * @param int $offset
     * @param int $count
     * @return array
     */
    public static function get_mytemplat_list($token,$offset=0,$count=100){
        $url = parent::config("template_msg.get_mytemplate_list");
        $url = parent::splice($url,$token);
        $params = [
            "access_token" => $token,
            "offset" => $offset,
            "count" => $count
        ];
        $data = HttpHelper::inter_curl($url,json_encode($params,JSON_UNESCAPED_UNICODE),1,1);
        $data_arr = json_decode($data,true);
        if(isset($data_arr["errcode"])){
            if($data_arr["errcode"] == 0){
                return parent::return_format(200,"获取我的模版列表成功",$data_arr);
            }
            return parent::return_format(500,$data_arr["errmsg"],$data_arr);
        }
        return parent::return_format(500,"调用获取失败",$data_arr);
    }

    /**
     * @param $token
     * @param $template_id
     * @return array
     */
    public static function del_mytemplat_by_id($token,$template_id){
        $url = parent::config("template_msg.del_template_from_mylist");
        $url = parent::splice($url,$token);
        $params = [
            "access_token" => $token,
            "template_id" => $template_id
        ];
        $data = HttpHelper::inter_curl($url,json_encode($params,JSON_UNESCAPED_UNICODE),1,1);
        $data_arr = json_decode($data,true);
        if(isset($data_arr["errcode"])){
            if($data_arr["errcode"] == 0){
                return parent::return_format(200,"删除成功",$data_arr);
            }
            return parent::return_format(500,$data_arr["errmsg"],$data_arr);
        }
        return parent::return_format(500,"调用删除失败",$data_arr);
    }

    /**
     * @param $token
     * @param $template_id
     * @param $form_id
     * @param $data [["value"=>"99939993","color"=>"#173177"],["value"=>"测试","color"=>"#173177"]]
     * @param string $page
     * @param string $color
     * @param string $emphasis_keyword
     * @return array
     */
    public static function send_mytemplat($token,$template_id,$form_id,array $data,$page="",$color="",$emphasis_keyword=""){
        $url = parent::config("template_msg.send_template");
        $url = parent::splice($url,$token);
        $params = [
            "touser" => $token,
            "template_id" => $template_id,
            "page" => $page,
            "form_id" => $form_id,
            "data" => parent::format_template_data($data),
            "color" => $color,
            "emphasis_keyword" => $emphasis_keyword,
        ];
        if(empty($emphasis_keyword)){
            unset($params["emphasis_keyword"]);
        }
        if(empty($color)){
            unset($params["color"]);
        }
        if(empty($page)){
            unset($params["page"]);
        }
        $data = HttpHelper::inter_curl($url,json_encode($params,JSON_UNESCAPED_UNICODE),1,1);
        $data_arr = json_decode($data,true);
        if(isset($data_arr["errcode"])){
            if($data_arr["errcode"] == 0){
                return parent::return_format(200,"发送成功",$data_arr);
            }
            return parent::return_format(500,$data_arr["errmsg"],$data_arr);
        }
        return parent::return_format(500,"调用发送失败",$data_arr);
    }
}