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
<title>Add Item</title>
</head>
<body>

    <!-- This section contain the navigation bar -->
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
                        <a class="navbar-brand text-white" href="home.php">Cinema</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-link active text-white" href="home.php">Home <span class="sr-only">(current)</span></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container my-5">
            <h3>Add Item manually into database</h3>
        </div>
        <div class="container"> 
            <div class="row">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input class="form-control" type="text" name="description" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input class="form-control" type="text" name="price" required>
                    </div>
                    <div class="form-group">   
                            Upload image <input type="file" name="image" id="image">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Add Item" name="adding">
                </form>
            </div>
        </div>
    </section>

    <?php
        if(isset($_POST['adding'])){
            
            $image = $_FILES['image']['name'];
            $tempFileName = $_FILES['image']['tmp_name'];
            $targetPath = "images/" .basename($image);

            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            
            $query = "INSERT INTO tbl_item (name, description, price, image) VALUES ('$name', '$description', '$price', '$image')";
            $result = mysqli_query($con, $query);

            if(move_uploaded_file($tempFileName, $targetPath)){
                echo '<h4>File successfully Uploaded</h4>';
                header('location: home.php');
            }
            else{
                echo "erro in code";
            }
        } 
    ?>
</body>
</html>