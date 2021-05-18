<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>DealCongNghe.Com</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- FontAwsome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        body {
            font-family: 'Roboto';
        }

        #left-sidebar,
        #main-content {
            height: 500px;
            border: 1px solid red;
            margin-bottom: 50px;
        }

        #footer {
            text-align: center;
        }

        .card {
            min-height: 550px;
            margin-bottom: 10px;
            ;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="./managepost.php">DealCongNghe.Com</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./managepost.php">Manage Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./createpost.html">Create Post</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <!-- Place your code at here! -->
    <div id="main">
        <div class="container">
            <h2>Quản lý tin đăng</h2>
            <div class="row">
                <?php
                header("Content-type: text/html; charset=utf-8");
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "dealcongnghe";
                $conn = new mysqli($servername, $username, $password, $dbname);
                mysqli_set_charset($conn, 'UTF8');
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT * FROM product";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                        <div class="col-4">
                        <div class="card" style="width: 18rem;">
                        <img src="' . $row["ImageLink"] . '" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">' . $row["ProductName"] . '</h5>
                            <p class="card-text">' . $row["RegularPrice"] . '</p>
                            <p class="card-text">' . $row["CategoryName"] . '</p>
                        <a href="./editpost.php?id=' . $row["Id"] . '" class="btn btn-info">Update</a>
                        <a href="../server/postcontroller.php?action=delete&id=' . $row["Id"] . '" class="btn btn-danger">Delete</a>
                        </div>
                        </div>
                        </div>
                  
                        ';
                        // echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();

                ?>
            </div>



            <br />
        </div>
    </div>

    <!-- Footer -->
    <div id="footer">
        <div class="container">
            <p>All rights reserved by DealCongNghe.Com</p>
        </div>
    </div>

    <!-- DO NOT REMOVE THE 2 LINES -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>