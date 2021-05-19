<?php
include './product.php';

$action = $_GET['action'];
$post = new Post();
if ($action == 'create') {
    $post->productName = $_GET["productName"];
    $post->regularPrice = $_GET["regularPrice"];
    $post->salePrice = $post->regularPrice;
    $post->categoryName = $_GET["categoryName"];
    $post->imageLink = $_GET["imageLink"];
    $post->productLink = $_GET["productLink"];
    CreateNewPost($post);
} else if ($action == 'delete') {
    $post->postId = $_GET["id"];
    DeletePost($post->postId);
} else if ($action == 'update') {
    $post->postId = $_GET["idPost"];
    $post->productName = $_GET["productName"];
    $post->regularPrice = $_GET["regularPrice"];
    $post->salePrice = $post->regularPrice;
    $post->categoryName = $_GET["categoryName"];
    $post->imageLink = $_GET["imageLink"];
    $post->productLink = $_GET["productLink"];
    UpdatePost($post);
} else if ($action == 'search') {
    $key = $_GET["key"];
    SearchPost($key);
}


function CreateNewPost($post)
{
    $servername = "localhost";
    $username = "magentoUser";
    $password = "Kimphat@2001";
    // $username = "root";
    // $password = "";
    $dbname = "dealcongnghe";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "
        INSERT INTO product(ProductName,RegularPrice,SalePrice,CategoryName,ImageLink,ProductLink)
        VALUES('$post->productName',$post->regularPrice,$post->salePrice,'$post->categoryName',
        '$post->imageLink','$post->productLink');";

    if ($conn->query($sql) === TRUE) {
        header("LOCATION: http://localhost/IS207_Lab4/client/managepost.php");
        // header("LOCATION: http://localhost:8080/Dealcongnghe/client/managepost.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
};
function DeletePost($postId)
{
    $servername = "localhost";
    $username = "magentoUser";
    $password = "Kimphat@2001";
    // $username = "root";
    // $password = "";
    $dbname = "dealcongnghe";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "DELETE FROM product WHERE id=$postId";

    if ($conn->query($sql) === TRUE) {
        header("LOCATION: http://localhost/IS207_Lab4/client/managepost.php");
        // header("LOCATION: http://localhost:8080/Dealcongnghe/client/managepost.php");

    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}
function UpdatePost($post)
{
    $servername = "localhost";
    $username = "magentoUser";
    $password = "Kimphat@2001";
    // $username = "root";
    // $password = "";
    $dbname = "dealcongnghe";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE product 
            SET ProductName='$post->productName' ,
            RegularPrice='$post->regularPrice' ,
            SalePrice=$post->salePrice ,
            CategoryName='$post->categoryName' ,
            ImageLink='$post->imageLink' ,
            ProductLink='$post->productLink' 
            WHERE Id=$post->postId";
    if ($conn->query($sql) === TRUE) {
        header("LOCATION: http://localhost/IS207_Lab4/client/managepost.php");
        // header("LOCATION: http://localhost:8080/Dealcongnghe/client/managepost.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
function SearchPost($key)
{
    $servername = "localhost";
    $username = "magentoUser";
    $password = "Kimphat@2001";
    // $username = "root";
    // $password = "";
    $dbname = "dealcongnghe";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM product WHERE ProductName LIKE '%$key%' LIMIT 100;";
    $result = $conn->query($sql);

    $rows = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }
    echo json_encode($rows);
    // if ($result->num_rows > 0) {
    //     while ($row = $result->fetch_assoc()) {
    //         echo "id: " . $row["id"] . " - Name: " . $row["ProductName"] . " " . $row["CategoryName"] . " " . $row["RegularPrice"] . "<br>";
    //     }
    // } else {
    //     echo "0 results";
    // }
}
