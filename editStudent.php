<?php
    require('DBConnect.php');
    $id = $_GET['Edit'];
    $query = "SELECT * FROM tbl_user WHERE ID = '".$id."' ";
    $result = mysqli_query($con, $query);

    while($row = mysqli_fetch_assoc($result)){
        $id = $row['ID'];
        $email = $row['email'];
        $password = $row['password'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Update student</title>
</head>
<body>
    <div class="container my-5">
        <h3>Update Student details manually into database</h3>
    </div>
    <div class="container"> 
        <div class="row">
            <form action="updateStudent.php?Update=<?php echo $id?>" method="POST">
                <div class="form-group">
                    <label for="email20">Email</label>
                    <input class="form-control" type="email" name="email" value="<?php echo $email?>" required>
                </div>
                <div class="form-group">
                    <label for="password20">Password</label>
                    <input class="form-control" type="password" name="password" value="<?php echo $password?>" required>
                </div>
                <input class="btn btn-success" type="submit" value="Update Student" name="updateStudent">
            </form>
        </div>
    </div>
</body>
</html>