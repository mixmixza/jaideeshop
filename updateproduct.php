<?php
    session_start();
    include("connect.php");

    $pid = $_POST['hdnProductId'];
    $name = $_POST['txtName'];
    $description = $_POST['txtDescription'];
    $price = $_POST['txtPrice'];
    $unintInStock = $_POST['txtStock'];

    //update picture
    $picture=$_POST['hdnProductPic'];
    if($_FILES["filepic"]["name"]!=""){
        //ถ้าอัปโหลดไฟล์เข้ามา ให้เก็บชื่อไฟล์ไว้ Update ด้วย
        $picture=$_FILES["filepic"]["name"];

        //Move file
        move_uploaded_file($_FILES["filepic"]["tmp_name"],"img/product/".$_FILES["filepic"]["name"]);
    }
    
    
    $sql = "UPDATE product SET name='$name', description='$description', price=$price, unintInStock=$unintInStock,picture='$picture' WHERE id=$pid";

    //echo $sql;
    $result=$con->query($sql);
    if(!$result){
        echo "Error: ".$con->error;
    }
    else{
        header("Location: index.php");
    }
?>