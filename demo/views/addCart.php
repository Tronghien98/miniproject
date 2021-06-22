<?php
    include("session.php");

    $id = intval($_GET['id']);
    $sql = "SELECT * FROM products WHERE id = '$id'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
   
    if(!isset($_SESSION["cart"][$id])){
        $_SESSION["cart"][$id] = array(
            'id' => $row["id"],
            'name' => $row["name"],
            'price' => $row["price"],
            'qty' => 1
        );
    } else {
        $_SESSION["cart"][$id]["qty"] += 1;
    }
    setcookie('cart', serialize($_SESSION["cart"]), time()+3600);
    header("location: index.php");
?>