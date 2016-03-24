<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class IndexController extends Controller
{
	public function index() {
		return view("index.index");
	}

	public function add() {
		$title = $_POST['title'];
		$info  = $_POST['info'];

		$data = DB::insert("INSERT INTO message(title,info) VALUES($title,$info)");

		if ($data) {
			return redirect() -> action('IndexController@lists');
		} else {
			return redirect() -> action('IndexController@index');
		}
	}

	public function lists() {
		$data = DB::table('message') -> simplePaginate(6);

		return view("index.lists",['data'=>$data]);
	}

	public function del($id) {
		$data = DB::delete("DELETE FROM message WHERE id = '$id'");

		if ($data) {
			return redirect() -> action('IndexController@lists');
		} else {
			return redirect() -> action('IndexController@lists');
		}
	}

	public function update($id) {
		$data = DB::select("SELECT * FROM message WHERE id = '$id'");
		foreach ($data as $k => $v) {
			$arr = $v;
		}

		return view('index.save',['arr'=>$arr]);
	}
	public function save() {
		$id = $_POST['id'];
		$title = $_POST['title'];
		$info = $_POST['info'];

		$data = DB::update("UPDATE message SET title = '$title' , info = '$info' WHERE id = '$id'");

		if ($data) {
			return redirect() -> action('IndexController@lists');
		} else {
			return redirect() -> action('IndexController@update');
		}
	}
}