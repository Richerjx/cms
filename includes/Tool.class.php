<?php
/**
 * @fileinfo	Tool.class.php	[UTF-8] 工具类01053712504
 * @authors Richer (admin@tutuj.com)
 * @date    2018年8月7日 下午3:21:16
 * @version ver 1.0.0
 * @Copyright Richar Web company
 */

class Tool {
    
    //弹窗跳转
    static public function alertLocation($_info,$_url){
        if(!empty($_info)) {
            echo "<script type='text/javascript'>alert('$_info');location.href='$_url';</script>";
            exit();
        }else{
            header('Location:'.$_url);
            exit();
        }
    }
    
    //弹窗返回
    static public function alertBack($_info){
        echo "<script type='text/javascript'>alert('$_info');history.back();</script>";
        exit();
    }

    //显示html过滤
    static function htmlString($_date) {
        if (is_array($_date)) {
            foreach ($_date as $_key=>$_value) {
                $_string[$_key] = Tool::htmlString($_value);  //递归
            }
        } elseif (is_object($_date)) {
            $_string=new stdClass();                        //实例化空类
            foreach ($_date as $_key=>$_value) {
                $_string->$_key = Tool::htmlString($_value);  //递归
            }
        } else {
            $_string = htmlspecialchars($_date);
        }
        return $_string;
    }

    //数据库输入过滤
    static public function mysqlString($_date) {
        if (GPC){
            return mysql_real_escape_string($_date);
        }
        return $_date;
    }

    //清理SESSION
    static public function unSession(){
        if(session_start()){
            session_destroy();
        }
    }





}




?>