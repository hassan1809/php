<?php
include("shared/connection.php");
$id = $_GET["dit"];
$sql = "DELETE FROM albums WHERE Id = '{$id}' ";
mysqli_query($conn,$sql);
header("Location: albums.php");
mysqli_close($conn);
?>