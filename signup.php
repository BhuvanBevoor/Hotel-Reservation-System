<?php
    include 'essent/dbconn.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        $password = $_POST['password'];
        $phno = $_POST['phno'];
        $address = $_POST['address'];
        $sql = "INSERT INTO `customers` (`c_name`, `address`, `ph_no`, `password`) VALUES ('$name', '$address', '$phno', '$password');";
        $result = mysqli_query($dbconnect, $sql);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/hotel_reservation.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</head>
<body>
    <div class="register-bg">
        <h1 class="register-heading"> Register and Stay classy, feel classy... </h1>
        <form action="signup.php" method="post">
        <div class="register-main">    
            <h2 class="register-sub-heading"> Name </h2>
            <input type="text" name="name" class="d-flex register-container" id="name" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <h3 class="register-sub-heading"> Phone Number </h3>
            <input type="number" name="phno" class="register-container" id="phno" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <h3 class="register-sub-heading"> Address </h3>
            <input type="text" name="address" class="register-container" id="address" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <h3 class="register-sub-heading"> Password </h3>
            <input type="password" name="password" class="register-container" id="password" aria-describedby="emailHelp">
        </div>
            <button type = "submit" class="btn btn-primary register-button" onclick="window.location.href= 'login.php';"> Submit </button>
        </form>
        <?php
            error_reporting(E_ERROR | E_PARSE);
            if($result)
            {
                header("Location:login.php");
            }
        ?>
        <button class="btn btn-primary register-button" onclick="window.location.href= 'index.php';"> Back </button>
    </div>
    <script type="text/javascript" src="https://d1tgh8fmlzexmh.cloudfront.net/ccbp-static-website/js/ccbp-ui-kit.js"></script>
</body>

</html>