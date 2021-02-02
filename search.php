<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Book Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#03a6f3">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/main.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"/>


</head>

<body>
<header>

    <div class="main-menu">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="index.php"><img height="110" width="220" src="images/logo1.png"
                                                              alt="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="navbar-item">
                            <a href="index.php" class="nav-link">Home</a>
                        </li>
                        <li class="navbar-item">
                            <a href="shop.php" class="nav-link">Shop</a>
                        </li>
                        <li class="navbar-item ">
                            <a href="about.php" class="nav-link">About</a>
                        </li>
                        <li class="navbar-item active">
                            <a href="search.php" class="nav-link">Search</a>
                        </li>
                        <li class="navbar-item">
                            <?php
                            if (!(isset($_SESSION["id"]))) {
                                echo '<a href="login.php" class="nav-link">Login</a>';
                            } else {
                                echo '<a href="logout.php" class="nav-link">logout</a>';
                            }
                            ?>
                        </li>
                    </ul>
                    <div class="cart my-2 my-lg-0">
                            <span>
                               <a href="caret.php" class="fa fa-shopping-cart" aria-hidden="true"></a></span>

                    </div>
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
        <a class="breadcrumb-item" href="index.php">Home</a>
        <span class="breadcrumb-item active">Search</span>
    </div>
</div>

<div class="s003">
    <form method="post" action="search.php">
        <div class="inner-form">
            <div class="input-field first-wrap">
                <div class="input-select">
                    <select data-trigger="" name="choices">
                        <option placeholder="">All</option>
                        <option>Title</option>
                        <option>Author</option>
                        <option>Description</option>
                    </select>
                </div>
            </div>
            <div class="input-field second-wrap">
                <input name="search" id="search" type="text" placeholder="Enter Keywords?"/>
            </div>
            <div class="input-field third-wrap">
                <button class="btn-search" type="submit">
                    <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas"
                         data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor"
                              d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </form>


</div>
<form>
    <div class="container">
        <div class="recent-book-sec">
            <div class="row">
                <?php

                include("config/pdo.php");
                if (isset($_POST['search'])) {
                    $search = $_POST['search'];
                    if ($_POST['choices']=="All"){
                        $sql = "SELECT * FROM books WHERE title  LIKE '%$search%'  OR  author LIKE '%$search%'  OR  description LIKE '%$search%' ";
                    } else if ($_POST['choices']=="Title"){
                        $sql = "SELECT * FROM books WHERE title  LIKE '%$search%'";
                    } else if ($_POST['choices']=="author"){
                        $sql = "SELECT * FROM books WHERE author  LIKE '%$search%'";
                        }else {
                        $sql = "SELECT * FROM books WHERE description  LIKE '%$search%'";
                    }

                    try {
                        $val = $conn->query($sql);
                        While ($row = $val->fetch()) {
                            echo "<div class='col-lg-3 col-md-6'>";
                            echo "<a href='product-single.php?id=" . $row['id'] . "'><img height=\"218\" width=\"135\" src='img/" . $row['image'] . "' alt='Image' class='img-responsive'></a>";
                            echo "<h3>" . $row['title'] . "</h3>";
                            echo "<div class='hover'>";
                            echo "<a href='product-single.php?id=" . $row['id'] . "'></a>";
                            echo "</div>";
                            echo "</div>";

                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                } else if (isset($_POST['search1'])) {
                    $search = $_POST['search1'];
                    $sql = "SELECT * FROM books WHERE title  LIKE '%$search%'  OR  author LIKE '%$search%'  OR  description LIKE '%$search%' ";
                    try {
                        $val = $conn->query($sql);
                        While ($row = $val->fetch()) {
                            echo "<div class='col-lg-3 col-md-6'>";
                            echo "<a href='product-single.php?id=" . $row['id'] . "'><img height=\"218\" width=\"135\" src='img/" . $row['image'] . "' alt='Image' class='img-responsive'></a>";
                            echo "<h3>" . $row['title'] . "</h3>";
                            echo "<div class='hover'>";
                            echo "<a href='product-single.php?id=" . $row['id'] . "'></a>";
                            echo "</div>";
                            echo "</div>";
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();

                    }

                }
                ?>
            </div>
        </div>
    </div>
</form>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="address">
                    <h4>Our Address</h4>
                    <h6>The BookStore , 1st Store <br>
                        Gaza EL-Shijaeya , Palestine</h6>
                    <h6>Call : +970 592 382 529</h6>
                    <h6>Email : isleem52@gmail.com</h6>
                </div>
                <div class="timing">
                    <h4>Timing</h4>
                    <h6>Mon - Fri: 7am - 10pm</h6>
                    <h6>​​Saturday: 8am - 10pm</h6>
                    <h6>​Sunday: 8am - 11pm</h6>
                </div>
            </div>
            <div class="col-md-3">
                <div class="navigation">
                    <h4>Navigation</h4>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="privacy-policy.php">Privacy Policy</a></li>
                        <li><a href="terms-conditions.php">Terms</a></li>
                        <li><a href="products.php">Products</a></li>
                    </ul>
                </div>
                <div class="navigation">
                    <h4>Help</h4>
                    <ul>
                        <li><a href="">Shipping & Returns</a></li>
                        <li><a href="privacy-policy.php">Privacy</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form">
                    <h3>Quick Contact us</h3>
                    <h6>We are now offering some good discount
                        on selected books go and shop them</h6>
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <input placeholder="Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-12">
                                <textarea placeholder="Messege"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button class="btn black">Alright, Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
<script src="js/extention/choices.js"></script>
<script>
    const choices = new Choices('[data-trigger]',
        {
            searchEnabled: false,
            itemSelectText: '',
        });

</script>
</body>

</html>
