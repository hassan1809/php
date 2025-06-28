<?php
if(isset($_POST["updatebtn"])){
    $id = $_POST["id"];
    $name = $_POST["name"];
    
    include("shared/connection.php");
    $update = "UPDATE genre SET Name = '{$name}'WHERE Id = '{$id}' ";
    mysqli_query($conn, $update);
    header("Location:genre.php");
    mysqli_close($conn);
}
?>