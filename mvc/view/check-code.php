<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/forgot-password.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
</head>
<body>
<div class="signup-form">
    <form action="/examples/actions/confirmation.php" method="post" class="form-horizontal">
		<div class="col-xs-8 col-xs-offset-4">
			<h2>Identity Authentication</h2>
        </div>
        <div class="form-group">
            <center>
                <img src="img/user.jpg" width="200px" class="rounded-circle text-center" id="img">	
            </center>
        </div>
        <div class="form-group">
            <h3 id="username">Username</h3>
            <input type="text" class="form-control input-lg" id="code" name="code" placeholder="######" required="required" spellcheck="false">
        </div>
		<div class="form-group">
			<div class="col-xs-8 col-xs-offset-4">
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-success btn-lg btn-block signup-btn">Confirm</button>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-success btn-lg btn-block signup-btn">There is no code</button>
                    </div>
                </div>
			</div>  
        </div>		      
    </form>
</div>
</body>
</html>