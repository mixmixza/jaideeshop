<?php
    session_start();
    if(isset($_GET['cat'])){
        $category = $_GET['cat'];
    }
    else{
        header("Location: index.php");
    }
    include("connect.php");
    $sql = "SELECT * FROM product WHERE category=$category";
    $result = $con->query($sql);
    if(!$result){
        echo "Error: " . $con->error;
    }
    else{
        if($result->num_rows>0){
            $prd = $result->fetch_object();
        }
        else{
            $prd = NULL;
        }
    }
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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Product <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="showproduct.php?cat=1">Notebook</a></li>
                        <li><a href="showproduct.php?cat=2">Keyboard</a></li>
                        <li><a href="showproduct.php?cat=3">Mypc</a></li>
                    </ul>
                    </li>
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
        <div class="jumbotron">
            <h1>Jaidee Shop5555</h1>
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Id animi maxime beatae iusto deleniti corrupti ducimus temporibus dicta quibusdam quidem! Dolores accusamus doloremque perspiciatis corrupti aperiam ipsum dignissimos eius adipisci?</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
        <?php
            $sql = "SELECT * FROM product WHERE category=$category";
            $result = $con->query($sql);
                while($prd=$result->fetch_object()){
                    //$prd->id; //$prd["id"];
        ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="thumbnail">
                    <a href="productdetail.php?pid=<?php echo $prd->id; ?>">
                        <img src="img/product/<?php echo $prd->picture; ?>" alt="">
                    </a>
                        <div class="caption">
                            <h3><?php echo $prd->name; ?></h3>
                                <p><?php echo $prd->description; ?></p>
                                <p>
                                    <strong>Price: <?php echo $prd->price ?></strong>
                                </p>
                                <p>
                                    <a href="#" class="btn btn-success">Add to basket</a>
                                </p>
                        </div>
                    </div>
                </div>
            <?php
                
            }
            ?>
                
        </div>
    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>