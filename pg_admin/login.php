<?php 
  include('confs/url.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login | The Best Shop</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $url_file ?>/css/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $url_file ?>/pg_admin/css/login.css">
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
	<script src="<?php echo $url_file ?>/scripts/jquery.js"></script>
</head>
<body>
	<img src="<?php echo $url_file ?>/pg_admin/icons/login.jpg" id="login-background">

	<section>
		<img src="<?php echo $url_file ?>/icons/sea_logo.png" id="logo">
		<h1 id="login-name">login</h1>
		<?php if(isset($message)): ?>
			<div class="warning"><?php echo $message ?></div>
		<?php endif; ?>
		<form action="<?php echo $url ?>/pg_admin/login_check/check" method="post">
			<div class="login-form">
				<div class="login-uname">
					<i class="fas fa-user"></i>
					<input type="text" id="username" name="username" placeholder="Username" required="required">
					<span class="form-border"></span>
					<span class="form-border-uname form-border"></span>
				</div>

				<div class="login-pass">
					<i class="fas fa-lock"></i>
					<input type="password" id="password" name="password" placeholder="Password" required="required">
					<span class="wp-hide-show fas fa-eye-slash" style="font-size:20px"></span>
					<span class="form-border"></span>
					<span class="form-border-pass form-border"></span>
				</div>
				<input type="submit" id="button" value="Log In">
			</div>
		</form>
	</section>
		

	<script type="text/javascript">
		$(function(){
			$("#username").focus(function(){
				$(".form-border-uname").addClass("form-border-ani");
			});
			$("#username").focusout(function(){
				$(".form-border-uname").removeClass("form-border-ani");
			});
			$("#password").focus(function(){
				$(".form-border-pass").addClass("form-border-ani");
			});
			$("#password").focusout(function(){
				$(".form-border-pass").removeClass("form-border-ani");
			});
			
			$(".wp-hide-show").mousedown(function(){
				$("#password").attr("type", "text");
				$(this).removeClass('fa-eye-slash');
				$(this).addClass("fa-eye");
			});
			$(".wp-hide-show").mouseup(function(){
				$("#password").attr("type", "password").focus();
				$(this).removeClass('fa-eye');
				$(this).addClass("fa-eye-slash");
			});
		});
	</script>
</body>
</html>