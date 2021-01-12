<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!-- HTML Code -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha512-Velp0ebMKjcd9RiCoaHhLXkR1sFoCCWXNp6w4zj1hfMifYB5441C+sKeBl/T/Ka6NjBiRfBBQRaQq65ekYz3UQ==" crossorigin="anonymous" />
    <title>School</title>   
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
                            <div class="navbar-nav">
                                <a class="nav-link active text-white" href="logout.php">Sign Out <span class="sr-only">(current)</span></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    
    <!-- This section contain the form to fill up -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-12 col-lg-12">
                    <h2 class="text-center mt-5 ">Welcom to student cinema</h2>
                    <h4 class="text-center mt-5 ">Please enter your age to see movie ticket price
                        <h6 class="text-center">Let's have some fun</h6>
                    </h4>

                    <!-- Form class -->
                    <form method="GET" action="<?php echo($_SERVER["PHP_SELF"]);?>">
                        <div class="form-group">
                            <label for="ageInput" id="ageInput">Please Enter your age</label>
                            <input type="text" name="age" class="form-control">
                            <input type="submit" name="submit" class="btn btn-primary mt-3" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Show student table link to the page -->
    <div class="container">
        <div class="row">
            <div class="col">
                <a class="h5 btn btn-danger" href="showTable.php">See all students</a>
            </div>
        </div>
    </div>

<!-- PHP Code -->
<!-- Starting the session -->
<?php
    require_once("movies.php");
?>

<!-- PHP Movies Class functions -->
<div class="container">
    <div class="row">
        <div class="col">
        <?php
            if(isset($_GET['submit'])){
                $age = $_GET['age'];
                echo "<h5>You are " .$age ." years-old your ticket price is</h5>";

                if(isset($_SESSION['movies'])){
                    $moviePrice = unserialize($_SESSION['movies']);
                    $moviePrice->setTicketPrice($age);
                }
                else if(class_exists('Movies')){
                    $moviePrice = new Movies();
                    $moviePrice->setTicketPrice($age);
                }
                else{
                    exit("<p>The Movie class is not available.</p>");
                }
                printf("<h4>%s %.2f</h4>", 'R', $moviePrice->getTicketPrice());
                $_SESSION['movies'] = serialize($moviePrice);
            }    
        ?>
        </div>
    </div>
</div>

<!-- Section for Item in store -->
<section class="container mt-5 text-primary">
    <h3>Client items</h3>
    <div class="row">
        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
            </tr>

            <!-- PHP Section to display the table item in the page -->
            <?php
                    // connecting to the database
                    require('DBConnect.php');

                    $query = "SELECT * FROM tbl_item ORDER BY id ASC";
                    $result = mysqli_query($con, $query);

                    
                    while($row = mysqli_fetch_array($result)){
                        $id = $row['id'];
                        $name = $row['name'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image = $row['image'];
                ?>
                        <tr>
                            <td><?php echo $id ?></td>
                            <td><?php echo $name ?></td>
                            <td><?php echo $description ?></td>
                            <td><?php echo $price ?></td>
                            <td class="images"><img id="image" class="image" src="images/<?php echo $row['image']?>" style="width: 100px; max-width:300px;"></td>
                            <td><a class="btn btn-danger" href="deleteItem.php?Del=<?php echo $id?>">Delete</a></td>
                            <td><a class="btn btn-success" href="editItem.php?getID=<?php echo $id?>">Update</a></td>
                        </tr>
                <?php
                    }
                ?>             
        </table>
        <!-- Model Pop up images -->
        <div id="modal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img-modal">
        </div>
    </div>

    <!-- Add items button -->
        <div class="row my-5">
            <form action="addItem.php" method="POST">
                <input type="submit" class="mr-3 btn btn-primary" value="Add Item" name="add">
            </form>
        </div>
</section>

<!-- Script retrived from home.js -->
<script src="js/home.js"></script>
</body>
</html>
