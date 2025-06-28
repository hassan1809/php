<?php
include("shared/header.php");
?>
<?php
include("shared/sidebar.php");
include("shared/nav.php");

?>
<?php
include("shared/connection.php");
$id = $_GET["id"];
$sql = "SELECT * FROM users WHERE Id = '{$id}'";
$row = mysqli_query(mysql: $conn,query: $sql);
?>

</head>
<body>
<h1 class= "text-center mt-5">update user details</h1>
    <div class= "container">
            <?php
            While($data = mysqli_fetch_assoc($row)){
            ?>
        <form action="updateuser.php" method ="post">
            <input class="form-control" type="hidden" name="id" value = "<?php echo $data["id"] ?>"><Br>
            <input class="form-control" type="text" name="sname" id="" value = "<?php echo $data["name"] ?>"><br>
            <input class="form-control" type="email" name="semail" id="" value = "<?php echo $data["email"] ?>"><br>
            <input class="form-control" type="text" name="spass" id="" value = "<?php echo $data["password"]?>"><br>
            <input class="btn btn-dark text-white" name="updatebtn" type="submit" value ="update User detail"><br>

        </form>
            <?php } ?>
    </div>
</body>
</html>
<?php
include("shared/footer.php");
?>