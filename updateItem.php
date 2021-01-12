<?php
    require('DBConnect.php');

    if(isset($_POST['update'])){
        $id = $_GET['getID'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        $query = "UPDATE tbl_item SET name = '".$name."', description = '".$description."', price = '".$price."' WHERE id = '".$id."' ";
        $result = mysqli_query($con, $query);

        if($result){
            header('location: home.php');
        }
    }
    else{
        header('location: home.php');
    }
?>