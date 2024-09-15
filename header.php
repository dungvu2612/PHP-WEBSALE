<!DOCTYPE html>
<html>
<head>
    <title>Book Store</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/79a8b3063a.js" crossorigin="anonymous"></script>
</head>
<?php
session_start();
require_once('./db/dbconfig.php');
require_once('./db/config.php');
$categoryList = executeResult('select * from category');
?>
<body style="overflow-x:hidden;">
    <nav class="navbar navbar-expand-sm bg-dark navbar-success fixed-top" style="border-bottom: 2px solid #000">
        <a class="navbar-brand" href="index.php">
            <img src="./img/logo.png" width="30" height="30" class="d-inline-block align-top">
            <i><b style="color:white">Book Store</b></i>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a id="home-page" class="nav-link" href="index.php" style="color:white">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact-page" onclick="ScrollToTarget('contact-page')" style="color:white">Contact Us</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" id="search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">
                    <i class="fa fa-search" style="color:white;"></i>
                </button>
            </form>
            <?php
		$cart = [];
		if(isset($_SESSION['cart'])) {
			$cart = $_SESSION['cart'];
		}
		$count = 0;
		foreach ($cart as $item) {
			$count += $item['num'];
		}
		?>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="cart.php" class="nav-link" style="color:white">
                        Your Cart <i class="fa fa-shopping-cart"></i>
                            <span class="badge badge-light"><?=$count?></span>
                    </a>
                </li>
                <?php if (!isset($_SESSION['user'])): ?>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link" style="color:white">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="register.php" class="nav-link" style="color:white">Register</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" style="color:white">Hello, <?= $_SESSION['user'] ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="./login.php" class="nav-link" style="color:white">Logout <i class="fa fa-sign-out"></i></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</body>
</html>
