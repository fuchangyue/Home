<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>列表</title>
</head>
<body>
	<center>
		<table border="1" cellspacing="0" cellpadding="5" width="500">
			<tr>
				<td align="center"> ID </td>
				<td align="center">标题</td>
				<td align="center">内容</td>
				<td align="center">操作</td>
			</tr>
			<?php foreach ($arr as $k => $v) { ?>
			<tr>
				<td align="center"><?php echo $v['id'] ?></td>
				<td align="center"><?php echo $v['title'] ?></td>
				<td align="center"><?php echo $v['info'] ?></td>
				<td align="center">
					<a href="index.php?r=index/update&id=<?php echo $v['id'] ?>">修改</a>
					<a href="index.php?r=index/delete&id=<?php echo $v['id'] ?>">删除</a>
				</td>
			</tr>
			<?php } ?>
		</table>
		<br />
		<a href="#">当前第<font color="red"><?php echo $page ?></font>页 / 共<font color="red"><?php echo $countpage ?></font>页 / 共<font color="red"><?php echo $count ?></font>条</a>
		<a style="margin-left: 15px" href="index.php?r=index/lists&page=1">首页</a>
		<a style="margin-left: 15px" href="index.php?r=index/lists&page=<?php echo $prev ?>">上一页</a>
		<a style="margin-left: 15px" href="index.php?r=index/lists&page=<?php echo $next ?>">下一页</a>
		<a style="margin-left: 15px" href="index.php?r=index/lists&page=<?php echo $countpage ?>">尾页</a>
	</center>
</body>
</html>