<?php
    session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>

    <?php
        //รับข้อมูลจาก Form Register
        include("connect.php");
        if(isset($_POST['submit'])){ //check is it is posted back
            // รับข้อมูลจาก Form
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $password = md5($con->real_escape_string($_POST['password']));
            $email = $_POST['email'];

            //echo "$firstname $lastname $username $password $email";
            //insert to table
            $sqlInsert = "INSERT INTO customer (firstname, lastname, username, password,email,active) VALUE('$firstname','$lastname','$username','$password','$email','0')";
            //echo $sqlInsert;
            //$mysqli_query
            $result = $con->query($sqlInsert);
            if($result){
                //เมื่อ Register สำเร็จ
                echo "<script> alert('Register Complete'); </script>";
                header("location: login.php");
            }
            else{
                echo "Error during insert: " .$con->error;
            }
        } 
    ?>

    <div class="container">
        <div class="row">
            <form action="" method="post">
                <div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
                    <div class="panel panel-info">
                        <div class="panel-heading text-center">
                            สมัครสมาชิก
                        </div>
                        <div class="panel-body">

                        <div class="form-group row">
                                <label for="firstname" class="col-md-3">ชื่อสินค้า : </label>
                                <div class="col-md-9">
                                    <input type="text" name="firstname" class="form-control">
                                </div>
                            </div>
                
                            <div class="form-group row">
                                <label for="lastname" class="col-md-3">Description : </label>
                                <div class="col-md-9">
                                    <input type="text" name="lastname" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-3">Price : </label>
                                <div class="col-md-9">
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-md-3">Stock : </label>
                                <div class="col-md-9">
                                    <input type="text" name="username" class="form-control">
                                </div>
                            </div>
                        
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-success btn-block" name="submit">Register</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>