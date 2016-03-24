<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class IndexController extends Controller
{
	public $enableCsrfValidation = false;
	public function actionIndex() {
		return $this -> render("index");
	}
	public function actionAdd() {
		$title = $_POST['title'];
		$info  = $_POST['info'];

		$sql = "INSERT INTO message(title,info) VALUES('$title','$info')";
		$arr = Yii::$app -> db -> createCommand($sql) -> execute();

		if ($arr) {
			echo "<script>alert('留言成功');location.href='index.php?r=index/lists'</script>";
		} else {
			echo "<script>alert('留言失败');history.go(-1)</script>";
		}
	}
	public function actionLists() {
		// 当前页
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		// 总条数
		$sl = "SELECT COUNT(*) FROM message";
		$re = Yii::$app -> db -> createCommand($sl) -> queryAll();
		$count = $re[0]['COUNT(*)'];
		// 每页显示条数
		$size = 5;
		// 总页数
		$countpage = ceil($count/$size);
		// 上一页
		$prev = ($page*1-1 < 1) ? 1 : $page*1-1;
		// 下一页
		$next = ($page*1+1 > $countpage) ? $countpage : $page*1+1;
		// 偏移量
		$limit = ($page-1)*$size;

		$sql = "SELECT id,title,info FROM message LIMIT $limit,$size";
		$arr = Yii::$app -> db -> createCommand($sql) -> queryAll();

		return $this -> render('lists',[
			'arr'=>$arr,
			'page'=>$page,
			'prev'=>$prev,
			'next'=>$next,
			'countpage'=>$countpage,
			'count'=>$count
		]);
	}
	public function actionDelete() {
		$id = $_GET['id'];

		$sql = "DELETE FROM message WHERE id = '$id'";
		$arr = Yii::$app -> db -> createCommand($sql) -> execute();

		if ($arr) {
			echo "<script>alert('删除成功');location.href='index.php?r=index/lists'</script>";
		} else {
			echo "<script>alert('删除失败');location.href='index.php?r=index/lists'</script>";
		}
	}
	public function actionUpdate() {
		$id = $_GET['id'];

		$sql = "SELECT id,title,info FROM message WHERE id = '$id'";
		$arr = Yii::$app -> db -> createCommand($sql) -> queryOne();

		return $this -> render('save',['arr'=>$arr]);
	}
	public function actionSave() {
		$id = $_POST['id'];
		$title = $_POST['title'];
		$info = $_POST['info'];

		$sql = "UPDATE message SET title = '$title' and info = '$info' WHERE id = '$id'";
		$arr = Yii::$app -> db -> createCommand($sql) -> execute();

		if ($arr) {
			echo "<script>alert('修改成功');location.href='index.php?r=index/lists'</script>";
		} else {
			echo "<script>alert('删除失败');location.href='index.php?r=index/update'</script>";
		}
	}
}