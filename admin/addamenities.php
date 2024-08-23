<?php
session_start();
include 'dbconn2.php';
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $amen = $_POST['amen'];
        $hid = $_SESSION['hotelid'];
        $sql1 = "INSERT INTO `amenities` (`h_id`, `services`) VALUES ('$hid', '$amen')";
        $result1 = mysqli_query($dbconnect2, $sql1);
    }
    error_reporting(E_ERROR | E_PARSE);
    if($_POST['finalsubmit']==1)
    {
        header("location: addhotel.php");
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
        <title>Add Amenities </title>
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
    <h3>Add Amenities For Hotel <?php echo "".$_SESSION['hotelname']?></h3>
    <form action="addamenities.php" method = "post">
    <div class="form-row">
    <div class="form-group col-md-4">
      <label for="hname">Amenities</label>
      <input type="text" class="form-control" name="amen" id="amen" placeholder="Enter Services">
      <br />
      <button type="submit" class="btn btn-primary">Add one more</button>
      <br />
      <br />
      <button type="submit" class="btn btn-primary" name="finalsubmit" value="1">Submit</button>
    </div>
</form>
        </diV>
    <script type="text/javascript" src="https://d1tgh8fmlzexmh.cloudfront.net/ccbp-static-website/js/ccbp-ui-kit.js"></script>
</body>
</html>