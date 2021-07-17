<h2>Phần mền này chưa có giao diện , để thêm giao diện vui lòng tải bootstrap <a href="https://getbootstrap.com.vn/getting-started/">tại đây</a></h2>
<p>Tải bootstrap và giải nén vào forder bootstrap . Sau đó xoá 2 dòng thông báo này ở file index.php</p>
<?php 
require_once 'core/init.php';
require_once 'includes/header.php';
if($user) {
	if(isset($_GET['ac'])) {
		$ac = addslashes(trim(htmlentities($_GET['ac'])));
		if ($ac == 'create_note') {
			require_once 'templates/create-note-form.php';
		} else if($ac == 'edit_note') {
			if (isset($_GET['id'])) {
				$get_id = addslashes(trim(htmlentities($_GET['id'])));	
				if ($get_id != '') {
					$sql_check_id_exist = "SELECT id_note, user_id FROM notes WHERE user_id = '$data_user[id_user]' AND id_note = '$get_id'";

					if ($db->num_rows($sql_check_id_exist)) {
						require_once 'templates/edit-note-form.php';
					} else {
						echo '
						<div class="container">
						<div class="alert alert-danger">
						Note này không tồn tại hoặc không thuộc quyền sở hữu của bạn.
						</div>
						</div>
						';
					}
				} else {
					header('Location: index.php');
				}
			} else {
				header('Location: index.php');
			}
		}  else if ($ac == 'change_password') {
			require_once 'templates/change-pass-form.php';
		}
	} else {
		require_once 'templates/list-note.php';
	}
} else {
	require_once 'templates/signin-up-form.php';
}
require_once 'includes/footer.php';