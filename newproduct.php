<?php
    session_start();
    include("connect.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jaidee Shop</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" >
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Jaidee Shop</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
                <ul class="nav navbar-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Products</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <?php
                    if(isset($_SESSION['id'])){
                    ?>

                    <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="glyphicon glyphicon-user"></i>
                        Welcome <?php echo $_SESSION['name'] ?> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Shop</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-shopping-cart"></i> (0)
                        </a>
                    </li>
                    
                    <?php
                    }
                    else{
                    ?>

                    <li><a href="login.php">Login</a></li>
                    <li><a href="Register.php">Sign in</a></li>

                    <?php
                    }
                    ?>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <form action="saveproduct.php" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name" class="control-label col-md-3">Name:</label>
                    <div class="col-md-9">
                        <input type="text" name="txtName" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="control-label col-md-3">Description:</label>
                    <div class="col-md-9">
                        <input type="text" name="txtDescription" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="price" class="control-label col-md-3">Price:</label>
                    <div class="col-md-9">
                        <input type="text" name="txtPrice" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="stock" class="control-label col-md-3">Stock:</label>
                    <div class="col-md-9">
                        <input type="text" name="txtStock" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="picture" class="control-label col-md-3">Produce Picture:</label>
                    <div class="col-md-9">
                        <input type="file" name="filepic" class="form-control-file" accept="image/*" >  
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>