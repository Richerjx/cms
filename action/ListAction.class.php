<?php
/**
 * @fileinfo	ManageAction.class.php	[UTF-8]//业务流程控制器
 * @authors Richer (admin@tutuj.com)
 * @date    2018年8月10日 上午9:31:08
 * @version ver 1.0.0
 * @Copyright Richar Web company
 */
class ListAction extends Action{
    //构造方法
    public function __construct(&$_tpl){
        parent::__construct($_tpl);
    }

    //获取前台显示导航
    public function getNav(){
        if(isset($_GET['id'])){
            $_nav=new NavModel();
            $_nav->id=$_GET['id'];
            if($_nav->getOneNav()) {
                //主导航
                if($_nav->getOneNav()->iid) $_nav1='<a href="list.php?id='.$_nav->getOneNav()->iid.'">'.$_nav->getOneNav()->nnav_name.'</a> &gt; ';
                $_nav2='<a href="list.php?id='.$_nav->getOneNav()->id.'">'.$_nav->getOneNav()->nav_name.'</a>';
                $this->_tpl->assign('nav', $_nav1.$_nav2);
                //子导航集
                $this->_tpl->assign('childnav',$_nav->getAllChildFrontNav());


            }else{
                Tool::alertBack('警告：此导航不存在！');
            }
        }else{
            Tool::alertBack('警告：非法操作');
        }
    }

}
?>