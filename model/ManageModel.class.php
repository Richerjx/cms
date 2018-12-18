<?php
/**
 * @fileinfo	manage.class.php	管理员实体类[UTF-8]
 * @authors Richer (admin@tutuj.com)
 * @date    2018年8月6日 下午2:56:48
 * @version ver 1.0.0
 * @Copyright Richar Web company
 */
class ManageModel extends Model{
    private $id;
    private $admin_user;
    private $admin_pass;
    private $level;
    private $last_ip;
    private $limit;
    
    //拦截器(__set)
    public function __set($_key, $_value) {
        $this->$_key = Tool::mysqlString($_value);
    }
   
    //拦截器(__get)
    public function __get($_key){
        return $this->$_key;
    }

    //设置管理员登录统计次数、ip、时间
    public function setLoginCount() {
        $_sql = "UPDATE 
                        cms_manage 
                    SET 
                        login_count=login_count+1,
                        last_ip='$this->last_ip',
                        last_time=NOW()
                    WHERE 
                        admin_user='$this->admin_user'
								LIMIT 1";
        return parent::aud($_sql);
    }

    //获取管理员总记录
    public function getManageTotal(){
        $_sql="select count(*) from cms_manage";
        return parent::total($_sql);
    }

    //查询登录管理员
    public function getLoginManage() {
        $_sql = "SELECT 
										m.admin_user,
										l.level_name 
								FROM 
										cms_manage m,
										cms_level l
								WHERE 
										m.admin_user='$this->admin_user' 
									AND 
										m.admin_pass='$this->admin_pass'
									AND
										m.level=l.id
									LIMIT 1";
        return parent::one($_sql);
    }

    //查询单个管理员
    public function  getOneManage(){
        $_sql="select
                    id,
                    admin_user,
                    admin_pass,
                    level 
                from 
                    cms_manage 
                where 
                    id='$this->id'
                or
                    admin_user='$this->admin_user' 
                or
                    level='$this->level'
                limit 1";
      return parent::one($_sql);
    }

    //查询所有管理员
    public function  getAllManage(){
        $_sql="select
                    m.id,
                    m.admin_user,
                    l.level_name,
                    m.login_count,
                    m.last_ip,
                    m.last_time 
                from
                    cms_manage m,
                    cms_level l
                where
                    l.id=m.level
                order by 
                    m.id desc
                    $this->limit
                     ";
        return parent::all($_sql);
       
    }
    //新增管理员
    public function  addManage(){
        $_sql="insert into 
                        cms_manage (
                                    admin_user,
                                    admin_pass,
                                    level,
                                    reg_time
                                    ) 
                            values (
                                    '$this->admin_user',
                                    '$this->admin_pass',
                                    '$this->level',
                                    NOW()
                                    )";
       return parent::aud($_sql);
       
    }
    //修改管理员
    public function updateManage(){
        $_sql="update 
                    cms_manage 
                set 
                    admin_pass='$this->admin_pass',
                    level ='$this->level'
                where 
                    id='$this->id' 
                limit 1";
        return parent::aud($_sql);
        
    }
    //删除管理员
    public function  deleteManage(){
        $_sql="delete from 
                        cms_manage 
                      where 
                        id='$this->id' 
                      limit 1";
        return parent::aud($_sql);
    }
}
?>