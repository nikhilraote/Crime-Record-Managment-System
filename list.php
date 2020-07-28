<?php
    $conn=mysqli_connect("localhost","root","","crms");
    if($conn)
    	echo("yes");

    $sql = "SELECT id FROM temp ORDER BY id DESC"; 
    $result = mysqli_query($conn, $sql);
    	if(isset($_GET['image_id'])) {
        $sql = "SELECT imgtype,imgdata FROM temp WHERE id=" . $_GET['image_id'];
		$result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
		$row = mysqli_fetch_array($result);
		header("Content-type: " . $row["imgtype"]);
        echo $row["imgdata"];
	}
?>
<HTML>
<HEAD>
<TITLE>List BLOB Images</TITLE>
<!-- <link href="imageStyles.css" rel="stylesheet" type="text/css" /> -->
</HEAD>
<BODY>
<?php
	while($row = mysqli_fetch_array($result)) {
	?>
		<img src="list.php?image_id=<?php echo $row["id"]; ?>" /><br/>
		<?php	

	}
   
   
    if(isset($_GET['image_id'])) {
        $sql = "SELECT imgtype,imgdata FROM temp WHERE id=" . $_GET['image_id'];
		$result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
		$row = mysqli_fetch_array($result);
		header("Content-type: " . $row["imgtype"]);
        echo $row["imgdata"];
	}
	mysqli_close($conn);

?>
</BODY>
</HTML>