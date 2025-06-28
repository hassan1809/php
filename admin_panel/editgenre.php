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
$sql = "SELECT * FROM genre WHERE Id = '{$id}'";
$row = mysqli_query(mysql: $conn,query: $sql);
?>

</head>
<body>
<h1 class= "text-center mt-5">update user details</h1>
    <div class= "container">
            <?php
            While($data = mysqli_fetch_assoc($row)){
            ?>
        <form action="updategenre.php" method ="post">
            <input class="form-control" type="hidden" name="id" value = "<?php echo $data["id"] ?>"><Br>
            <input class="form-control" type="text" name="name" id="" value = "<?php echo $data["name"] ?>"><br>
            
            <input class="btn btn-dark text-white" name="updatebtn" type="submit" value ="update genre"><br>

        </form>
            <?php } ?>
    </div>
</body>
</html>
<?php
include("shared/footer.php");
?>