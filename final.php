<?php
include 'essent/dbconn.php';
session_start();
$cname = $_SESSION['username'];
$cid = $_SESSION['userid'];
$hid = $_SESSION['hotelid'];
$rid = $_SESSION['roomid'];
$date = $_SESSION['date'];
$nod = $_SESSION['nod'];
$sql = "select * from reservation where r_id = '$rid' and c_id = '$cid' and check_in = '$date' and no_of_days = '$nod'";
$result = mysqli_query($dbconnect, $sql);
$row = $result->fetch_assoc();
$sql1 = "select * from customers where c_id = '$cid'";
$result1 = mysqli_query($dbconnect, $sql1);
$row1 = $result1->fetch_assoc();
$sql2 = "select * from hotel where h_id = '$hid'";
$result2 = mysqli_query($dbconnect, $sql2);
$row2 = $result2->fetch_assoc();
$sql3 = "select * from room where r_id = '$rid'";
$result3 = mysqli_query($dbconnect, $sql3);
$row3 = $result3->fetch_assoc();
$sql4 = "select services from amenities where h_id = '$hid'";
$result4 = mysqli_query($dbconnect, $sql4);
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
        <div class="Final-bg">
            <h1 class="Final-heading"> Room Confirmed </h1>
            <button onclick="window.location.href= 'logout.php'" class="User-arrow"> Logout </button>
            <div class="Final-container">
            <?php
            echo '
                <h1 class="Final-heading2"> Booking Details </h1>
                <div class="d-flex flex-row">
                <div class="dbms">
                              <p class="Final-brief"><br />Booking Id : '.$row['res_id'].' </p>
                              <p class="Final-brief"> Name : '.$row1['c_name'].'</p>
                              <p class="Final-brief"> Phone Number : '.$row1['ph_no'].'</p>
                              <p class="Final-brief"> Hotel : '.$row2['h_name'].' </p>
                              <p class="Final-brief"> Hotel Phone Number: '.$row2['ph_no'].' </p>
                              <p class="Final-brief"> Hotel Type : '.$row2['hotel_type'].' Star </p>
                              <p class="Final-brief"> Hotel Address : '.$row2['address'].'</p>
                              <p class="Final-brief"> Room ID : '.$row3['r_id'].'</p>
                              <p class="Final-brief"> Room Type : '.$row3['room_type'].'</p>
                              <p class="Final-brief"> Check-in Date : '.$row['check_in'].'</p>
                              <p class="Final-brief"> No of Days : '.$row['no_of_days'].'</p>
                              <p class="Final-brief"> Room Price : ₹'.$row3['room_price'].'/- per night</p>
                              <p class="Final-brief"> Total Amount : ₹'.($row3['room_price']*$row['no_of_days']).'/-</p>
                              </div>
                            <div class="amenities">
                              <h3 class "Final-heading"> Amenities </h3>
                              <ul class="amenitieslist">';
                              if($result4->num_rows > 0){ 
                                  while($row4 = $result4->fetch_assoc()){  
                                  echo '<li>'.$row4['services'].'</li>';
                                  } 
                              } 
                              echo '</ul>
                              </div>
                              </div>
                              ';
                ?>
                <div>
                    <button type="button" class="btn btn-success Final-button" onclick="window.location.href= 'selecthotel.php'"> Done </button>
                </div>
            </div>
            <p class="Final-breif2"> Thank you for booking... Please visit Again </p>
        </div>
    <script type="text/javascript" src="https://d1tgh8fmlzexmh.cloudfront.net/ccbp-static-website/js/ccbp-ui-kit.js"></script>
</body>
</html>