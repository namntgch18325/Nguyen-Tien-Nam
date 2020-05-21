<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login_1.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
    <div class="signin-form">
        <form action="/NhaTro/Login/LoginWithLocalAccount" method="POST">
            <h2>Đăng Nhập</h2>
            <p class="hint-text">Đăng nhập bằng Facebook /Email</p>
            <div class="social-btn text-center">
                <a href="<?=$data["Facebook_Login"]?>" class="btn btn-primary btn-lg" title="Facebook"><i class="fa fa-facebook"></i></a>
                <a href="<?=$data["URL_auth"]?>" class="btn btn-danger btn-lg" title="Google"><i class="fa fa-google"></i></a>
            </div>
            <div class="or-seperator"><b>Or</b></div>
            <p class="hint-text">Đăng nhập bằng tài khoản Find Home của bạn</p>
            <div class="form-group">
                <input type="text" class="form-control input-lg" id="username" name="username" placeholder="Tên Đăng Nhập" required="required" spellcheck="false">
            </div>
            <div class="form-group">
                <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Mật Khẩu" required="required">
            </div>
            <div class="form-group" id="checkbox">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="show()">
                <label class="form-check-label" for="exampleCheck1">Hiện Mật Khẩu</label>
            </div>
            <div class="form-group">
                <button name="Login" type="submit" class="btn btn-success btn-lg btn-block signup-btn">Đăng Nhập</button>
            </div>
            <div class="text-center small"><a href="forgot_password">Tôi đã quên mật khẩu - giúp tôi lấy lại.</a></div>
        </form>
        <div class="text-center small">Bạn chưa có tài khoản? <a href="register">Đăng Ký Ngay</a></div>
    </div>
</body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script>
        function show() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</html>
