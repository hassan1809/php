<?php
include("shared/connection.php");
$id = $_GET["dit"];
$sql = "DELETE FROM artists WHERE Id = '{$id}' ";
mysqli_query($conn,$sql);
header("Location: artists.php");
mysqli_close($conn);
?>