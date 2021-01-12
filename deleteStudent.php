<?php
    // Connecing to database
    require('DBConnect.php');

    if(isset($_GET['Del'])){
        $id = $_GET['Del'];
        $query = "DELETE FROM tbl_user WHERE ID = '".$id."' ";
        $result = mysqli_query($con, $query);

        if($result){
            header('location: showTable.php');
        }
        else{
            echo "Error in the code, please check again";
        }
    }
    else{
        header('location: showTable.php');
    }
?>