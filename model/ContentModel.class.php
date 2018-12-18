<?php
/**
 * @fileinfo	manage.class.php	肉容实体类[UTF-8]
 * @authors Richer (admin@tutuj.com)
 * @date    2018年8月6日 下午2:56:48
 * @version ver 1.0.0
 * @Copyright Richar Web company
 */
class ContentModel extends Model{

    //拦截器(__set)
    public function __set($_key, $_value) {
        $this->$_key =Tool::mysqlString($_value);
    }
   
    //拦截器(__get)
    public function __get($_key){
        return $this->$_key;
    }


}
?>