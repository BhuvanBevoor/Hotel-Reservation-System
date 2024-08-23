<?php
        include "dbconn2.php";
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['hotel']!= null ) {
        error_reporting(E_ERROR | E_PARSE);
        $hot = $_POST['hotel'];
        $sql3 = "delete from hotel where h_id = '$hot'";
        $result3 = $dbconnect2->query($sql3);
    }
    error_reporting(E_ERROR | E_PARSE);
    if($result3)
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
        <title>Delete Hotel</title>
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
        <?php
            $query = "SELECT * FROM hotel ORDER BY h_name ASC"; 
            $result = $dbconnect2->query($query);
        ?>
            <form action="deletehotel.php" method="post">
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
                <button type="submit" class="btn btn-danger register-button User-dropdown">Proceed</button>
                </div>
            </div>
                    </form>
            <button class = "btn btn-danger admin-button" onclick="window.location.href= '../admin.php'">Back</button>
                    </div>
    <script type="text/javascript" src="https://d1tgh8fmlzexmh.cloudfront.net/ccbp-static-website/js/ccbp-ui-kit.js"></script>
</body>
</html>