<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>列表</title>
	<style>
		ul{
			margin-left: 600px;
		}
		li{
			list-style: none;
			float: left;
			margin-left: 30px;
		}
	</style>
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
			@foreach ($data as $k => $v)
			<tr>
				<td align="center"><?= $v -> id ?></td>
				<td align="center"><?= $v -> title ?></td>
				<td align="center"><?= $v -> info ?></td>
				<td align="center">
					<a href='update/<?= $v->id ?>'>修改</a>
					<a href='del/<?= $v->id ?>'>删除</a>
				</td>
			</tr>
			@endforeach
		</table>
		{!! $data -> render() !!}
	</center>
</body>
</html>