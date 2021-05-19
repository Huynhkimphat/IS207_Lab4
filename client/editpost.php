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
    <?php
    $idPost = $_GET['id'];
    header("Content-type: text/html; charset=utf-8");
    $servername = "localhost";
    $username = "magentoUser";
    $password = "Kimphat@2001";
    // $username = "root";
    // $password = "";
    $dbname = "dealcongnghe";
    $conn = new mysqli($servername, $username, $password, $dbname);
    mysqli_set_charset($conn, 'UTF8');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM product where Id=$idPost";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '
            <div id="main">
                <div class="container">
            <h2>Update Post' . $row["Id"] . '</h2>
            <br />
            <form action="../server/postcontroller.php" method="get">
                <input type="hidden" id="idPost" name="idPost" value="' . $row['Id'] . '">
                <input type="hidden" id="action" name="action" value="update">
                <div class="form-group">
                    <label for="txtProductName">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="txtProductName" name="productName"  placeholder="Iphone 6 like new 99%" value="' . $row["ProductName"] . '">
                </div>
                <div class="form-group">
                    <label for="txtPrice">Giá bán</label>
                    <input type="text" class="form-control" id="txtPrice" name="regularPrice" placeholder="8000000" value=' . $row["RegularPrice"] . '>
                </div>
                <div class="form-group">
                    <label for="txtCategory">Loại</label>
                    <input type="text" class="form-control" id="txtCategory" name="categoryName" placeholder="Camera,Phone,..." value="' . $row["CategoryName"] . '">
                </div>
                <div class="form-group">
                    <label for="txtImageLink">Link hình ảnh</label>
                    <input type="text" class="form-control" id="txtImageLink" name="imageLink" placeholder="http://static.lazada.vn/p/image-33784-1-product.jpg" value=' . $row["ImageLink"] . '>
                </div>
                <div class="form-group">
                    <label for="txtImageLink">Link sản phẩm</label>
                    <input type="text" class="form-control" id="txtProductLink" name="productLink" placeholder="http://lazada.vn/product/iphone-8.html"  value=' . $row["ProductLink"] . '>
                </div>
                <div class="input-group-btn">
                    <button class="btn btn-danger" type="submit">Cập Nhật</button>
                </div>
                <br />
            </form>
            </div>
            </div>';
        }
    } else {
        echo "0 results";
    }
    $conn->close();

    ?>
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