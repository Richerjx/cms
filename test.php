<?php
/**
 * @fileinfo	text.php	[UTF-8] 功能测试文件
 * @authors Richer (admin@tutuj.com)
 * @date    2018年5月28日 下午4:31:10
 * @version ver 1.0.0
 * @Copyright Richar Web company
 */
require dirname(__FILE__).'/init.inc.php';
$_vc=new ValidateCode();
//$_vc->doimg();
//$code=$_vc->createCode();
//echo substr(dirname(__FILE__).'\admin',0,-6);
//生成文件
//file_put_contents('123.php','fadsfadsfadsf;sdfj;dafj;adsfjasd');
//读取文件
//echo file_get_contents('templates/index.tpl');
/* $_str='{$name}';
if(preg_match('/{\$.*}/', $_str)){
    echo '存在';
}else {
    echo '不存在';
};
 */
/* $_config=array();

$_sxe=simplexml_load_file('config/profile.xml');
$_taglib=$_sxe->xpath('/root/taglib');

foreach ($_taglib as $_tag){
    $_config["$_tag->name"]=$_tag->value;
}
//print_r($_config);
echo $_config['webname'].'<br />';
echo $_config['pagesizi']; */
/*ob_start();
echo '<div>我向浏览器输出,并将数据放在了缓冲区</div>';
$a=ob_get_contents();
ob_end_clean();
echo $a;*/

?>