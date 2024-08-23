<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: login.php");
        exit;
    }
    include 'essent/dbconn.php';
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['hotel']!= null && $_POST['date']!= null && $_POST['nod']!= null) {
        $cid = $_SESSION['userid'];
        $hotelid = $_POST['hotel'];
        $_SESSION ['hotelid'] = $hotelid;
        $date = $_POST['date'];
        $_SESSION['date'] = $date;
        $no_of_days = $_POST['nod'];
        $_SESSION['nod'] = $no_of_days;
        echo "".$_SESSION ['hotelid'];
        header("location: selectroom.php");
    }
    error_reporting(E_ERROR | E_PARSE);
    if($_POST['hotel'] == null || $_POST['date'] == null || $_POST['nod'] == null)
    {
        echo 'Select all the options. <br />';
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
    <div class="User-bg">
            <div>
                <h1 class="User-heading"> Welcome, <?php echo $_SESSION['username']?></h1>
                <button class="User-arrow" onclick="window.location.href= 'logout.php';">Logout</button>
            </div>
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner home-carousel">
                    <div class="carousel-item active">
                        <img src="https://images.unsplash.com/photo-1673004782090-8c67f7395447?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1031&q=80"
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1673232120601-a898f2a19d39?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=872&q=80"
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://img.freepik.com/free-photo/restaurant-interior_1127-3392.jpg?w=740&t=st=1673694412~exp=1673695012~hmac=ec833cd29dd52e06784dff1eb17a3bd5be2b91bc2c5c0046e420cf6db2daf31f"
                            class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
            <?php
            $query = "SELECT * FROM hotel ORDER BY h_name ASC"; 
            $result = $dbconnect->query($query);
            ?>
            <form action="selecthotel.php" method="post">
            <div class="d-flex flex-row justify-content-center">
                <div class="User-dropdown">
                    <select name= "hotel" id="hotel">
                        <option value="">Select Hotel</option>
                        <?php 
                        if($result->num_rows > 0){ 
                            while($row = $result->fetch_assoc()){  
                                echo '<option value="'.$row['h_id'].'">'.$row['h_name'].'</option>'; 
                            } 
                        }
                        ?>
                    </select>
                </div>
                <div class="User-dropdown">
                    <input type="date" name="date" id="date">
                </div>
                <div class="User-dropdown">
                    <select name="nod" id="nod">
                        <option value=""> No-of-days </option>
                        <option value="1"> 1 </option>
                        <option value="2"> 2 </option>
                        <option value="3"> 3 </option>
                        <option value="4"> 4 </option>
                        <option value="5"> 5 </option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success register-button User-dropdown">Proceed</button>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://d1tgh8fmlzexmh.cloudfront.net/ccbp-static-website/js/ccbp-ui-kit.js"></script>
</body>

</html>