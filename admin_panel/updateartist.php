<?php
if(isset($_POST["updatebtn"])){
    $id = $_POST["id"];
   $name= $_POST["name"];
    $image_artist= $_POST["image_artist"];
   
    include("shared/connection.php");
    $update = "UPDATE artists SET name = '{$name}',artist_id = '{$image_artist}'WHERE Id = '{$id}' ";
    mysqli_query($conn, $update);
    header("Location:albums.php");
    mysqli_close($conn);
}
?>