<?php
/**
 * @fileinfo	ManageAction.class.php	[UTF-8]//业务流程控制器
 * @authors Richer (admin@tutuj.com)
 * @date    2018年8月10日 上午9:31:08
 * @version ver 1.0.0
 * @Copyright Richar Web company
 */
class ManageAction extends Action{
   
    
    //构造方法
    public function __construct(&$_tpl){
        parent::__construct($_tpl, new ManageModel());

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
        parent::page($this->_model->getManageTotal());
        $this->_tpl->assign('show', true);
        $this->_tpl->assign('title', '管理员列表');
        $this->_tpl->assign('AllManage', $this->_model->getAllManage());
    }
    
    //add
    private function add(){
        if (isset($_POST['send'])){
            if(Validate::checkNull($_POST['admin_user'])) Tool::alertBack('警告：用户名不得为空。');
            if(Validate::checkLength($_POST['admin_user'],2,'min')) Tool::alertBack('警告:用户名不得小于两位！');
            if(Validate::checkLength($_POST['admin_user'],20,'max')) Tool::alertBack('警告:用户名不得大于20位!');
            if(Validate::checkNull($_POST['admin_pass'])) Tool::alertBack('警告：密码不得为空。');
            if(Validate::checkLength($_POST['admin_pass'],6,'min')) Tool::alertBack('警告:密码不得小于6位！');
            if(Validate::checkEquals($_POST['admin_pass'],$_POST['admin_notpass'])) Tool::alertBack('警告：密码和密码确认必须一致！');
            $this->_model->admin_user=$_POST['admin_user'];
            if($this->_model->getOneManage()) Tool::alertBack('警告：此用户名已被占用！');
            $this->_model->admin_pass=sha1($_POST['admin_pass']);
            $this->_model->level=$_POST['level'];
            $this->_model->addManage()?Tool::alertLocation('恭喜你,新增管理员成功!', 'manage.php?action=show'):Tool::alertBack('新增管理员失败,请检查!');
        }
        $this->_tpl->assign('add', true);
        $this->_tpl->assign('title', '新增管理员');
        $this->_tpl->assign('prev_url',PREV_URL);
        $_level=new LevelModel();
        $this->_tpl->assign('AllLevel',$_level->getAllLevel());
    }
    //update
    private function update(){
        if(isset($_POST['send'])){
            $this->_model->id=$_POST['id'];
            if(trim($_POST['admin_pass'])==''){
                $this->_model->admin_pass=$_POST['pass'];
            }else{
                if(Validate::checkLength($_POST['admin_pass'],6,'min')) Tool::alertBack('警告:密码不得小于6位！');
                $this->_model->admin_pass=sha1($_POST['admin_pass']);    
            }
            $this->_model->level=$_POST['level'];
            $this->_model->updateManage()?Tool::alertLocation('恭喜你,修改管理员成功!', $_POST['prev_url']):Tool::alertBack('修改管理员失败,请检查!');
        }
        if(isset($_GET['id'])){
            $this->_model->id=$_GET['id'];
            $_manage=$this->_model->getOneManage();
            is_object( $_manage)?true : Tool::alertBack('管理员传值的ID有误!');
            $this->_tpl->assign('admin_user', $_manage->admin_user);
            $this->_tpl->assign('admin_pass', $_manage->admin_pass);
            $this->_tpl->assign('id', $_manage->id);
            $this->_tpl->assign('level', $_manage->level);
            $this->_tpl->assign('update', true);
            $this->_tpl->assign('title', '修改管理员');
            $this->_tpl->assign('prev_url',PREV_URL);
            $_level=new LevelModel();
            $this->_tpl->assign('AllLevel',$_level->getAllLevel());
        }else{
            Tool::alertBack('非法操作!');
        }
    }

    //delete
    private function delete(){
        if (isset($_GET['id'])) {
            $this->_model->id=$_GET['id'];
            $this->_model->deleteManage()?Tool::alertLocation('删除管理员成功!',PREV_URL):Tool::alertBack('删除管理员失败,请检查!');
        }else {
            Tool::alertBack('非法操作!');
        }
    }
}




?>