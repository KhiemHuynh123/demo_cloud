<?php
    include_once 'header.php';
    include_once 'connect.php';
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    if(isset($_POST['register'])){
        $gender = $_POST['grpGender'];
        $usrname = $_POST['username'];
        $pass = $_POST['pass'];
        $email = $_POST['txtEmail'];
        $phone = $_POST['phone'];
        $dateBirthday = date('Y-m-d',strtotime($_POST['txtBirth']));
        $c = new Connect();
        // $db = $c->connectToMySQL();
        // $sql = 'INSERT INTO `user`( `email`, `username`, `gender`, `address`, `password`, `role`, `phone`, `birthday`)
        //  VALUES ("$email","$usrname",$gender,"Cantho","$pass","user","$phone","$dateBirthday")';
        // $stmt = $db->query($sql);
       try{ $dblink = $c->connectToPDO();
        $sql = "INSERT INTO `user`(`email`, `fullname`, `gender`, `address`, `password`, `role`, `phone`, `birthday`) VALUES(?,?,?,?,?,?,?,?)";    
        $re = $dblink->prepare($sql); 
        
        $stmt = $re->execute(array("$email","$usrname",$gender,"Cantho","$pass","user","$phone","$dateBirthday"));
        if ($stmt == TRUE){
            echo "Congrats!";
        } else {
            echo "Failed! ".$stmt;
        }
    }catch(Exception $e) {
        echo 'Exception ->';
        var_dump($e->getMessage());
    }
    }    
?>

<!-- toggler menu-->
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
        <a class="nav-link active" href="#">Home</a>
        <a class="nav-link" href="#">Cart</a>
        <div class="dropdown">
            <a href="#" class="nav-link
                dropdown-toggle" data-bs-toggler="dropdown">
                Manage
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Product</a>
                <a class="dropdown-item" href="#">Account</a>
                <a class="dropdown-item" href="#">Order</a>
            </div>
        </div>
    </div>
    <div class="navbar-nav ms-auto">
        <a href="" class="nav-item nav-link">Welcome, Khiem</a>
        <a href="" class="nav-item
                nav-link"> Logout</a>
    </div>
</div>

<body>
    <div class="container">
        <h2> Registration </h2>
        <form action="" id="form1" name="form1" method="POST" class="needs-validation">
            <div class="row pb-3">
                <label for="username" class="col-md-2 
                 col-form-label">
                    Username(*):
                </label>
                <div class="col-md-10">
                    <input type="text" name="username" id="username" required class="form-control" />
                </div>
            </div>
            <div class="row pb-3">
                <label for="password" class="col-md-2 col-form-label">
                    Password(*):
                </label>
                <div class="col-md-10">
                    <input type="password" name="pass" id="password" required class="form-control" />
                </div>
            </div>
            <div class="row pb-3">
                <label for="password" class="col-md-2 col-form-label">
                    confirm Password(*):
                </label>
                <div class="col-md-10">
                    <input type="password" name="pass2" id="password" required class="form-control" />
                </div>
            </div>
            <div class="row pb-3">
                <label for="phone" class="col-md-2 
                     col-form-label">
                    Phone(*):
                </label>
                <div class="col-md-10">
                    <input type="phones" name="phone" id="phone" required class="form-control" />
                </div>
            </div>
            <div class="row pb-3">
                <label for="email" class="col-md-2 
                 col-form-label">
                    Email(*):
                </label>
                <div class="col-md-10">
                    <input type="text" name="txtEmail" id="email" required class="form-control" />
                </div>
            </div>
            <div class="row pb-3">
                <label for="gender" class="col-md-2 
                         col-form-label">
                    Gender(*):
                </label>
                <div class="col-md-10 d-flex">
                    <div class="form-check pe-3">
                        <input type="radio" name="grpGender" value="0" id="maleRd" checked class="form-check-input" />
                        <label for="maleRd" class="form-check-label">Male</label>
                    </div>
                    <div class="form-check">
                        <div class="form-check my-auto">
                            <input type="radio" name="grpGender" value="1" id="femaleRd" class="form-check-input" />
                            <label for="femaleRd" class="form-check-laber">Female</label>
                        </div>
                    </div>
                </div>
                <div class="row pb-3">
                    <label for="country" class="col-md-2 
                                 col-form-label">
                        Country(*):
                    </label>
                    <div class="col-md-10 ms-auto">
                        <select id="country" class="form-select">
                            <option selected>
                                Choose your country
                            </option>
                            <option value="vn">Vietnam</option>
                            <option value="uk">UK</option>
                        </select>
                    </div>
                </div>
                <?php
                            //  $date = $_POST['txtBirth'];
                            //  echo $date;
                            //  $formatedDate = date('d-m-y',
                            //  strtotime($date));
                            //  echo $formatedDate;
                             ?>
                <div class="row pb-3">
                    <label for="birthday" class="col-md-2 col-form-label">
                        Birthday:
                    </label>
                    <div class="col-md-10 ms-auto">
                        <input type="date" name="txtBirth" id="birthday" required class="form-control" />
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-md-10 ms-auto">
                        <input type="submit" value="Register" class="btn btn-primary" name="register" id="register">
                    </div>
                </div>
        </form>
    </div>
    </div>

</body>
<?php
include_once 'footer.php';
        ?>