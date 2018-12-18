
<div id="top">
	<?php echo $this->_vars['title'];?>
	<a href="###">这里可以放文字广告1</a>
	<a href="###">这里可以放文字广告2</a>
</div>
<div id="header">
	<h1><a href="###">图图家</a></h1>
	<div class="adver"><a href="###"><img src="images/adver.png" alt="广告图" /></a></div>
</div>
<div id="nav">
	<ul>
		<li><a href="./">首页</a></li>
		<?php if($this->_vars['FrontNav']){?>
			<?php foreach ($this->_vars['FrontNav'] as $key=>$value){ ?>
				<li><a href="list.php?id=<?php echo $value->id?>"><?php echo $value->nav_name?></a></li>
			<?php } ?>
		<?php } ?>
	</ul>
</div>
<div id="search">
	<form>
		<select name="type">
			<option selected="selected" >按标题</option>
			<option>按关键字</option>
			<option>全局查询</option>
		</select>
		<input type="text" name="keyword" class="text" />
		<input type="submit" name="send" class="submit" value="搜索" />
	</form>	
	<strong>TAG标签：</strong>
	<ul>
		<li><a href="###">平板电脑(22)</a></li>
		<li><a href="###">ThinkPad(16)</a></li>
		<li><a href="###">Wi-Fi的间谍飞机(14)</a></li>
		<li><a href="###">XOOM(10)</a></li>
		<li><a href="###">双核(7)</a></li>
	</ul>
</div>