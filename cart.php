<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>NuttyLand Butter | Best Peanut Butter In Town</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../NuttyLandButter/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/products.css" rel="stylesheet">
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <?php include('../NuttyLandButter/includes/navibar.php'); ?>

    <!-- Cart Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-2 text-left wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="text-primary mb-3"><span class="fw-bold text-dark">Your Cart</h1>
            </div>
            <!-- Cart Table Start -->
            <div class="row">
                <div class="col-lg-12">
                    <table class="table text-dark">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Check if cart items are stored in localStorage
                            if (isset($_GET['cart'])) {
                                $cartItems = json_decode($_GET['cart'], true);

                                // Check if $cartItems is an array before using foreach
                                if (is_array($cartItems)) {
                                    // Display the products in the cart table
                                    foreach ($cartItems as $item) {
                                        echo "
                                <tr>
                                    <td>{$item['productName']}</td>
                                    <td>{$item['productPrice']}</td>
                                    <td>1</td>
                                    <td>{$item['productPrice']}</td>
                                </tr>
                                ";
                                    }
                                }
                            } else {
                                echo "<tr><td colspan='4'>No items in the cart</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- Shipping Card -->
                <div class="container-fluid pb-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Shipping Mode</h5>
                                        <p class="card-text">Choose your shipping method:</p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="shipping" id="pickup"
                                                value="pickup">
                                            <label class="form-check-label" for="pickup">
                                                Pick Up
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="shipping" id="delivery"
                                                value="delivery">
                                            <label class="form-check-label" for="delivery">
                                                Delivery (2-5 days)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Shipping Details -->
                            <div class="col-lg-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Order Summary</h5>

                                        <!-- Subtotal -->
                                        <div class="row">
                                            <div class="col-7">Subtotal:</div>
                                            <div class="col-5 text-end">$80.00</div>
                                        </div>

                                        <!-- Shipping Fee -->
                                        <div class="row">
                                            <div class="col-7">Shipping Fee:</div>
                                            <div class="col-5 text-end">
                                                <span class="shipping-fee"></span>
                                            </div>
                                        </div>
                                        <hr>

                                        <!-- Total Price -->
                                        <div class="row">
                                            <div class="col-7"><strong>Total:</strong></div>
                                            <div class="col-5 text-end"><strong></strong></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Shipping Card End -->
            </div>
            <!-- Cart Table End -->
        </div>
    </div>
    <!-- Cart End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    <!-- Back to Top End -->

    <?php include('../NuttyLandButter/includes/footer.php'); ?>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="js/cart.js"></script>

</body>

</html>