<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>main</title>
<link rel="stylesheet" type="text/css" href="../style/admin.css"/>
<script type="text/javascript" src="../js/admin_level.js"></script>
</head>
<body id="main">
	<div class="map">
		内容管理 &gt;&gt; 查看文档列表 &gt;&gt; <strong id="title"><?php echo $this->_vars['title'];?></strong>
	</div>
<ol>
	<li><a href="content.php?action=show" class="selected">文档列表</a></li>
	<li><a href="content.php?action=add">新增文档</a></li>
	<?php if($this->_vars['update']){?>
	<li><a href="content.php?action=update&id=<?php echo $this->_vars['id'];?>">修改文档</a></li>
	<?php } ?>
</ol>	


	
</body>
</html>