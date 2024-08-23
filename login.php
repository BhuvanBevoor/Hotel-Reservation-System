<?php
    include 'essent/dbconn.php';
    $login = false;
    $showError = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username == 'admin' && $password == 'admin') {
            header("location: admin.php");
        }
        $sql = "Select * from customers where c_name='$username' AND password='$password'";
        $result = mysqli_query($dbconnect, $sql);
        $num = mysqli_num_rows($result);
        $sql1 = "Select c_id from customers where c_name='$username' AND password='$password'";
        $result1 = mysqli_query($dbconnect, $sql1);
        $num1 = mysqli_num_rows($result1);
        if ($num == 1 && $num1 == 1){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            while($row = $result1->fetch_assoc()){
                $_SESSION['userid'] = $row ["c_id"];
            }
            header("location: selecthotel.php");
        }
        else{
            echo "Invalid Credentials!!";
        }
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
        <div class="login-bg">
            <h1 class="login-heading"> Login and start your booking and enjoy a memorable stay ...</h1>
            <form action="login.php" method="post">
            <div class="login-main">
                <h2 class="login-sub-heading"> Username </h2>
                <input type="text" name="username" class="d-flex login-container" id="username" aria-describedby="emailHelp">
                <h3 class="login-sub-heading"> Password </h3>
                <input type="password" name="password" class="d-flex login-container" id="password" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary login-button"> login </button>
            </form>
            <button class="btn btn-primary login-button" onclick="window.location.href= 'index.php';"> Back </button>
        </div>
    <script type="text/javascript" src="https://d1tgh8fmlzexmh.cloudfront.net/ccbp-static-website/js/ccbp-ui-kit.js"></script>
</body>

</html>