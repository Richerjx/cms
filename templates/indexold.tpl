<?php
/**
* ==============================================
* @date: 2018年5月28日
* @author: Richer
* @version: 1.0
* ==============================================
*/


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><!--{webname}--></title>
</head>
<body>
{$title}
<!--我是静态注释-->
系统设置的分页数为:<!--{pagesize}-->
{include file="test.php"}

{#}我是PHP中的注释,在静态中是看不到的,只能在php源代码中才能看到{#}
{$name}必须经过Parser.class.php解析类解析出来.
</br>
{$content};
</br>
{if $a}
	<div>这里是一号介面</div>
{else}
	<div>这里是二号介面</div>	
{/if}
<br/>
{#}foreach中的@表示TPL模板的打印功能{#}
{foreach $array(key,value)}
	{@key}....{@value}<br/>

{/foreach}
</body>
</html>