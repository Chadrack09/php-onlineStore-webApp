<?php
    require('DBConnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="css/bootstrap.css">
<title>Title</title>
</head>
<body>
    <div class="container my-5">
        <h3>Add Student manually into database</h3>
    </div>
    <div class="container"> 
        <div class="row">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" required> 
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" required>  
                </div>
                <input class="btn btn-primary" type="submit" value="Add Student" name="adding">
            </form>
        </div>
    </div>

    <?php
        if(isset($_POST['adding'])){
            if(empty($_POST['email']) || empty($_POST['password'])){
                echo "<p>Please Fill in the Blanks</p>";
            }
            else{
                $email = $_POST['email'];
                $password = $_POST['password'];

                $query = "INSERT INTO tbl_user (email, password) VALUES ('$email', md5('$password'))";
                $result = mysqli_query($con, $query);

                if($result){
                    header('location: showTable.php');
                }
            }
        } 
    ?>
</body>
</html>