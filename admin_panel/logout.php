<?php 
session_start();
session_unset();
session_destroy();
header("Location: ../user_panel/index.php");
?>