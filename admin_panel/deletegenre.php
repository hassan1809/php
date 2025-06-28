<?php
include("shared/connection.php");
$id = $_GET["dit"];
$sql = "DELETE FROM genre WHERE Id = '{$id}' ";
mysqli_query($conn,$sql);
header("Location: genre.php");
mysqli_close($conn);
?>