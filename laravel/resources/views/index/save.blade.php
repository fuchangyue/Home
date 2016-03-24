<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>修改</title>
</head>
<body>
	<center>
		<form action="{{action('IndexController@save')}}" method="post">
			<input type="hidden" name="id" value="<?= $arr->id ?>" />
			标题：<input type="text" name="title" value="<?= $arr->title ?>" /><br /><br />
			内容：<textarea name="info" cols="20" rows="5"><?= $arr->info ?></textarea><br /><br />
			<input type="submit" value="修改" />
		</form>
	</center>
</body>
</html>