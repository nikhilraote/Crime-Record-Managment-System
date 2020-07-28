<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
 	<link rel="stylesheet" href="fontawesome-free-5.10.2-web/css/all.css">

	<title>Login</title>
</head>
<body>

<?php
$con=mysqli_connect("localhost","root","","crms");
if(isset($_POST['submit']))
{
	$un=$_POST['username'];
	$ps=$_POST['password'];
	$query="SELECT E_id from employee where E_name='$un' and password='$ps'";
	$res=mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($res);
	if ($row['E_id'])
	{
		$_SESSION["user"]=$row['E_id'];
		echo($_SESSION['user']);
		header("Location:Homepage.htm");
	}
	else
	{
		echo "something went wrong";
	}
}
?>





<div class="full">
	<div class="main2">
		<img src="Police1.jpg" width="100%" height="200px">
		<h1>CRIME REPORT MANAGEMENT SYSTEM</h1>
		<!-- <h2>MAHARASHTRA POLICE</h2> -->

	</div>
	<div class="main">
		<form action="login2.php" method="post">

		<div class="topicon">
		<i class="fa fa-user-circle fa-5x" aria-hidden="true"></i>
		</div>

		<div class="icon1">
		<input type="text" id="un" placeholder="User id" name="username"><i class="fa fa-user" aria-hidden="true"></i>
		</div>
		<div class="icon2">
		<input type="password" id="ps" placeholder="Password" name="password"><i class="fa fa-lock" aria-hidden="true"></i>
  
		</div>
		<button id="sub" name="submit">LOGIN</button>
		<a href="#">Forgot your credentials?</a>
		</form>
	</div>
</div>





</body>
<style type="text/css">
	html
	{
		height: 100%;
		width: 100%;
	}
	body{
		background-image:linear-gradient(rgba(255,255,255,0.7),rgba(255,255,255,0.7)), url(mum.jpg);
		background-size: cover;
		background-position: center;
		background-repeat: no-repeat;
	
	}

	.fa-user-circle{
		color: #0852c9;
	}
	.icon1{
		position: relative;

	}
	.icon2{
		position: relative;
	}
	.icon1 i{
		position: absolute;
		top: 78%;
		left: 11%;
		color: #444;
		
	}
	.icon2 i{
		position: absolute;
		top: 55%;
		left: 11%;
		color: #444;

	}
	#un:focus{
		border: 2px solid #0852c9;  		
	}

	.topicon
	{
		position: absolute;
		top: -4%;
		left: 37%;	
	}
	.full{
		width: 620px;
		height: 400px;
		/*border:1px solid black;*/
		border-radius: 15%;
		position: absolute;
		top:50%;
		left: 50%;
		transform: translate(-50%,-50%);
		background-color: white;
	}
	 img{
		border-top-left-radius: 30%;
	}
	.main2{
		position: absolute;
		top: 0;
		left: 0;
		background-color:#010133;
		height: 100%;
		width: 313px;
		border-top-left-radius: 15%;
		border-bottom-left-radius: 15%;
		text-align: center;
	}
	.main2 h1{
		font-size: 30px;
		position: absolute;
		top: 50%;
		left: 5%;
		color: white;

	}
	.main2 h2{
		position: absolute;
		top: 80%;
		left: 5%;
		color: white;	
	}
	.main
	{
		position: absolute;
		top: 50%;
		left: 75.4%;
		transform: translate(-50%,-50%);

		width: 310px;
		height: 100%;
		background-color:rgba(0,0,0,0.8);
		display: block;
		border-top-right-radius: 15%;
		border-bottom-right-radius:15%; 
	}
	.main a{
		float: right;
		margin-right: 13px;
		margin-top: 20px;
		text-decoration:none;
		font-size: 17px;
		color: #010133;
	}


	#un{ 
		
		height: 35px;
		width: 228px;
		margin-left: 24px;
		margin-top: 90px;
		border-radius: 15px;
		font-size: 15px;
		padding-left: 27px;
		font-family: "Comic Sans MS", cursive, sans-serif;
		font-weight: bold;
	}

	#un:focus{
		border: 2px solid #0852c9;  		
	}
	#un:focus +i{
		color: #0852c9;  		
	}

	#ps{ 
		border:none;
		height: 35px;
		width: 230px;
		margin-top: 20px;
		margin-left: 27px;
		border-radius: 15px;
		font-size: 15px;
		padding-left: 27px;
		font-family: "Comic Sans MS", cursive, sans-serif;
		font-weight: bold;

	}
	#ps:focus{
		border: 2px solid #0852c9;  		
	}


	#ps:focus +i{
		color: #0852c9;  		
	}
	#sub{
		border:none;
	margin-left: 39px;
	margin-top: 25px;
	width: 230px;
	height: 40px;
	border-radius: 18px;
	font-size: 15px;
	/*font-weight: bold;*/
	background-color: #010133;
	border-color: #0852c9;
	color: white;
	font-family: "Comic Sans MS", cursive, sans-serif;
font-weight: bold;

	}
	#sub:hover{
	color: #0852c9;
	background-color: #a7a7a8;
	font-weight: bold;
	}

</style>
</html>