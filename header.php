<!DOCTYPE html>
<?php
    SESSION_start();
    Ob_start();
  ?>
<html>

<head>
    <title>K-Store</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width:device-width,initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<!-- thanh dieu huong va kich thuoc bang
navbar-dark bg-dark the dieu huong mau den
navbar-toggler -->
<nav class="navbar navbar-expand-md navbar-dark"
    style="background-color: #FFCCCC; display:flex; background-image: url('./images/113.png');">
    <div class="container-fluid">
        <a href="http://localhost:8080/simpleweb/homepage2.php" class="navbar-brand">
            <img class="background-image" src="../simpleweb/images/My_LOGO.png" alt="" width="150px" height="140px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>

        <style>
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        </style>

        <div class="collapse navbar-collapse" id="navbarMain">
            <div class="navbar-nav ">
                <a class="nav-link active" style="font-size: 30px; color:White; " href="Homepage2.php">Home</a>
                
                <a class="nav-link" style="font-size: 30px; color:White;" href="cart.php">Cart</a>
                <div class="dropdown" >
                    
                    <a href="#" class="nav-link dropdown-toggle" style="font-size: 30px; color:White;" data-bs-toggle="dropdown">
                        Manage
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="Homepage2.php">Product</a>
                        <a class="dropdown-item" href="category_management.php">Product management</a>

                    </div>
                </div>

                <div class="dropdown">
                    <a href="#" class="nav-link dropdown-toggle" style="font-size: 30px; color:White; "
                        dta-bs-toggle="dropdown">
                        Category
                    </a>
                    <div class="dropdown-menu">
                        <?php
                            include_once 'connect.php';
                            $c = new connect();
                            $dblink = $c->connectToMySQl();
                            $sql = "SELECT * FROM category ";
                            $re = $dblink->query($sql);
                            while($row = $re->fetch_row()):
                                
                            ?>
                        <a class="dropdown-item" href="?cat-id=<?=$row[0]?>"><?=$row[1]?></a>

                        <?php
                            endwhile;
                            ?>
                    </div>
                </div>
            </div>
            <div class="navbar-nav ms-auto">
                <?php
                    if(isset($_COOKIE['cc_username'])):
                ?>



                <a href="" class="nav-item nav-link" style="font-size: 20px; color:#FF6666; ">Welcome-
                    <?=$_COOKIE['cc_username']?></a>
                <a href="login.php" class="nav-item nav-link" style="font-size: 20px; color:red; ">Logout</a>


                <?php
                    else:
                ?>
                <a href="login.php" class="nav-item nav-link" style="color:red; font-size: 25px;">Login</a>
                <a href="register.php" class="nav-item nav-link" style="font-size: 25px; color:red;"> Register</a>
                <?php
                    endif;
                ?>
            </div>
        </div>
    </div>
</nav>