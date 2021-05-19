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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
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
    <div id="main">
        <div class="container">
            <form method="get" action="../server/postcontroller.php" id="searchForm">
                <input type="hidden" id="action" name="action" value="search">
                <input type="text" placeholder="Search.." name="key">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
            <h2>Quản lý tin đăng</h2>
            <div class="row contentBox">
                <?php
                // header("Content-type: text/html; charset=utf-8");
                // $servername = "localhost";
                // $username = "magentoUser";
                // $password = "Kimphat@2001";
                // // $username = "root";
                // // $password = "";
                // $dbname = "dealcongnghe";
                // $conn = new mysqli($servername, $username, $password, $dbname);
                // mysqli_set_charset($conn, 'UTF8');
                // if ($conn->connect_error) {
                //     die("Connection failed: " . $conn->connect_error);
                // }
                // $sql = "SELECT * FROM product";
                // $result = $conn->query($sql);
                // if ($result->num_rows > 0) {
                //     while ($row = $result->fetch_assoc()) {
                //         echo '
                //         <div class="col-6 col-md-4 ">
                //         <div class="card">
                //         <img src="' . $row["ImageLink"] . '" class="card-img-top" alt="...">
                //         <div class="card-body">
                //             <h5 class="card-title">' . $row["ProductName"] . '</h5>
                //             <p class="card-text">' . $row["CategoryName"] . '</p>
                //             <p class="card-text">' . $row["RegularPrice"] . '</p>
                //         <a href="./editpost.php?id=' . $row["Id"] . '" class="btn btn-info">Update</a>
                //         <a href="../server/postcontroller.php?action=delete&id=' . $row["Id"] . '" class="btn btn-danger">Delete</a>
                //         </div>
                //         </div>
                //         </div>
                //         ';
                //     }
                // } else {
                //     echo "0 results";
                // }
                // $conn->close();
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

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        SearchClicked();
        $('#searchForm').submit();
    });
    const SearchClicked = function() {
        let searchForm = $('#searchForm');
        let contentBox = $('.contentBox');

        searchForm.on("submit", (e) => {
            e.preventDefault();
            let action = searchForm[0][0].value;
            let key = searchForm[0][1].value;
            let url = `../server/postcontroller.php?action=${action}&key=${key}`;
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
            }).done((data) => {
                contentBox.html('');
                data.forEach((i) => {
                    contentBox.append(`
                    <div class="col-6 col-md-4 ">
                        <div class="card">
                            <img src="${i.ImageLink}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">${i.ProductName}</h5>
                                <p class="card-text">${i.CategoryName}</p>
                                <p class="card-text">${i.RegularPrice}</p>
                            <a href="./editpost.php?id=${i.Id}" class="btn btn-info">Update</a>
                            <a href="../server/postcontroller.php?action=delete&id=${i.Id}" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                    `);
                })
            });
        })
    }
</script>
<!--    -->

</html>