<?php session_start(); ?>
<?php

include("../config/pdo.php");

if(!(isset($_SESSION["username1"])))
{
    header("location:login.php");
    exit(0);
}


if ((isset($_GET['delete_id']))) {
    $sql = "DELETE FROM books WHERE id=".$_GET['delete_id'];
    $conn->exec($sql);

}

$book_title = $book_description = $book_author = $book_price = $book_sale = $image_url = $target_dir = $target_file = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_title = $_POST['book_title'];
    $book_description = $_POST['book_description'];
    $book_author = $_POST['book_author'];
    $book_price = $_POST['book_price'];
    if ($_POST['book_sale']=="False"){
        $book_sale=0;
    } else{
        $book_sale=1;
    }

    $rand = rand() . time();
    $target_dir = "../img/";
    $Picname = basename($rand . $_FILES['fileToUpload']['name']);
    $target_file = $target_dir . $Picname;
    //echo $target_file;
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    $image_url = $target_file;

    try {
        $sql = "INSERT INTO books (title, description,author, price, image,sale) VALUES ('" . $book_title . "','" . $book_description . "','" . $book_author . "','" . $book_price . "','" . $image_url .  "','" . $book_sale . "')";
//        echo $sql;
//        echo "<br>";
        if ($conn->exec($sql) === TRUE) {
            header("location:login.php");
            exit(0);

        } /*else
            header("location:login.php");*/
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Book Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#03a6f3">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
<header>

    <div class="main-menu">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="../index.php"><img height="110" width="220" src="../images/logo1.png"
                                                                 alt="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="navbar-item">
                            <a href="view.php" class="nav-link">View</a>
                        </li>
                        <li class="navbar-item ">
                                <a href="logout.php" class="nav-link">logout</a>
                    </ul>

                  <!--  <div class="cart my-2 my-lg-0">
                            <span>
                              <a href="../caret.php" class="fa fa-shopping-cart" aria-hidden="true"></a></span>
                        <span class="quntity">3</span>
                    </div>-->
                    <form class="form-inline my-2 my-lg-0" method="post" action="search.php">
                        <input name="search1"  class="form-control mr-sm-2" type="search" placeholder="Search here..."
                               aria-label="Search">
                        <span hidden type="submit" class="fa fa-search" ></span>
                    </form>
                </div>
            </nav>
        </div>
    </div>
</header>
<div class="breadcrumb">
    <div class="container">
        <a class="breadcrumb-item" href="../index.php">Home</a>
        <span class="breadcrumb-item active">Admin</span>
        <span class="breadcrumb-item active">View</span>
    </div>
</div>
<div class="main-menu">
    <div class="container">
        <a href="insert.php" class="btn black row">insert</a>
        <br>
        <br>
        <br>
<div class="recent-book-sec">
    <div class="row">
        <?php
        include("../config/pdo.php");
        $sql = "select * from books";
        try {
            $val = $conn->query($sql);
            While ($row = $val->fetch()) {
                echo "<div class='col-lg-3 col-md-6'>";
                echo "<a><img height=\"218\" width=\"135\" src='../img/" . $row['image'] . "' alt='Image' class='img-responsive'></a>";
                echo "<h3>" . $row['title'] . "</h3>";
                echo " <h6> <span class='price' >" .$row['price']."$ </span > </h6 >";
                echo "<br>";

                echo " <a href='update.php?id=". $row['id']."' class='btn black'> UPDATE </a>";
                echo " <a href='view.php?delete_id=". $row['id']."' class='btn red'> DELETE </a>";
                echo "<div class='hover'>";
                echo "<a href='update.php?id=". $row['id']."'></a>";
                echo "<br>";
                echo "</div>";
                echo "</div>";

            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
    </div>
</div>
    </div>
</div>
<footer>
    <div class="copy-right">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>(C) 2018. All Rights Reserved.</h5>
                </div>
                <div class="col-md-6">
                    <div class="share align-middle">
                        <span class="fb"><i class="fa fa-facebook-official"></i></span>
                        <span class="instagram"><i class="fa fa-instagram"></i></span>
                        <span class="twitter"><i class="fa fa-twitter"></i></span>
                        <span class="pinterest"><i class="fa fa-pinterest"></i></span>
                        <span class="google"><i class="fa fa-google-plus"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>
</body>

</html>

