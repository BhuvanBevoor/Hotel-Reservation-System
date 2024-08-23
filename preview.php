<?php
include 'essent/dbconn.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <!--<link rel="stylesheet" href="hotel_reservation.css">-->
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
    <style>
    .User-arrow {
    position: absolute;
    top: 1rem;
    right: 1rem;
    font-size: 18px;
    color: rgb(220, 238, 238);
    height: 30px;
    width: 90px;
    font-family: "Bree Serif";
    text-align: center;
    background-color: #050602;
    border-radius: 12px;
    border-width: 0px;
    }
    .popup_flight_travlDil {
    margin: 70px auto;
    padding: 20px;
    background: none;
    border-radius: 5px;
    height: 130%;
    width: 30%;
    position: relative;
    transition: all 2s ease-in-out;
    }
    .popup_flight_travlDil .close_flight_travelDl {
    position: absolute;
    top: 20px;
    right: 30px;
    transition: all 200ms;
    font-size: 30px;
    font-weight: bold;
    text-decoration: none;
    color: #333;
    }   
    .popup_flight_travlDil .content_flightht_travel_dil {
    max-height: 30%;
    overflow: auto;
    }
    body{
    background-image: url('https://img.freepik.com/free-photo/abstract-blur-hotel-interior_1203-8514.jpg?w=1060&t=st=1675327462~exp=1675328062~hmac=46b52c601e2effb4221d61b1fe0dce791e86384ec7567f71521e42f68b809618');
    height: 100vh;
    background-size: cover;
    }
    </style>
</head>
<body>
        <div id="popup_flight_travlDil1" class="overlay_flight_traveldil">
            <a class="close_flight_travelDl" href="#">&times;</a>
            <div class="popup_flight_travlDil">
                <h2>Preview</h2>
                <?php
                $sql = "Select h_name from hotel where h_id= '$_SESSION[hotelid]'";
                $result = mysqli_query($dbconnect, $sql);
                $row = $result->fetch_assoc();
                $sql1 = "Select * from room where r_id= '$_SESSION[roomid]'";
                $result1 = mysqli_query($dbconnect, $sql1);
                $row1 = $result1->fetch_assoc();
                if($row && $row1){
                echo ' 
                    <div class="content_flightht_travel_dil">
                    <p> Hotel - '.$row["h_name"].'<br /> </p>
                    <p> Room -'.$row1["room_type"].'<br /> </p>
                ';}?>
                    <p> No of days - <?php echo "".$_SESSION['nod'];?> <br /> </p>
                    <p> Check-in - <?php echo "".$_SESSION['date'];?> <br /> </p>
                    <?php
                    if($row1) 
                    echo'
                    <p> Room Price - ₹ '.$row1["room_price"].'/- per night<br /> </p>
                    ';?>
                    <button type="button" class="btn btn-success Room-button" onclick="window.location.href= 'final.php'"> Confirm </button>
                    <a onclick="window.location.href= 'logout.php'" class="User-arrow"> &larr; </a>
                </div>
            </div>
        </div>
    <script type="text/javascript" src="https://d1tgh8fmlzexmh.cloudfront.net/ccbp-static-website/js/ccbp-ui-kit.js"></script>
</body>
</html>