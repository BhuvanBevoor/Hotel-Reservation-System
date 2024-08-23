<?php
    session_start();
    include "dbconn2.php";
    $selecthotel = $_SESSION['selecthotel5'];
    $sql = "Select * from hotel where h_id= '$selecthotel'";
    $result = mysqli_query($dbconnect2, $sql);
    $row = $result->fetch_assoc();
    $selectedhotel= "".$row['h_name'];
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['roomnumber']!= null && $_POST['type2']!= null && $_POST['roomprice']!= null) {
    $rid = $_POST['roomnumber'];
    $rprice = $_POST['roomprice'];
    $rtype = $_POST['type2'];
    $sql2 = "INSERT INTO `room` (`h_id`, `r_id`, `room_price`, `room_type`) VALUES ('$selecthotel', '$rid', '$rprice', '$rtype')";
    $result1 = mysqli_query($dbconnect2, $sql2);
    }
    error_reporting(E_ERROR | E_PARSE);
    if($result1)
    header("location: ../admin.php");
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
        <style>
          body{
                    background-size: cover;
                    height: 100vh;
                    background-image : url("../images/image3.jpg");
                    padding: 20px;
                }
          .container{
            background: rgba(0, 0, 0, 0.7);
            height: 300px;
            margin-left: 200px;
            margin-right: 200px;
            margin-top: 20px;
            border-radius: 12px;
            border-width: 2px;
            border-style: solid;
            border-color: rgba(19, 4, 4, 0.373);
            box-shadow: #1a551d60;
            text-align: start;
            padding: 12px;
            color: white;
            font-size: 18px;
            font-weight: bold;
            text-align: start;
            font-family: "Bree Serif";
          }
        </style>
</head>
<body>
    <div class="container">
    <form action="addroom.php" method="post">
            <div class="d-flex flex-row justify-content-center">
                <div class="User-dropdown">
                <label for="hotel2">Selected Hotel</label>
                    <select name= "hotel2" id="hotel2">
                        <option value=""><?php echo "$selectedhotel";?></option> 
                    </select>

            <div class="form-row">
            <div class="form-group col-md-3">
            <label for="roomnumber">Room ID</label>
            <input type="number" class="form-control" id="roomnumber" name="roomnumber" placeholder="Enter Number">
            </div>

            <div class="form-group col-md-3">
            <label for="type2">Room Type</label>
            <select id="type2" name="type2" class="form-control">
            <option selected>Select Type</option>
                <option value="Basic"> Basic </option>
                <option value="Executive"> Executive </option>
                <option value="Presidential"> Presidential </option>
            </select>
            </div>
            
            <div class="form-group col-md-1.4">
          <label>Room Price</label>
            <input type="number" class="form-control" name="roomprice" id="roomprice" placeholder="Enter Price">
            </div>
            </div>
                <button type="submit" class="btn btn-success register-button User-dropdown">Add</button>
            </div>
            </div>
               </form>
               <button type="submit" class="btn btn-danger register-button User-dropdown d-flex flex-row justify-content-end" onclick="window.location.href= '../admin.php'">Back</button>
        </div>
    <script type="text/javascript" src="https://d1tgh8fmlzexmh.cloudfront.net/ccbp-static-website/js/ccbp-ui-kit.js"></script>
</body>
</html>