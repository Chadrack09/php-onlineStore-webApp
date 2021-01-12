<?php
    require('DBConnect.php');
    $id = $_GET['getID'];
    $query = "SELECT * FROM tbl_item WHERE id = '".$id."' ";
    $result = mysqli_query($con, $query);

    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $name = $row['name'];
        $description = $row['description'];
        $price = $row['price'];
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
<title>Update</title>
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
        <h3>Update Item in database</h3>
    </div>
    <div class="container"> 
        <div class="row">
            <form action="updateItem.php?getID=<?php echo $id?> " method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" value="<?php echo $name?>" required>
                </div>
                <div class="form-group">
                    <label for="price">Description</label>
                    <input class="form-control" type="text" name="description" value="<?php echo $description?>" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input class="form-control" type="text" name="price" value="<?php echo $price?>" required>
                </div>
                <input class="btn btn-success" type="submit" value="Update item" name="update">
            </form>
        </div>
    </div>
    </section>
</body>