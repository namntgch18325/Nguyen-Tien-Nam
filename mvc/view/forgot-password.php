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
			<h2>Find your account</h2>
        </div>
        <div class="form-group">
			<div class="col-xs-8">
                <input type="text" class="form-control" name="fullname" required="required" placeholder="Enter Email or Username" spellcheck="false">
            </div>        	
        </div>
		<div class="form-group">
			<div class="col-xs-8 col-xs-offset-4">
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-success btn-lg btn-block signup-btn">Next</button>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-success btn-lg btn-block signup-btn">Cancel</button>
                    </div>
                </div>
			</div>  
        </div>		      
    </form>
</div>
</body>
</html>