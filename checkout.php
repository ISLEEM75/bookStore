<?php session_start();?>
<!DOCTYPE html>
<?php
require('validate.php');
global $flag;
$card_name=$card_num=$exp_month=$exp_year=$cvv='';
$nameErr = $crdErr = $passErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $val = new validate();
    $card_name = $val->test_input($_POST['cardname']);
    $card_num = $val->test_input($_POST['cardnumber']);
    $exp_month = $val->test_input($_POST['expmonth']);
    $exp_year = $val->test_input($_POST['expyear']);
    $cvv = $val->test_input($_POST['cvv']);
    $card_name =
    $result = $val->test_validation($card_name, "/^[a-zA-Z ]*$/", "Name is required", "Only letters and white space allowed");
    $nameErr = $result[0];
    $Check['cardname'] = $result[1];
    $card_num =
    $result = $val->test_validation($card_num, "/^(?:4[0-9]{12}(?:[0-9]{3})?)$/", "card num is required", "Enter the correct card num format");
    $crdErr = $result[0];
    $Check['cardnumber'] = $result[1];
    foreach ($Check as $value) {
        if ($value == false) {
            $flag = false;
            break;
        }
        $flag = true;
    }

    if ($flag == true) {

        try {
            header("location:hello.php?id=".$_POST["cardname"]);
            exit(0);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>


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
    <link rel="stylesheet" href="assets/css/custom.css">
    <style>
        span {
            color: #FF0000;
        }
    </style>
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
                            <li class="navbar-item ">
                                <a href="search.php" class="nav-link">Search</a>
                            </li>
                            <li class="navbar-item">
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
            <span class="breadcrumb-item active">Checkout</span>
        </div>
    </div>
    <section class="static about-sec">
        <div class="container">
            <h2>Responsive Checkout Form</h2>
            <div class="row">
                <div class="col-75">
                    <div class="container">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <div class="row">

                                <div class="col-50">
                                    <h3>Payment</h3>
                                    <label for="fname">Accepted Cards</label>
                                    <div class="icon-container">
                                        <i class="fa fa-cc-visa" style="color:navy;"></i>
                                        <i class="fa fa-cc-amex" style="color:blue;"></i>
                                        <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                        <i class="fa fa-cc-discover" style="color:orange;"></i>
                                    </div>
                                    <label for="cname">Name on Card</label>
                                    <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                                    <span class="error">* <?php echo $nameErr; ?></span>
                                    <br>
                                    <br>
                                    <label for="ccnum">Credit card number</label>
                                    <input type="text" id="ccnum" name="cardnumber" placeholder="4444444444444444">
                                    <span class="error">* <?php echo $crdErr; ?></span>
                                    <br>
                                    <br>
                                    <label for="expmonth">Exp Month</label>
                                    <input type="text" id="expmonth" name="expmonth" placeholder="September">
                                    <div class="row">
                                        <div class="col-50">
                                            <label for="expyear">Exp Year</label>
                                            <input type="text" id="expyear" name="expyear" placeholder="2018">
                                        </div>
                                        <div class="col-50">
                                            <label for="cvv">CVV</label>
                                            <input type="text" id="cvv" name="cvv" placeholder="352">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <label>
                                <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                            </label>
                            <input type="submit"  value="Continue to checkout" class="btn black">
                        </form>
                    </div>
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