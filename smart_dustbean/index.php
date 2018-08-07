<?php
session_start();

if(isset($_SESSION['name']) && isset($_SESSION['pass'])){
	if($_SESSION['name'] != 'admin' && $_SESSION['pass'] != 'admin'){
		header("location: login.php ");
	}
}else{
	header("location: login.php ");
}

require_once('conn.php');

$err = $msg = '';
if(isset($_POST['sub'])){
	$name = $_POST['field'];
	$bin_id = 'bin_'.mt_rand(1,999);

	$query = $pdo->prepare("INSERT INTO `bins`(name, dust_id) VALUES (:name, :did)");
	$result = $query->execute(array("name"=>$name, "did"=>$bin_id));
	if ($result) {$msg = "DONE";}else{$err = "Error Found";}

}


if(isset($_POST['out'])){
	session_destroy();
	header("location: login.php ");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dustbin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<style>
		body{font-size:19px}
		#co { position: relative; height: 100%; width: 100%;}
		#del{position: absolute; bottom: 0; float: left; color:red; text-decoration: none;}
		#copy {
			position: absolute;
			bottom: 0;
			border-top: 1px solid #8e8d8d;
			width:60%;
			opacity:0.7;
			z-index:-1;
			margin: 0 0 47px 20%;
		}
	</style>
<body>


<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Dustbin Analyser</a>
    </div>
    <ul class="nav navbar-nav pull-right" >
      <li>
      	<form method="post">
	      	<button class="btn btn-warning btn-lg" type="submit" name="out">&#10149; Logout</button>
	    </form>
      </li>
    </ul>
  </div>
</nav>


<div class="container text-center">
	<div class="row">
	    <div class="col-sm-5">
			<form method="post">
				<h3 class="text-left">Add Dustbins</h3>
				<div class="input-group">
				   <input type="text" class="form-control" placeholder="Enter New Dustbin Name" name="field">
				   <span class="input-group-btn">
				        <button class="btn btn-default" type="submit" name="sub">Add</button>
				   </span>
				</div>

			</form>

			<?php
				if($msg != ''){
					echo '<div class="alert alert-success">'.$msg.'</div>';
				}

				if($err != ''){
					echo '<div class="alert alert-danger">'.$err.'</div>';
				}
			?>
		</div>
	</div>

<br><hr>

  <div class="row" id="data"></div>

</div>


<br><br><hr>
<footer class="container-fluid text-center">
  <p>&copy; Dustbin Analyser</p>
</footer>


<script type="text/javascript">
	
function loadlink(){
	$.ajax({
		type:'post',
		url:'data.php',
		success:function(html){$('#data').html(html);}
     });
}

loadlink(); // This will run on page load

setInterval(function(){
    loadlink() // this will run after every 5 seconds
}, 2000);


</script>


</body>
</html>

            
