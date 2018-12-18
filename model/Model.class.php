<?php
/**模型基类
 * @fileinfo	Model.class.php	[UTF-8]
 * @authors Richer (admin@tutuj.com)
 * @date    2018年8月10日 下午3:02:15
 * @version ver 1.0.0
 * @Copyright Richar Web company
 */
class Model{

    //执行多条SQL语句
    public function multi($_sql){
        $_db=DB::getDB();
        $_db->multi_query($_sql);
        DB::unDB($_result=null,$_db);
        return true;
    }


    //获取下一个增值ID
    public function nextid($_table){
        $_sql="SHOW TABLE STATUS LIKE '$_table'";
        $_object= $this->one($_sql);
        return $_object->Auto_increment;
    }
    //查找总记录模型
    protected function total($_sql){
        $_db=DB::getDB();
        $_result=$_db->query($_sql);
        $_total=$_result->fetch_row();
        DB::unDB($_result,$_db);
        return $_total[0];
    }

    //查单个数据模型
    protected function one($_sql) {
        $_db = DB::getDB();
        $_result = $_db->query($_sql);
        if($_result){
            $_objects = $_result->fetch_object();
            DB::unDB($_result, $_db);
            return Tool::htmlString($_objects);
        }else{
            Tool::alertBack('查询出错!');
        }
    }
    
    //查找多个数据模型
    protected function all($_sql){
        $_db=DB::getDB();
        $_result=$_db->query($_sql);
        $_html=array();
        while (!!$_objects=$_result->fetch_object()){
            $_html[]=$_objects;
        }
        DB::unDB($_result, $_db);
        return Tool::htmlString($_html);
    }
    
    //增删改模型
    protected function aud($_sql){
        $_db=DB::getDB();
        $_db->query($_sql);
        $_affected_rows=$_db->affected_rows;
        DB::unDB($_result,$_db);
        return $_affected_rows;
    }
    
    
    
}




?>