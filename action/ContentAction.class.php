<?php
/**
 * @fileinfo	ManageAction.class.php	[UTF-8]//业务流程控制器
 * @authors Richer (admin@tutuj.com)
 * @date    2018年8月10日 上午9:31:08
 * @version ver 1.0.0
 * @Copyright Richar Web company
 */
class ContentAction extends Action{
   
    
    //构造方法
    public function __construct(&$_tpl){
        parent::__construct($_tpl, new ContentModel());
    }
    
    //action方法
    public function _action(){
        switch ($_GET['action']){
            case 'show':
                $this->show();               
                break;
            case 'add':
                $this->add();
                break;
            case 'update':
                $this->update();
                break;
            case 'delete':
                $this->delete();
                break;
            default:
                Tool::alertBack('非法操作');
        }
      
    }
    //show
    private function show(){

    }
    
    //add
    private function add(){

    }
    //update
    private function update(){

    }
    //delete
    private function delete(){

    }
    
}




?>