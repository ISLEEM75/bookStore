<?php

include("config/pdo.php");
require('validate.php');
$user_name = $user_password=$user_email =$comment = '';
$nameErr = $emailErr = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $val = new validate();
    $user_name = $val->test_input($_POST['user_name']);
    $user_password = $val->test_input($_POST['user_password']);
    $user_email = $val->test_input($_POST['user_email']);
    $comment = $val->test_input($_POST['comment']);

    $result = $val->test_validation($user_name, "/^[a-zA-Z ]*$/", "Name is required", "Only letters and white space allowed");
    $nameErr = $result[0];
    $Check['user_name'] = $result[1];

    $result = $val->test_validation($user_email, "/^[a-zA-Z ]*$/", "Email is required", "Enter the correct email format");
    $emailErr = $result[0];
    $Check['user_email'] = $result[1];
    foreach ($Check as $value) {
        if ($value == false) {
            $flag = false;
            break;
        }
        $flag = true;
    }

    if ($flag == true) {

        try {
            header("location:index.php");
            exit(0);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


        try {
            $sql = "INSERT INTO user (username,password,email, comment) VALUES ('" . $user_name . "','" . $user_password . "','" . $user_email . "','" . $comment . "')";
//            echo $sql;
//            echo "<br>";
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
                        <li class="navbar-item">
                            <a href="about.php" class="nav-link">About</a>
                        </li>
                        <li class="navbar-item ">
                            <a href="search.php" class="nav-link">Search</a>
                        </li>
                        <li class="navbar-item ">
                            <a href="login.php" class="nav-link">Login</a>
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
        <span class="breadcrumb-item active">Register</span>
    </div>
</div>
<section class="static about-sec">
    <div class="container">
        <h1>My Account / REgister</h1>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's printer took a galley of type and scrambled it to make a type specimen book. It has survived not
            only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem </p>
        <div class="form">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                <div class="col-md-4">
                    Name: <input placeholder="Enter User Name" name="user_name" required>
                    <span class=" error">* <?php echo $nameErr; ?></span>
                    <br>

                </div>
                <div class="col-md-4">
                    Password: <input type="password" placeholder="Password" name="user_password" required>
                    <span class="required-star">*</span>

                </div>
                <div class="col-md-4">
                    RePassword: <input type="password" placeholder="Repeat Password" required>
                    <span class="required-star">*</span>

                </div>
                <div class="col-md-5">
                    E-mail: <input type="email" placeholder="Enter Email Address" name="user_email" required>
                    <span class=" error">* <?php echo $emailErr; ?></span>
                    <br>
                </div>
                <div class="col-6">
                    Comment:<br>
                    <textarea name="comment" rows="5" cols="40"></textarea>
                    <br><br>
                </div>

                <div class="col-lg-8 col-md-12">
                    <button  type="submit" class="btn black">Register</button>
                    <h5>not Registered? <a href="login.php">Login here</a></h5>
                </div>
            </form>
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