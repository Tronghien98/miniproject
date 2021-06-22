<?php
    include("session.php");

    $id = intval($_GET['id']);

    $sql = "DELETE FROM products WHERE id = '$id'";

    $result = mysqli_query($db, $sql);

    if(mysqli_num_rows($result) == 0){
		header("location: index.php");
	}

?>