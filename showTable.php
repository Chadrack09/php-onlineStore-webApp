<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/showTable.css">
    <title>Students</title>
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

    <!-- Students show table -->
    <div class="container mt-5">
        <div class="row">
            <h4>Students Database table</h4><br>
        </div>
        <div class="row">
            <p>Please note that the add, delete, and udpdate buttons are for <span class="text-danger">admin use only</span></p>
        </div>
            <p>The upload button will upload Student photos in the database</p>
    </div>
    <div class="container mt-5">
        <div class="row">
            <table>
                <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>

                <!-- PHP Code to fetch data in the table database -->
                <?php
                    // connecting to the database
                    require('DBConnect.php');

                    $query = "SELECT ID, email, password FROM tbl_user ORDER BY ID ASC";
                    $result = mysqli_query($con, $query);

                    
                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['ID'];
                        $email = $row['email'];
                        $password = $row['password'];
                ?>
                        <tr>
                            <td><?php echo $id ?></td>
                            <td><?php echo $email ?></td>
                            <td><?php echo $password ?></td>
                            <td><a class="btn btn-danger" href="deleteStudent.php?Del=<?php echo $id?>">Delete</a></td>
                            <td><a class="btn btn-success" href="editStudent.php?Edit=<?php echo $id?>">Edit</a></td>
                        </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>

    <!-- ADD, DELETE, UPDATE Students -->
    <div class="container">
        <div class="row my-5">
            <form action="addStudent.php" method="POST" >
                <input class="btn btn-primary" type="submit" class="mr-3" value="Add student" name="add">
            </form>
        </div>
    </div>
</body>
</html>