<?php
session_start();


$er1 = $er2 = '';
if(isset($_POST['name']) && isset($_POST['pass'])){
	$name = $_POST['name'];
	$pass = $_POST['pass'];
	$nm = $ps = false;

	if($name == "admin"){
		$nm = true;
	}else{
		$er1 = "Wrong Username";
	}

	if($pass == "admin"){
		$ps = true;
	}else{
		$er2 = "Wrong Password";
	}

	if($nm && $ps){
		$_SESSION['name'] = 'admin';
		$_SESSION['pass'] = 'pass';
		header("location: index.php");

	}

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dustbin Analyser Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<body>

 <div class="container">

 	<div class="row">
 		<div class="col-sm-6 col-sm-offset-4" style="padding-top:5%;">
 		<h1>DUSTBIN ANALYSER</h1>
 		</div>
	    <div class="col-sm-3 col-sm-offset-4" style="margin-top: 5%;">
	      <form class="form-signin" method="post">
		        <h2 class="form-signin-heading">Login</h2>
		        <label for="inputEmail" class="sr-only">Email address</label>
		        	<input type="text" id="input" class="form-control" placeholder="Username" required autofocus autocomplete="off" name="name">
					<?php
						if($er1 != ''){
							echo '<div class="alert alert-danger">'.$er1.'</div>';
						}
					?><br>
		        <label for="inputPassword" class="sr-only">Password</label>
		        	<input type="password" autocomplete="off" id="inputPassword" class="form-control" placeholder="Password" required name="pass">
					<?php
						if($er2 != ''){
							echo '<div class="alert alert-danger">'.$er2.'</div>';
						}
					?><br><br>
		        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		  </form>
		</div>
	</div>
 </div> <!-- /container -->


</body>
</html>