<?php
    session_start();
    include 'dbconn2.php';
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['hname']!= null && $_POST['hid2']!= null && $_POST['address2']!= null && $_POST['phnum2']!= null && $_POST['type2']!= null) {
        $hname = $_POST['hname'];
        $_SESSION ['hotelname'] = $hname;
        $hid = $_POST['hid2'];
        $_SESSION['hotelid'] = $hid;
        $address = $_POST['address2'];
        $phnum = $_POST['phnum2'];
        $htype = $_POST['type2'];
        $sql2 = "INSERT INTO `hotel` (`h_id`, `h_name`, `address`, `ph_no`, `hotel_type`) VALUES ('$hid', '$hname', '$address', '$phnum', '$htype')";
        $result2 = mysqli_query($dbconnect2, $sql2);
        if($result2)
        echo "Donemfkem";
        header("location: addamenities.php");
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
        <title>Add Hotel</title>
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
      <form action="addhotel.php" method = "post">
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="hname">Hotel Name</label>
            <input type="text" class="form-control" name="hname" id="hname" placeholder="Enter Name">
          </div>
          <div class="form-group col-md-1">
            <label for="hid2">Hotel ID</label>
            <input type="number" class="form-control" name="hid2" id="hid2">
          </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-2">
          <label for="address2">Address</label>
          <input type="text" class="form-control" id="address2" name="address2" placeholder="Enter Area">
        </div>
          <div class="form-group col-md-1.4">
            <label>Contact Number</label>
            <input type="number" class="form-control" name="phnum2" id="phnum2">
          </div>
          <div class="form-group col-md-2">
            <label for="type2">Hotel Type</label>
            <select id="type2" name="type2" class="form-control">
              <option selected>Select an option</option>
              <option value="1"> 1 </option>
              <option value="2"> 2 </option>
              <option value="3"> 3 </option>
              <option value="4"> 4 </option>
              <option value="5"> 5 </option>
            </select>
          </div>
      </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <button class = "btn btn-danger admin-button" onclick="window.location.href= '../admin.php'">Back</button>
              </div>
          <script type="text/javascript" src="https://d1tgh8fmlzexmh.cloudfront.net/ccbp-static-website/js/ccbp-ui-kit.js"></script>
  </div>
</body>
</html>