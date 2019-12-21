<?php
    session_start();
    include("connect.php");

    $pid = $_POST['hdnProductId'];
    $name = $_POST['txtName'];
    $description = $_POST['txtDescription'];
    $price = $_POST['txtPrice'];
    $unintInStock = $_POST['txtStock'];

    $sql = "UPDATE product SET name='$name', description='$description', price=$price, unintInStock=$unintInStock WHERE id=$pid";

    //echo $sql;
    $result=$con->query($sql);
    if(!$result){
        echo "Error: ".$con->error;
    }
    else{
        header("Location: index.php");
    }
?>