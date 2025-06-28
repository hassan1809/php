<?php
if(isset($_POST["updatebtn"])){
    $title = $_POST["title"];
    $type = $_POST["type"];
    $artist_id = $_POST["artist_id"];
    $album_id = $_POST["album_id"];
    $genre_id = $_POST["genre_id"];
    $language_id = $_POST["language_id"];
    $year = $_POST["year"];

    $file_path = "";
    $thumbnail_path = "";
    include("shared/connection.php");
   $update = "UPDATE media SET 
            title = '{$title}', 
            type = '{$type}', 
            artist_id = '{$artist_id}', 
            album_id = '{$album_id}', 
            genre_id = '{$genre_id}', 
            language_id = '{$language_id}', 
            year = '{$year}', 
            file_path = '{$file_path}', 
            thumbnail_path = '{$thumbnail_path}' 
          WHERE id = {$id}";

    mysqli_query($conn, $update);
    header("Location:media.php");
    mysqli_close($conn);
}
?>