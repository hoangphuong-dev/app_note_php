<?php 
require_once 'core/init.php';
if($user) {
	header('Location: index.php');
}
$user_signin = $db->real_escape_string(@$_POST['user_signin']);
$pass_signin = @md5($_POST['pass_signin']);
// Các biến chứa code JS về thông báo
$show_alert = "<script>$('#formSignin .alert').removeClass('hidden');</script>";
$hide_alert = "<script>$('#formSignin .alert').addClass('hidden');</script>";
$success_alert = "<script>$('#formSignin .alert').attr('class', 'alert alert-success');</script>";
// Lệnh SQL kiểm tra sự tồn tại của username
$sql_check_user_exist = "SELECT username FROM users WHERE username = '$user_signin'";
// Nếu tồn tại username
if ($db->num_rows($sql_check_user_exist)) {
	$sql_check_login = "SELECT username FROM users WHERE username = '$user_signin' AND password = '$pass_signin'";
	if ($db->num_rows($sql_check_login)) {
        // Gửi dữ liệu để lưu session
		$session->send($user_signin);
		$db->close();
		echo $show_alert.$success_alert." Đăng nhập thành công.
		<script>
		location.reload();
		</script>
		";
	} else {
		echo $show_alert.'Tên đăng nhập hoặc mật khẩu không chính xác !';
	}
}
else {
	echo $show_alert.'Tên đăng nhập hoặc mật khẩu không chính xác !';
}