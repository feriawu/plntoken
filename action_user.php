<?php 
	include_once('function/koneksi.php');
	include_once('function/helper.php');

	$delete = isset($_GET['delete']) ? $_GET['delete'] : false;
	$soft_delete = isset($_GET['soft_delete']) ? $_GET['soft_delete'] : false;

	if ($delete !== false) {
		mysqli_query($koneksi, "DELETE FROM user WHERE id_user='$delete'");
	}elseif($soft_delete !== false){
		$id = $_GET['id'];
		mysqli_query($koneksi, "UPDATE user SET status=$soft_delete WHERE id_user='$id'");
	}
		
	$id_user = $_POST['id_user'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$level = $_POST['level'];
	$button = $_POST['button'];

	if ($button == 'Add') {
		$query = mysqli_query($koneksi, "INSERT INTO user (username, password, level, status) VALUES('".$username."', '".$password."', '".$level."', 1)");
	}elseif ($button == 'Update') {
		$id_user = $_POST['id_user'];
		mysqli_query($koneksi, "UPDATE user SET username='$username', password='$password', level='$level' WHERE id_user='$id_user'");
	}
		
	header("location: ".base_url."?page=data_user");
 ?>