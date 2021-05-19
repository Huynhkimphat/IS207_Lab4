<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <div id="footer">
        <div class="container">
            <p>All rights reserved by DealCongNghe.Com</p>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>