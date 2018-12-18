<?php
/**
 * @fileinfo	Db.class.php	[UTF-8]
 * @authors Richer (admin@tutuj.com)
 * @date    2018年8月4日 上午10:21:53
 * @version ver 1.0.0
 * @Copyright Richar Web company
 */
//数据库连接类
class DB{
    //获取对象句柄
    static public function  getDB(){
        @$_mysqli=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);        
        if (mysqli_connect_errno()){
            echo '数据库连接错误!代码:'.mysqli_connect_errno();
            exit();
        }
        $_mysqli->set_charset('utf8');     
        return  $_mysqli;
    }
    
    //清理
    static public function  unDB(&$_result, &$_db){
        //&表示按地址传参
        if (is_object($_result)) {
            $_result->free();
            $_result = null;
        }
        if (is_object($_db)) {
            $_db->close();
            $_db = null;
        }
    }
 
}
?>