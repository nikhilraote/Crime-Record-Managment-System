<!DOCTYPE html>
<html>
<head>

	<title>criminal record</title>
	<p id="pid">Search criminal by FIR number</p>
</head>
<body>
<?php
$RegisteredBy="";
$cont="";
$date="";
$time="";
$place="";
$report="";
$row="";
$img="";
$con=mysqli_connect("localhost","root","","crms");
if(isset($_POST['submit']))
{
	$fno=$_POST['text'];
	$query="select * from fir where F_no='$fno'";
	$res=mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($res);
	// echo $row['RegisteredBy'];
	$RegisteredBy=$row['RegisteredBy'];
	$cont=$row['Contact'];
	$date=$row['Date'];
	$time=$row['Time'];
	$place=$row['Place'];
	$report=$row['Report'];
	$img= "<dt><strong></strong></dt><dd>" . 
     	'<img src="data:image/jpeg;base64,'.
      		base64_encode($row['imgdata']).
      		'" width="290" height="290" ">' . "</dd>";

}

?>




<div class="container">
<div class="top">
	<form method="post" action="criminal.php">
	<input type="text" id="inp" name="text" >
	<button name="submit">Search</button>
	</form>
</div>
<div class="card">

<div class="image">
<?php echo $img ;?>
</div>

<div class="data">

<table width="100%" >
	<tr>
		<td class=one>Registered By</td>
		<td><?php echo $RegisteredBy; ?></td>
	</tr>
	
	<tr>
		<td class=one>Contact</td>
		<td><?php echo $cont; ?></td>
	</tr>

	<tr>
		<td class=one>Place</td>
		<td><?php echo $place; ?></td>
	</tr>

	<tr>
		<td class=one>Date</td>
		<td><?php echo $date; ?></td>

	</tr>


	<tr>
		<td>Time</td>
		<td><?php echo $time; ?></td>
	</tr>
	<h3>FIR</h3>	
<p><?php echo $report;?></p>
</table>

</div>
	
</div>
</div>

</body>
<style type="text/css">
	*{
		margin: 0;
		padding: 0;
	}
	.image{

		position: relative;
		margin-top: -50px;
		margin-left: 60px;		
	}
	 

	#pid{
		text-align: center;
		font-size: 25px;
		color:#ccc;
		font-weight: bold;
		background-color: #010133;
		height: 50px;
		padding-top: 15px;

	}
	table{
		margin-top: 60px;
	}
	td{
		border-bottom: 3px solid black

	}
	td{
		height: 40px;
		text-align: center;
		font-weight: bold;
		font-size: 20px;
	}

	.container{
		position: relative;
	}
	.top{
		float: right;
		margin-top: 10px;
		margin-right: 15px;
		position: absolute;
		top:10%;
		left: 75%;
	}
	.top input{
		width: 200px;
		height: 35px;
		border-radius: 15px;

	}
	
	#inp:focus{
		border: 2px solid #0852c9;  		
	}
	.top button{
		width:70px;
		height: 35px;
		border-radius: 15px;
		border:none;
		background-color: #aaa;
		font-weight: bold;

	}
	.top button:hover{
		color: white;
		background-color:#0852c9; 
	}
	.card
	{
		width: 400px;
		height:540px;
		/*background-color: blue;*/
		position: absolute;
		top:140%;
		left: 35%;
		margin-top: 100px;
		/*border:2px solid blue;*/
		box-shadow: 10px 10px 10px 10px rgba(3, 127, 252,0.7);	
	}


</style>
</html>
