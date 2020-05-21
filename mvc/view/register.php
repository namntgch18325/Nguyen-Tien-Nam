<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/register.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
</head>
<body>
<div class="signup-form">
     <form action="/NhaTro/register/registed" method="post" class="form-horizontal">
		<h2>Đăng Ký</h2>
        <div class="form-group">
			<div class="col-xs-8">
                <input id="txtName" oninput="checkName()" type="text" class="form-control" name="fullname" required="required" placeholder="Tên hiển thị">
                <p id="nameWarning"></p>
            </div>        	
        </div>
        <div class="form-group">
			<div class="col-xs-8">
                <input oninput="checkEmail()" id="txtEmail"  type="email" class="form-control" name="email" required="required" placeholder="Địa chỉ email">
                <p id="emailWarning"></p>
            </div>        	
        </div>		
        <div class="form-group">
			<div class="col-xs-8">
                <input type="text" class="form-control" name="username" required="required" placeholder="Tên đăng nhập" spellcheck="false">
                <p id="accountWarning"></p>
            </div>        	
        </div>
		<div class="form-group">
			<div class="col-xs-8">
                <input oninput="PasswordCheck()" id = "pass" type="password" class="form-control" name="password" required="required" placeholder="Mật khẩu">
            </div>        	
        </div>
		<div class="form-group">
			<div class="col-xs-8">
                <input oninput="PasswordCheck()" id="confirm" type="password" class="form-control" name="confirm_password" required="required" placeholder="Xác nhận password">
                <p id="passWarning"></p>
            </div>        	
        </div>
		<div class="form-group">
			<div class="col-xs-8 col-xs-offset-4">
				<p><label class="checkbox-inline"><input type="checkbox" required="required"> Tôi đồng ý với <a href="#">điều khoản sự dụng</a> &amp; <a href="#">chính sách bảo mật</a>.</label></p>
				<button name  = "register" onclick="Check()" type="submit" class="btn btn-success btn-lg btn-block signup-btn">Đăng Ký</button>
			</div>  
		</div>		      
     </form>
	<div class="text-center">Bạn đã có 1 tài khoản? <a href="Login">Đăng nhập ngay</a></div>
</div>
</body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</html>
<?php require_once "./js/register_js.php" ?>
