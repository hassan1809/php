<?php
if(isset($_POST["updatebtn"])){
    $id = $_POST["id"];
   $title = $_POST["title"];
    $artist_id = $_POST["artist_id"];
    $release_year = $_POST["release_year"];
    include("shared/connection.php");
    $update = "UPDATE albums SET title = '{$title}',artist_id = '{$artist_id}', release_year = '{$release_year}'WHERE Id = '{$id}' ";
    mysqli_query($conn, $update);
    header("Location:albums.php");
    mysqli_close($conn);
}
?>