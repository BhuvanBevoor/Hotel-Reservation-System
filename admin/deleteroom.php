<?php
    include "dbconn2.php";
    session_start();
    $selecthotel = $_SESSION['selecthotel9'];
    $sql = "Select * from hotel where h_id= '$selecthotel'";
    $result = mysqli_query($dbconnect2, $sql);
    $row = $result->fetch_assoc();
    $selectedhotel2= "".$row['h_name'];
    $selectroom= $_POST['room3'];
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['room3']!= null ) {
        $sql3 = "delete from room where r_id = '$selectroom'";
        $result3 = $dbconnect2->query($sql3);
        header("location: ../admin.php");
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
        <title>Delete Room</title>
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
            <form action="deleteroom.php" method="post">
            <div class="d-flex flex-row justify-content-center">
            <div class="User-dropdown">
            <label for="hotel2">Selected Hotel</label>
            <select name= "hotel2" id="hotel2">
                <option value=""><?php echo "$selectedhotel2";?></option> 
            </select>

            <?php
            $query = "SELECT * FROM room where h_id = '$selecthotel' order by room_type asc"; 
            $result2 = $dbconnect2->query($query);
            ?>
            <div class="d-flex flex-row justify-content-center">
                <div class="User-dropdown">
                    <select name= "room3" id="room3">
                        <option value="">Select Room</option>
                        <?php 
                        if($result2->num_rows > 0){ 
                            while($row = $result2->fetch_assoc()){  
                                echo '<option value="'.$row['r_id'].'">'.$row['room_type'].'</option>'; 
                            } 
                        }
                        ?>
                    </select>
                <button type="submit" class="btn btn-danger register-button User-dropdown">Proceed</button>
            </div>
            </div>
            </form>
            <button class = "btn btn-danger admin-button" onclick="window.location.href= '../admin.php'">Back</button> 
                    </div>  
    <script type="text/javascript" src="https://d1tgh8fmlzexmh.cloudfront.net/ccbp-static-website/js/ccbp-ui-kit.js"></script>
</body>
</html>