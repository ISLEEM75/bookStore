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
</head>

<body>
    <header>
        <div class="main-menu">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.php"><img height="110" width="220" src="images/logo1.png" alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                            <li class="navbar-item">
                                <a href="about.php" class="nav-link">About</a>
                            </li>
                            <li class="navbar-item">
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
            <span class="breadcrumb-item active">Products</span>
        </div>
    </div>
    <section class="static about-sec">
        <div class="container">

            <h2>ALL BOOKS</h2>
            <div class="recent-book-sec">
                <div class="row">
                    <?php
                    include("config/pdo.php");
                    $sql = "select * from books";
                    try {
                        $val = $conn->query($sql);
                        While ($row = $val->fetch()) {
                            echo "<div class='col-lg-3 col-md-6'>";
                            echo "<a href='product-single.php?id=".$row['id']."'><img height=\"218\" width=\"135\" src='img/" . $row['image'] . "' alt='Image' class='img-responsive'></a>";

                            echo "<h3>" . $row['title'] . "</h3>";
                            echo " <h6> <span class='price' >" .$row['price']."$ </span > / <a href='product-single.php?id=".$row['id']."' > Buy Now </a ></h6 >";
                            echo "<div class='hover'>";
                            echo "<a href='product-single.php?id=".$row['id']."'></a>";
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

    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="address">
                        <h4>Our Address</h4>
                        <h6>The  BookStore , 1st Store <br>
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
</body>

</html>