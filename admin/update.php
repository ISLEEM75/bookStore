<?php session_start();?>
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

                        </li>
                    </ul>
                    <!--<div class="cart my-2 my-lg-0">
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
        <span class="breadcrumb-item active">Update</span>
    </div>
</div>
<section class="static about-sec">
    <div class="container">

        <?php
        include("../config/pdo.php");
        $book_title = $book_description = $book_author = $book_price = $book_sale = $image_url = $target_dir = $target_file = '';


        if (isset($_GET['id'])) {

            $num = $_GET['id'];

            $sql = "select * from books where id=" . $num;

            try {
                echo "<form method='post' action='' enctype='multipart/form-data'>";
                $val = $conn->query($sql);

                While ($row = $val->fetch()) {

                    echo " <div class='col-md-4'>";

                    echo "  <label>Book Title</label> <input type='text' name='book_title' value='" . $row['title'] . "'>";
                    echo "</div>";
                    echo "<div class='col-5'>";
                    echo "<label>Book Description</label> <br> <textarea rows='10' cols='70'
                                                                   name='book_description' class='" . $row['description'] . "' id='" . $row['description'] . "' 
                                                                   value='" . $row['description'] . "'>" . $row['description'] . "</textarea>";

                    echo "</div>";
                    echo "<div class='col-6'>";
                    echo "<label>Book Author</label> <br> <input name='book_author'  value='" . $row['author'] . "'>";
                    echo "</div>";

                    echo "<div class='col-6'>";
                    echo " <label>Book Price</label> <br> <input name='book_price'  value='" . $row['price'] . "'>";
                    echo "</div>";
                    echo "<div class='col-7'>";

                    echo "<div class='input-field first-wrap'>";
                    echo "<label>Sale</label>";
                    echo "<select  name='book_sale'  value='" . $row['sale'] . "'>
                            <option>False</option>
                            <option>True</option>
                        </select>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='col-8'>";
                    echo " <label>Image</label>";
                    echo "<input type='file' name='fileToUpload' id='fileToUpload' class='" . $row['image'] . "' id='" . $row['image'] . "' value='" . $row['image'] . "'> </input>";
                    echo "</div>";
                    echo "<div>";
                    echo "<input  type='submit' value='Update' class=\"btn black\"/>";
                    echo "</div>";
                }
                echo "</form>";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }


            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id = $_GET['id'];

                $sql = "";
                $book_title = $_POST['book_title'];
                $book_description = $_POST['book_description'];
                $book_author = $_POST['book_author'];
                $book_price = $_POST['book_price'];
                //img path
                $rand = rand() . time();
                $target_dir = "../images/";
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
                    $sql = "UPDATE books SET title= '$book_title',description='$book_description',author='$book_author',price='$book_price',sale='$book_sale', image='$image_url' where id = '$id'";

                    $conn->exec($sql);



                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            }
        }

        ?>

    </div>

</section>
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

