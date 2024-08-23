<?php
    include "dbconn2.php";
    $sql = "Select * from reservation";
    $result = mysqli_query($dbconnect2, $sql);
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['roomd']!= null ) {
        $roomd = $_POST['roomd'];
        $sql123 = "delete from reservation where res_id = '$roomd'";
        $result123 = $dbconnect2->query($sql123);
    }
    error_reporting(E_ERROR | E_PARSE);
    if($result123)
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
        <title>Reservations</title>
        <style>
          body{
                    background-size: cover;
                    background-image : url("../images/image3.jpg");
                    padding: 20px;
                }
          .container{
            background: rgba(0, 0, 0, 0.7);
            height: 700px;
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
    <h2>Reservations :</h2><br />
    <ul>
    <?php
        if($result->num_rows > 0){ 
            while($row = $result->fetch_assoc()){  
                echo '<li><h3><u>Res id : '.$row['res_id'].'</u></h3></li>';
                $cid3 = $row['c_id'];
                $rid3 = $row['r_id'];
            ?>
            <h4>Customer Name :
            <?php
                $sql2 = "Select * from customers where c_id = '$cid3'";
                $result2 = mysqli_query($dbconnect2, $sql2);
                $row2 = $result2->fetch_assoc();
                echo ''.$row2['c_name'].'</h4>';
            ?>
            <h4>Hotel Name :
            <?php
            $sql4 = "Select * from room where r_id = '$rid3'";
            $result4 = mysqli_query($dbconnect2, $sql4);
            $row4 = $result4->fetch_assoc();
            $hid3 = $row4['h_id'];
            $sql5 = "Select * from hotel where h_id = '$hid3'";
            $result5 = mysqli_query($dbconnect2, $sql5);
            $row5 = $result5->fetch_assoc();
            echo ''.$row5['h_name'].'</h4>';
            ?>    
            <h4>Room Type :
            <?php
                $sql3 = "Select * from room where r_id = '$rid3'";
                $result3 = mysqli_query($dbconnect2, $sql3);
                $row3 = $result3->fetch_assoc();
                echo ''.$row3['room_type'].'</h4>';
                echo '<h4>Check-in : '.$row['check_in'].'</h4>';
                echo '<h4>Number of Days: '.$row['no_of_days'].'</h4><br />';
        } 
    }
    ?>
    <br />
    </ul>
    <?php
    $sql9 = "Select * from reservation";
    $result9 = mysqli_query($dbconnect2, $sql9);
    ?>
    <form action="deleteres.php" method="post">
            <div class="d-flex flex-row justify-content-center">
                <div class="User-dropdown">
                <label for="roomd"><h4>Select a Reservation id</h4></label>
                <select name= "roomd" id="roomd">
                        <option value="">Select</option>
                        <?php 
                        if($result9->num_rows > 0){ 
                            while($row9 = $result9->fetch_assoc()){  
                                echo '<option value="'.$row9['res_id'].'">'.$row9['res_id'].'</option>'; 
                            } 
                        }
                        ?>
                    </select>
                <button type="submit" class="btn btn-danger register-button User-dropdown">Delete</button>
                </div>
            </div>
                    </form>
    <button class = "btn btn-danger admin-button" onclick="window.location.href= '../admin.php'">Back</button>
                    </div>
    <script type="text/javascript" src="https://d1tgh8fmlzexmh.cloudfront.net/ccbp-static-website/js/ccbp-ui-kit.js"></script>
</body>
</html>