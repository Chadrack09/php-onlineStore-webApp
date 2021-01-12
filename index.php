<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<?php
    require('DBConnect.php');
    session_start();
    
    // When form submitted, check and create user session.
    if (isset($_POST['submit'])) {
        $email = stripslashes($_REQUEST['email']);    // removes backslashes
        $email = mysqli_real_escape_string($con, $email);

        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

        // Check user is exist in the database
        $query    = "SELECT * FROM tbl_user WHERE email = '$email' AND password = md5('$password')";
        $result = mysqli_query($con, $query); 

        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = md5($password);
            // Redirect to user Home page
            header("Location: home.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Email/password.</h3><br/>
                  <p class='link'>Click here to <a href='index.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="email" class="login-input" name="email" placeholder="email" autofocus="true">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" value="Login" name="submit" class="login-button">
        <p class="link">Don't have an account? <a href="registration.php">Registration Now</a></p>
  </form>
<?php
    }
?>
</body>
</html>
