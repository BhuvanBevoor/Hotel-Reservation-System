<?php
include 'essent/dbconn.php';
session_start();
$id = $_SESSION['hotelid'];
$sql = "Select * from room where h_id= '$id' order by room_price";
$result = mysqli_query($dbconnect, $sql);
if($_SERVER["REQUEST_METHOD"] == "POST") {
    error_reporting(E_ERROR | E_PARSE);
    if($_POST['roomid1']!= null)
    $roomid = $_POST['roomid1'];
    if($_POST['roomid2']!= null)
    $roomid = $_POST['roomid2'];
    if($_POST['roomid3']!= null)
    $roomid = $_POST['roomid3'];
    $_SESSION['roomid'] = $roomid;
    $date = $_SESSION['date'];
    $nod = $_SESSION['nod'];
    $cid = $_SESSION['userid'];
    $sql1 = "INSERT INTO `reservation` (`r_id`, `c_id`, `check_in`, `no_of_days`) VALUES ('$roomid', '$cid', '$date', '$nod')";
    $result1 = mysqli_query($dbconnect, $sql1);
    header("location: preview.php");
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
        <div class="Room-main-bg">
            <p class="User-heading"> Choose your comfortable room.......</p>
            <button onclick="window.location.href= 'logout.php'" class="User-arrow"> Logout </button>
            <form action="selectroom.php" method = "post">
            <?php   
            $row = $result->fetch_assoc();
            if($row){
            echo '
            <div class="d-flex flex-row Room-bg">
                <img src="https://images.unsplash.com/photo-1578683010236-d716f9a3f461?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" class="Room-img" />
                <div class="Room-sub-bg">
                    <h1 class="Room-head">'.$row['room_type'].'</h1>';
                    if($row['room_type'] == 'Basic')
                        echo '<p class="Room-brief"> Room-Capacity : (2-Persons) </p>';
                    elseif ($row['room_type'] == 'Executive')
                        echo '<p class="Room-brief"> Room-Capacity : (3-Persons) </p>';
                    elseif ($row['room_type'] == 'Presidential')
                        echo '<p class="Room-brief"> Room-Capacity : (5-Persons) </p>';
                        else
                        echo '<p class="Room-brief"> Room-Capacity : (4-Persons) </p>';
            echo'
                    <div class="d-flex flex-row Room-container">
                        <p class="Room-author"> RS '.$row['room_price'].'/- per night </p>
                        <input type="number" id="roomid1" name="roomid1" class="minimize" value="'.$row['r_id'].'">
                        <input type="submit" class ="button btn btn-success Room-button" value="Book">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            </div>
            ';}?>
            </form>
            <form action="selectroom.php" method = "post">
            <?php   
            $row = $result->fetch_assoc();
            if($row){
            echo '
            <div class="d-flex flex-row Room-bg">
                <img src="https://images.unsplash.com/photo-1578683010236-d716f9a3f461?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" class="Room-img" />
                <div class="Room-sub-bg">
                    <h1 class="Room-head">'.$row['room_type'].'</h1>';
                    if($row['room_type'] == 'Basic')
                        echo '<p class="Room-brief"> Room-Capacity : (2-Persons) </p>';
                    elseif ($row['room_type'] == 'Executive')
                        echo '<p class="Room-brief"> Room-Capacity : (3-Persons) </p>';
                    elseif ($row['room_type'] == 'Presidential')
                        echo '<p class="Room-brief"> Room-Capacity : (5-Persons) </p>';
                        else
                        echo '<p class="Room-brief"> Room-Capacity : (4-Persons) </p>';
                    echo'
                    <div class="d-flex flex-row Room-container">
                        <p class="Room-author"> RS '.$row['room_price'].'/- per night </p>
                        <input type="number" id="roomid2" name="roomid2" class="minimize" value="'.$row['r_id'].'">
                        <input type="submit" class ="button btn btn-success Room-button" value="Book">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            </div>
            ';}?>
            </form>
            <form action="selectroom.php" method = "post">
            <?php   
            $row = $result->fetch_assoc();
            if($row){
            echo '
            <div class="d-flex flex-row Room-bg">
                <img src="https://images.unsplash.com/photo-1578683010236-d716f9a3f461?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" class="Room-img" />
                <div class="Room-sub-bg">
                    <h1 class="Room-head">'.$row['room_type'].'</h1>';
                    if($row['room_type'] == 'Basic')
                        echo '<p class="Room-brief"> Room-Capacity : (2-Persons) </p>';
                    elseif ($row['room_type'] == 'Executive')
                        echo '<p class="Room-brief"> Room-Capacity : (3-Persons) </p>';
                    elseif ($row['room_type'] == 'Presidential')
                        echo '<p class="Room-brief"> Room-Capacity : (5-Persons) </p>';
                        else
                        echo '<p class="Room-brief"> Room-Capacity : (4-Persons) </p>';
                echo'
                    <div class="d-flex flex-row Room-container">
                        <p class="Room-author"> RS '.$row['room_price'].'/- per night </p>
                        <input type="number" id="roomid3" name="roomid3" class="minimize" value="'.$row['r_id'].'">
                        <input type="submit" class ="button btn btn-success Room-button" value="Book">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            </div>
            ';}?>
            </form>
            <?php   
            $row = $result->fetch_assoc();
            if($row){
            echo '
            <div class="d-flex flex-row Room-bg">
                <img src="https://images.unsplash.com/photo-1578683010236-d716f9a3f461?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" class="Room-img" />
                <div class="Room-sub-bg">
                    <h1 class="Room-head">'.$row['room_type'].'</h1>';
                    if($row['room_type'] == 'Basic')
                        echo '<p class="Room-brief"> Room-Capacity : (2-Persons) </p>';
                    elseif ($row['room_type'] == 'Executive')
                        echo '<p class="Room-brief"> Room-Capacity : (3-Persons) </p>';
                    elseif ($row['room_type'] == 'Presidential')
                        echo '<p class="Room-brief"> Room-Capacity : (5-Persons) </p>';
                        else
                        echo '<p class="Room-brief"> Room-Capacity : (4-Persons) </p>';
                echo'
                    <div class="d-flex flex-row Room-container">
                        <p class="Room-author"> RS '.$row['room_price'].'/- per night </p>
                        <input type="number" id="roomid4" name="roomid4" class="minimize" value="'.$row['r_id'].'">
                        <input type="submit" class ="button btn btn-success Room-button" value="Book">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            </div>
            ';}?>
            </form>
        </div>
    <script type="text/javascript" src="https://d1tgh8fmlzexmh.cloudfront.net/ccbp-static-website/js/ccbp-ui-kit.js"></script>
</body>

</html>