<?php
include("shared/connection.php");
$id = $_GET["dit"];
$sql = "DELETE FROM languages WHERE Id = '{$id}' ";
mysqli_query($conn,$sql);
header("Location: languages.php");
mysqli_close($conn);
?>