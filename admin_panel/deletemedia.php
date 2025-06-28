<?php
include("shared/connection.php");
$id = $_GET["dit"];
$sql = "DELETE FROM media WHERE Id = '{$id}' ";
mysqli_query($conn,$sql);
header("Location: media.php");
mysqli_close($conn);
?>