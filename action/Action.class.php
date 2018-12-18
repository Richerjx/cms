<?php
/**控制器基类
 * @fileinfo	Action.class.php	[UTF-8]
 * @authors Richer (admin@tutuj.com)
 * @date    2018年8月10日 下午2:54:01
 * @version ver 1.0.0
 * @Copyright Richar Web company
 */
//控制器基类
class Action{
    protected $_tpl;
    protected $_model;
    
    protected function __construct(&$_tpl,&$_model=null){
        $this->_tpl=$_tpl;
        $this->_model=$_model;
    }
    protected function page($_total){
        $_page = new Page($_total,PAGE_SIZE);
        $this->_model->limit = $_page->limit;
        $this->_tpl->assign('page',$_page->showpage());
        $this->_tpl->assign('num',($_page->page-1)*PAGE_SIZE);
    }
}




?>