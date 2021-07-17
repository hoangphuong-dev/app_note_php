<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>iNote</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="shortcut icon" href="iconapp.ico">
	<link href="bootstrap/iconapp.ico" rel="icon" type="image/ico"/>
</head>
<body>
	<?php if($user) { ?>
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-edit"></span> iNote</a>
				</div> 
				<div class="collapse navbar-collapse" id="nav-header">
					<ul class="nav navbar-nav navbar-right"> 
						<li>
							<a href="index.php?ac=create_note">
								<span class="glyphicon glyphicon-plus"></span> Note mới
							</a>
						</li>
						<li>
							<a href="index.php?ac=change_password">
								<span class="glyphicon glyphicon-lock"></span> Đổi mật khẩu
							</a>
						</li>
						<li>
							<a href="signout.php">
								<span class="glyphicon glyphicon-off"></span> Thoát
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	<?php } else { ?>
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">           
					<a class="navbar-brand" href="index.php">
						<span class="glyphicon glyphicon-edit"></span> iNote
					</a>
				</div> 
			</div>
		</nav>
		<?php } ?>