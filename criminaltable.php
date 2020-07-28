<?php
$conn=mysqli_connect("localhost","root","","crms");
$query="select * from criminal";
$res=mysqli_query($conn,$query);

if(isset($_POST['sub']))
{
	$id=$_POST['search'];
	$query="select * from criminal where C_no='$id'";
	$res=mysqli_query($conn,$query);
	// $row=mysqli_fetch_assoc($res);
}

?>



<!DOCTYPE html>
<html>
<head>
<title></title>
<div class="head">
	<form action="criminaltable.php" method="post">
<input type="text" name="search" placeholder="Enter C no " id="search">
<button name="sub" id="sub">submit</button>
</form>
</div>
</head>
<body>
<table >
<tr>
	<th>Photo</th>
	<th>FNO</th>
	<th>CNO</th>
	<th>Name</th>
	<th>Aadhar no</th>
	<th>IPC Section</th>
	
	
</tr>
<?php 
while ($row=mysqli_fetch_assoc($res)) {
		$img= "<dt><strong></strong></dt><dd>" . 
     	'<img src="data:image/jpeg;base64,'.
      		base64_encode($row['imgdata']).
      		'" width="150" height="150" ">' . "</dd>";
 
	?>

	<tr>
		<td><?php echo $img?></td>
		<td><?php echo $row['F_no']?></td>
		<td><?php echo $row['C_no']?></td>
		<td><?php echo $row['C_name']?></td>
		<td><?php echo $row['C_aadhar']?></td>
		<td><?php echo $row['C_ipsec']?></td>

		


	</tr>

<?php
}

 ?>


</table>
<style type="text/css">

.head{

	margin-left:40%;
	position: relative;
}

input{
	width: 250px;
	height: 35px;
	border-radius: 10px;
	font-size: 23px;
	padding-left: 10px;
	margin-top: 3px;
	position: absolute;
}
#search:focus{
	border: 2px solid #0852c9;

}

button{
	width: 100px;
	height: 35px;
	border-radius: 10px;
	border:none;
	background-color:#0852c9;
	color: white;
	font-weight: bold;
	position: absolute;
	margin-top:5px;
	left: 32%;

}


table{
	position: absolute;
	top: 20%;
	left: 10%;
	width: 80%;
	border-collapse: collapse;
}
	td
	{
		width: 40px;
		text-align: center;
	border-bottom:3px solid black;
	padding:6px;	
	font-size: 20px;
	color:#0852c9;
	font-weight: bold;
	}
	th{
		height: 20px;
		font-weight: bold;
		font-size: 25px;
	border-bottom:3px solid black;
	padding: 6px;
	}


</style>
</body>


</html>