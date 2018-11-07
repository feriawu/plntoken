<?php 
	session_start();
	include_once('function/koneksi.php');
	include_once('function/helper.php');

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='".$username."' AND password='".$password."' AND status=1");
	$row = mysqli_fetch_assoc($query);
	if (mysqli_num_rows($query) == 0) {
		$_SESSION['login_failed'] = "Username atau Password salah";
		header("location: ".base_url."/login.php");
	}else{
		$_SESSION['logged_in'] = array(
									'id_user' => $row['id_user'],
									'username' => $row['username'],
									'level' => $row['level']
		);
		header("location: ".base_url);
	}
 ?>