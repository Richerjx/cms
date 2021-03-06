<?php
/**
 * @fileinfo	Parser.class.php	[UTF-8] 模板解析类
 * @authors Richer (admin@tutuj.com)
 * @date    2018年5月28日 下午3:23:46
 * @version ver 1.0.0
 * @Copyright Richar Web company
 */
//模板解析类
class Parser{
    //字段,保存模板内容
    private $_tpl;
    
    //构造方法,用于获取模板文件里的内容
    public function __construct($_tplFile){
        if(!$this->_tpl=file_get_contents($_tplFile)){
            exit('ERROR:模板文件读取错误!');
        }
        
    }
    
    //解析普通变量
    /*private function  parVar(){
        $_patten='/\{\$([\w]+)\}/';
        if(preg_match($_patten,$this->_tpl)){
            //$1为匹配正则后的第一个字符串,相当于\1.但必须转义\\1
            $this->_tpl=preg_replace($_patten, "<?php echo \$this->_vars['$1'];?>",$this->_tpl);
        }
    }*/
    private function parVar() {
        $_patten = '/\{\$([\w]+)\}/';
        if (preg_match($_patten,$this->_tpl)) {
            $this->_tpl = preg_replace($_patten,"<?php echo \$this->_vars['$1'];?>",$this->_tpl);
        }
    }
    
    //解析if语句
    private function parIf(){
        $_pattenIf='/\{if\s+\$([\w]+)\}/';
        $_pattenEndIf='/\{\/if\}/';
        $_pattenElse='/\{else\}/';
        //匹配if(){
        if(preg_match($_pattenIf,$this->_tpl)){
            //匹配}
            if(preg_match($_pattenEndIf,$this->_tpl)){
                $this->_tpl=preg_replace($_pattenIf, "<?php if(\$this->_vars['$1']){?>", $this->_tpl);
                $this->_tpl=preg_replace($_pattenEndIf,"<?php } ?>", $this->_tpl);
                //匹配}else{
                if(preg_match($_pattenElse, $this->_tpl)){
                    $this->_tpl=preg_replace($_pattenElse,"<?php }else{ ?>", $this->_tpl);
                }
            } else {
                exit('ERROR:if语句没有关闭!');
            }
        }
    }
    
    //解析foreach语句
    private function parForeach(){
        $_pattenForeach='/\{foreach\s+\$([\w]+)\(([\w]+),([\w]+)\)\}/';
        $_pattenEndForeach='/\{\/foreach\}/';
        $_pattenVar='/\{@([\w]+)([\w\-\>\+]*)\}/';
        if(preg_match($_pattenForeach, $this->_tpl)){
            if(preg_match($_pattenEndForeach, $this->_tpl)){
               $this->_tpl=preg_replace($_pattenForeach, "<?php foreach (\$this->_vars['$1'] as \$$2=>\$$3){ ?>", $this->_tpl);            
               $this->_tpl=preg_replace($_pattenEndForeach, "<?php } ?>", $this->_tpl);
               if(preg_match($_pattenVar, $this->_tpl)){
                   $this->_tpl=preg_replace($_pattenVar,"<?php echo \$$1$2?>", $this->_tpl);
                   
               }
           }else{
               exit('ERROR:foreach语句没有关闭!');
           }
        }
    }
    
    //解析include语句
    private function parInclude(){
        $_patten='/\{include\s+file=(\"|\')([\w\.\-\/]+)(\"|\')\}/';
        if(preg_match_all($_patten, $this->_tpl,$_file)){
            foreach ($_file[2] as $_value){
                if(!file_exists('templates/'.$_value)){
                    exit('Error:包含文件出错!');
                }
                $this->_tpl=preg_replace($_patten, "<?php \$_tpl->create('$2')?>", $this->_tpl);
            }
            
            
        }
    }
    
    //php代码注释
    private function parCommon(){
        $_patten='/\{#\}(.*)\{#\}/';
        if (preg_match($_patten, $this->_tpl)){
            $this->_tpl=preg_replace($_patten, "<?php /* $1 */?>",$this->_tpl );
        }
    }
    
    //解析系统变量
    private function parConfig(){
        $_patten='/<!--\{([\w]+)\}-->/';
        if(preg_match($_patten, $this->_tpl)){
            $this->_tpl=preg_replace($_patten, "<?php echo \$this->_config['$1'];?>", $this->_tpl);
        }
    } 
    
    //对外公共方法
    public function compile($_parFile){
        //解析模板内容
        $this->parVar();
        $this->parIf();
        $this->parForeach();
        $this->parInclude();
        $this->parCommon();
        $this->parConfig();
        
        //生成编译文件
        if(!file_put_contents($_parFile,$this->_tpl)){
            exit('ERROR:模板文件生成出错!');
        }
    }
    
    
}




?>