<?php
/**
 * @fileinfo	Template.class.php	[UTF-8] 模板类
 * @authors Richer (admin@tutuj.com)
 * @date    2018年5月28日 下午3:23:21
 * @version ver 1.0.0
 * @Copyright Richar Web company
 */
//模板类
class Templates{
    //通过数组动态接收变量
    private $_vars=array();
    //系统变量
    private $_config=array();
    
    //构造方法,判断相应目录是否存在
    public function __construct(){
        if(!is_dir(TPL_DIR)||!is_dir(TPL_C_DIR)||!is_dir(CACHE)){
            exit('ERROR:模板目录或编译目录或缓存目录不存在,请手动添加!');
        }
       //从XML中保存系统变量        
        $_sxe=simplexml_load_file(ROOT_PATH.'/config/profile.xml');
        $_taglib=$_sxe->xpath('/root/taglib');        
        foreach ($_taglib as $_tag){
            $this->_config["$_tag->name"]=$_tag->value;
        }        
     
    }
    
    //assign()方法,用于注入变量
    //$_var同步模板里的变量名,如index.php里是name,那index.tpl里就是{name}
    //$_value值表示的是index.php里$_name的值
    public function assign($_var,$_value){
        if(isset($_var) && !empty($_var)){
            $this->_vars[$_var]=$_value;
        }else{
            exit('ERROR:必须设置模板变量!');
        } 
    }
    
    
    //display()方法,加载模板
    public function display($_file){
        //给include进来的tpl传一个模板操作的对象
        $_tpl=$this;
        //设置模板的路径
        $_tplFile=TPL_DIR.$_file;
        //判断模板是否存在
        if(!file_exists($_tplFile)){
            exit('ERROR:模板文件'.$_file.'不存在!');
        }
        //是否加入参数
        if(!empty($_SERVER["QUERY_STRING"])) {
            $_file .= $_SERVER["QUERY_STRING"];
        }
        //生成编译文件
        $_parFile=TPL_C_DIR.md5($_file).$_file.'.php';
        //缓存文件
        $_cacheFile=CACHE.md5($_file).$_file.'html';
        //当第二次运行相同文件时,直接载入缓存文件,避开编译
        if(IS_CACHE){
            //判断缓存文件和编译文件同时存在时直接载入编译文件
            if(file_exists($_cacheFile)&&file_exists($_parFile)){
                //判断模板文件是否修改过,判断编译文件是否修改过
                if (filemtime($_parFile)>=filemtime($_tplFile)&&filemtime($_cacheFile)>=filemtime($_parFile)){
                    //echo '正在浏览的是缓存文件';
                    include $_cacheFile;
                    return ;
                }
                
            }            
        }
        
        //判断是否已经存在编译文件或已修改,则生成编译文件
        if(!file_exists($_parFile)||filemtime($_parFile)<filemtime($_tplFile)){
            require_once  ROOT_PATH.'/includes/Parser.class.php';
            $_parser=new Parser($_tplFile); //模板文件
            $_parser->compile($_parFile); //编译文件
            
        }        
        //载入编译文件
        include $_parFile;
        if(IS_CACHE){
            //获取缓冲区内的内容并写入缓存文件
            file_put_contents($_cacheFile,ob_get_contents());
            //清除缓冲区内的内容=清险乎了编译文件加载的内容
            ob_end_clean();
            //转入缓存文件
            include $_cacheFile;
        }
       
    }
    
    
    //创建create方法,用于header和footer这种模块模板解析使用,而不需要生成cache文件
    public function create($_file){
        //设置模板的路径
        $_tplFile=TPL_DIR.$_file;
        //判断模板是否存在
        if(!file_exists($_tplFile)){
            exit('ERROR:模板文件'.$_file.'不存在!');
        }
        //生成编译文件
        $_parFile=TPL_C_DIR.md5($_file).$_file.'.php';
        //判断是否已经存在编译文件或已修改,则生成编译文件
        if(!file_exists($_parFile)||filemtime($_parFile)<filemtime($_tplFile)){
            require_once  ROOT_PATH.'/includes/Parser.class.php';
            $_parser=new Parser($_tplFile); //模板文件
            $_parser->compile($_parFile); //编译文件
        }
        //载入编译文件
        include $_parFile;
    }
    
    
    
    
    
}




?>