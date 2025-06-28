<?php
if(isset($_POST["updatebtn"])){
    $id = $_POST["id"];
   $name = $_POST["name"];
    
    include("shared/connection.php");
    $update = "UPDATE languages SET name = '{$name}'WHERE Id = '{$id}' ";
    mysqli_query($conn, $update);
    header("Location:languages.php");
    mysqli_close($conn);
}
?>