<?php
if(isset($_POST["updatebtn"])){
    $id = $_POST["id"];
    $name = $_POST["sname"];
    $email = $_POST["semail"];
    $pass = $_POST["spass"];
    include("shared/connection.php");
    $update = "UPDATE users SET Name = '{$name}',Email = '{$email}', Password = '{$pass}'WHERE Id = '{$id}' ";
    mysqli_query($conn, $update);
    header("Location:analytics.php");
    mysqli_close($conn);
}
?>