<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<?php
    session_start();
    //initializing variables
    $email = "";
    $password = "";

    //connect to the database
    include('DBConnect.php');

    // When form submitted, insert values into the database.
    if (isset($_POST['submit'])) {

        //escapes special characters in a string
        $email = stripslashes($_POST['email']);
        $email = mysqli_real_escape_string($con, $email);

        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($con, $password);
        
        if (empty($email)) { 
            array_push($errors, "email is required"); 
        }
        if (empty($password)) { 
            array_push($errors, "password is required"); 
        }

        //checking if user already exist
        $user_check_query = "SELECT * FROM tbl_user WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($con, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        //If user already exist
        if ($user) {
            if ($user['email'] === $email) {
                array_push($errors, "email already exists");
            }
            if ($user['password'] === $password) {
                array_push($errors, "password already exists");
            }
            echo "User already taken";   
        }

        
        //Register if there is no error
        if (count($errors) == 0) {
            $query = "INSERT INTO tbl_user (email, password) VALUES ('$email', md5('$password'))";
            
            mysqli_query($con, $query);
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "You are now logged in";
            header('location: home.php');
        }
    }
?>
    <form class="form" action="" method="POST">
        <h1 class="login-title">Registration</h1>
        <input type="email" class="login-input" name="email" placeholder="Email">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link">Already have an account? <a href="index.php">Login here</a></p>
    </form>
</body>
</html>
