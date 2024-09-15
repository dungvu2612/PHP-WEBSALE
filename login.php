<?php
@include './db/config.php';
session_start();
if(isset($_POST['submit'])){
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['pass']);
   $select = " SELECT * FROM user_db WHERE email = '$email' && pass = '$pass'";
   $result = mysqli_query($conn, $select);
   if(mysqli_num_rows($result) > 0){
      $_SESSION['user']=$email;
      header('location:index.php'); 
   }else{
    $alert="Wrong Password or Email!";
   }
};
?>
<!DOCTYPE html>
<html ng-app="MyApp">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link rel="shortcut icon" href="https://static.lag.vn/upload/news/22/09/14/nguoi-dung-twitter-giai-thich-ve-hinh-tuong-nhan-vat-loli-anime-va-cai-ket-4_BYVV.jpg?w=800&encoder=wic&subsampling=444">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://kit.fontawesome.com/79a8b3063a.js" crossorigin="anonymous"></script>
    <style type="text/css">
        body {
            background-color: #fff;
        }
        .container-login {
            max-width: 400px;
            margin: 100px auto;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.5);
        }
        .form-control:focus {
            border-color: #1976D2;
            box-shadow: none;
        }
        .form-btn {
            width: 100%;
            background-color: #1976D2;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .form-btn:hover {
            background-color: #1565C0;
        }
        .form-link {
            text-decoration: none;
            color: #1976D2;
        }
        .form-link:hover {
            text-decoration: underline;
        }
        .form-alert {
            text-align: center;
            margin-top: 15px;
            color: #FF5722;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="container-login">
        <h2 class="text-center">Login</h2>
        <?php if(isset($alert)):?>
            <div class="form-alert"><?= $alert ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required placeholder="Enter your email">
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Password <i class="fas fa-lock"></i></label>
                <input type="password" name="pass" class="form-control" required placeholder="Enter your password"/>
            </div>
            <div class="mb-3">
                <input type="submit" name="submit" value="Login now" class="form-btn">
            </div>
            <p class="text-center">Don't have an account? <a href="register.php" class="form-link">Register now</a></p>
        </form>
    </div>
</div>
</body>
</html>

