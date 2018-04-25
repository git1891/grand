<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"E:\myweb\test60000/application/index\view\index\show_index.html";i:1522741569;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<style>
			h1,ul{text-align: center;}
			ul{list-style: none}
		</style>
		<h1>test  -   <?php echo $domain; ?></h1>

		<ul>
			<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$li): $mod = ($i % 2 );++$i;?>
				<li><?php echo $li['name']; ?>   --   <?php echo $li['pwd']; ?></li>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
		
	</body>
</html>
