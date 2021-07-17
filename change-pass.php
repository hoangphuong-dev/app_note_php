<?php 
require_once 'core/init.php';
if (!$user) {
    header('Location: index.php'); // Di chuyển đến trang chủ
}
// Nhận dữ liệu và gán vào các biến đồng thời xử lý chuỗi
$old_pass = @md5($_POST['old_pass']);
$new_pass = @$_POST['new_pass'];
$re_new_pass = @$_POST['re_new_pass'];
// Các biến chứa code JS về thông báo
$show_alert = "<script>$('#formChangePass .alert').removeClass('hidden');</script>";
$hide_alert = "<script>$('#formChangePass .alert').addClass('hidden');</script>";
$success_alert = "<script>$('#formChangePass .alert').attr('class', 'alert alert-success');</script>";
if ($old_pass != $data_user['password']) {
    echo $show_alert.'Mật khẩu cũ nhập không chính xác, đảm bảo đã tắt caps lock.';
} else if (strlen($new_pass) < 6) {
    echo $show_alert.'Mật khẩu quá ngắn, hãy thử với mật khẩu khác an toàn hơn.';
} else if ($new_pass != $re_new_pass) {
    echo $show_alert.'Nhập lại mật khẩu mới không khớp, đảm bảo đã tắt caps lock.';
} else {
    $new_pass = md5($new_pass);
    $sql_change_pass = "UPDATE users SET password = '$new_pass' WHERE id_user = '$data_user[id_user]'";
    $db->query($sql_change_pass);
    $db->close();
    echo $show_alert.$success_alert.'Đổi mật khẩu thành công.
    <script>
    location.reload();
    </script>
    ';
}