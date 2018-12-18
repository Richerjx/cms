<?php
/**
 * @fileinfo	manage.class.php	等级实体类[UTF-8]
 * @authors Richer (admin@tutuj.com)
 * @date    2018年8月6日 下午2:56:48
 * @version ver 1.0.0
 * @Copyright Richar Web company
 */
class LevelModel extends Model{
    private $id;
    private $level_name;
    private $level_info;
    private $limit;
   
    
    //拦截器(__set)
    public function __set($_key, $_value) {
        $this->$_key =Tool::mysqlString($_value);
    }
   
    //拦截器(__get)
    public function __get($_key){
        return $this->$_key;
    }

    //获取等级总记录
    public function getLevelTotal(){
        $_sql="select count(*) from cms_level";
        return parent::total($_sql);
    }
       
    //查询单个
    public function  getOneLevel(){
        $_sql="select
                    id,
                    level_name,
                    level_info 
                from 
                    cms_level 
                where 
                    id='$this->id' 
                or
                    level_name='$this->level_name'
                limit 1";
      return parent::one($_sql);
    }

    //查询所有等级,,不带limit
    public function  getAllLevel(){
        $_sql="select
                     id,
                    level_name,
                    level_info 
                from
                    cms_level
                order by 
                    id desc";
        return parent::all($_sql);
    }

    //查询所有等级,带LIMIT
    public function getAllLimitLevel(){
        $_sql="select 
                    id,
                    level_name,
                    level_info
                from
                    cms_level
                order by 
                    id desc 
                    $this->limit";
        return parent::all($_sql);
    }

    //新增
    public function  addLevel(){
        $_sql="insert into 
                        cms_level (
                                    level_name,
                                    level_info
                                    ) 
                            values (
                                    '$this->level_name',
                                    '$this->level_info'
                                    )";
       return parent::aud($_sql);
       
    }
    //修改
    public function updateLevel(){
        $_sql="update 
                    cms_level 
                set 
                    level_name='$this->level_name',
                    level_info ='$this->level_info'
                where 
                    id='$this->id' 
                limit 1";
        return parent::aud($_sql);
        
    }
    //删除
    public function  deleteLevel(){
        $_sql="delete from 
                        cms_level 
                      where 
                        id='$this->id' 
                      limit 1";
        return parent::aud($_sql);
    }
}
?>