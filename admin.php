<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <style>
        .well {
            background: rgba(0, 0, 0, 0.7);
            border: none;
            height: 200px;
        }

        body {
            background-image: url('images/home_bg.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        h4 {
            color: #ffbb2b;
        }

        ul {
            color: white;
            font-size: 13px;
        }

        .jumbotron {
            max-width: 375px;
            padding: 15px;
            margin: 0 auto;
            color: #1a1a1a;
            margin-top: 40px;

        }

        h2 {
            text-align: center;
        }

        #new_user {
            margin-top: 10px;
            text-align: center;
        }


        p {
            text-decoration-color: red;
        }
        body
        {
            background-size: cover;
            height: 100vh;
            background-image : url("images/admin/image1.jpeg");
            padding: 20px;
        }
        .admin-heading{
            font-size: 34px;
            font-family: "Bree Serif";
            color: black;
        }
        .admin-button{
            position: absolute;
            top: 1rem;
            right: 8rem;
            font-size: 18px;
            font-family: "Bree Serif";
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
    <div id="sectionAdmin">
        <div class="img-responsive">
            <h1 class="admin-heading"> Admin </h1>
            <button class = "btn btn-danger admin-button" onclick="window.location.href= 'index.php'">Home</button>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 well">
                    <h4> Hotel </h4>
                    <hr>
                    <ul>
                        <li><a href="admin/addhotel.php"> Add Hotel </a></li>
                        <li><a href="admin/deletehotel.php">Delete Hotel </a></li>
                    </ul>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 well">
                    <h4> Room </h4>
                    <hr>
                    <ul>
                        <li><a href="admin/selecthotelroom.php">Add Room </a></li>
                        <li><a href="admin/selectedroom.php">Delete Room</a></li>
                    </ul>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 well">
                    <h4>Reservations</h4>
                    <hr>
                    <ul>
                        <li><a href="admin/deleteres.php"> Delete Reservations </a></li>
                    </ul>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </div>
</body>

</html>