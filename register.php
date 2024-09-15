<?php
@include ('db/config.php');
if(isset($_POST['submit'])){
   $uname = mysqli_real_escape_string($conn, $_POST['uname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $select = " SELECT * FROM user_db WHERE email = '$email' && pass = '$pass' ";
   $result = mysqli_query($conn, $select);
   if(mysqli_num_rows($result) > 0){
      $error[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $error[] = 'Password Not Matched!';
      }else{
         $insert = "INSERT INTO user_db(uname, email, pass) VALUES('$uname','$email','$pass')";
         mysqli_query($conn, $insert);
         header('location:login.php');
      }
   }
};
?>

<!DOCTYPE html>
<html ng-app="MyApp">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Page</title>
    <link rel="shortcut icon" href="../img/logo1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/79a8b3063a.js" crossorigin="anonymous"></script>
    <style type="text/css">
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
        <h2 class="text-center">Register</h2>
        <?php if(isset($error)):?>
            <div class="form-alert"><?= implode('<br>', $error) ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="mb-3">
                <label for="uname" class="form-label">User name <i class="fas fa-user"></i></label>
                <input type="text" name="uname" class="form-control" required placeholder="Enter your user name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required placeholder="Enter your email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password <i class="fas fa-lock"></i></label>
                <input type="password" name="password" class="form-control" required placeholder="Enter your password">
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password <i class="fas fa-lock"></i></label>
                <input type="password" name="cpassword" class="form-control" required placeholder="Re-enter your password">
            </div>
            <input type="submit" name="submit" value="Register Now" class="form-btn">
            <p class="text-center">I have an account? <a href="login.php" class="form-link">Log in</a></p>            
        </form>
    </div>
</div>
</body>
</html>
