<!-- Update details into table rows -->
<?php
    require('DBConnect.php');

    if(isset($_POST['updateStudent'])){
        $id = $_GET['Update'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "UPDATE tbl_user SET email = '".$email."', password = md5('".$password."') WHERE ID = '".$id."'";
        $result = mysqli_query($con, $query);

        if($result){
            header('location: showTable.php');
        }
        else {
            echo "Please check code";
        }
    }
?>