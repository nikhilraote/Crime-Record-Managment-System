<?php
    $conn=mysqli_connect("localhost","root","","crms");

    if(isset($_GET['image_id'])) {
        $sql = "SELECT imgtype,imgdata FROM temp WHERE id=" . $_GET['image_id'];
		$result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
		$row = mysqli_fetch_array($result);
		header("Content-type: " . $row["imgtype"]);
        echo $row["imgdata"];
	}
	mysqli_close($conn);
?>