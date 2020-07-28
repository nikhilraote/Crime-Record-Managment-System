<?php
session_start();
  ?>

<?php

$conn=mysqli_connect("localhost","root","","crms");
date_default_timezone_set('Asia/Kolkata'); 
$date = date('Y/m/d');
$time=date('H:i:s');


if(isset($_POST['submit']))
{
	$e_id=$_SESSION["user"];
	$report=$_POST['Text1'];
	$Registerer=$_POST['reg'];
	$cont=$_POST['con'];
	$poi=$_POST['inc'];
	// echo $e_id.$report.$Registerer.$cont.$poi;

if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
        // require_once "db.php";
        $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
        $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);
        
        $sql = "INSERT INTO fir(E_id,Report,RegisteredBy,Contact,Date,Time,place,imgtype ,imgdata)
	VALUES('$e_id','$report','$Registerer','$cont','$date','$time','$poi','{$imageProperties['mime']}', '{$imgData}')";
        $current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
        if (isset($current_id)) {
            header("Location:fir.php");
        }
    }
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>FIR</title>
</head>
<body>
<div class="firbody">
	<h1>REGISTER FIR</h1>
	<table width="450px;">
<form name="frmImage" enctype="multipart/form-data" action=""
        method="post" class="frmImageUpload">


		<tr>
		<td><label id="same" for="reg">Registerer</label></td>
		<td> <input type="text" id="reg" name="reg"> </td>
		</tr>
		<tr>
		<td><label id="same" for="con">Contact Number</label></td>
		<td> <input type="number" id="reg" name="con"> </td>
		</tr>


		<tr>
		<td><label id="same" for="place">Place of Incident</label></td>
		<td> <input type="text" id="reg" name="inc"> </td>
		</tr>

	</table>

	<div class="photo">
		
		<label>Upload Image File:</label>
        <br/> 
        <input name="userImage"type="file" id="ph" class="inputFile" /> 

</div>
<br>
<label id="lab" for="txtarea">Report</label>

<div class="last">
		<textarea id="txt" name="Text1" cols="80" rows="10"></textarea>
</div>
<input type="submit" id="sub" value="Submit" name="submit" class="btnSubmit"  />
</form>
</div>

</body>

<style type="text/css">
body{
	background-color: rgba(0,0,0,0.6);

}
table{
	text-align: center;
	margin-left: 100px;
	margin-top: 0;
}
#txt:focus{
		border: 2px solid #0852c9;  		
	}
.last textarea{
	margin-left: 53px;
	
}
#lab{
	font-size: 25px;
	margin-left: 60px;
	color: #010133;
	font-weight: bold; 
}
#sub{
	width:150px;
	height: 38px;
	color: white;
	border-color: #010133;
	background-color:#010133;
	border-radius: 15px;
	margin-left: 260px;
	margin-top: 10px; 
}
#ph{
	width: 300px;
	height: 35px;

}
.photo{
	margin-left: 190px;
	margin-top: 20px;
}
.content{
	position: absolute;
	top: 15%;
	left: 20%;
}
#same{
	display:inline-block;
	color: #010133;
	font-size: 22px;
	font-weight: bold;
	margin-top: 30px;
}
#reg{
	width: 250px;
	height: 30px;
	border-radius: 15px;
	margin-top: 30px;
}
#reg:focus{
		border: 2px solid #0852c9;  		
	}
{

}
.firbody{
	width:700px;
	height:660px;
	/*border:2px solid #0852c9;*/
	position: absolute;
	top: 1%;
	left: 27%;
	background-color: #fff;
	box-shadow: 20px 20px #000;
}
.firbody h1{
	margin-left: 38%;
	color:#010133;
}


</style>
</html>