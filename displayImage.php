<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require('DBConnect.php');
        include('uploadPhoto.php');
        
        if(isset($_GET['getImage'])){
            $id = $_GET['email'];

            $query = "SELECT image FROM images WHERE id = '".$id."' ";
            $result = mysqli_query($con, $query);    
        }
    ?>
</body>
</html>