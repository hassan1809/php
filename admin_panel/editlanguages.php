<?php
  include("shared/header.php");
  include("shared/sidebar.php");
  include("shared/nav.php");
  include("shared/connection.php");


  ?>
<?php

$id = $_GET["id"];
$sql = "SELECT * FROM languages WHERE Id = '{$id}'";
$row = mysqli_query($conn,$sql);

?>

</head>
<body>
<h1 class= "text-center mt-5">update language</h1>
    <div class= "container">
            <?php
            While($data = mysqli_fetch_assoc($row)){
            ?>
        <form action="updatelanguage.php" method ="post">
            <input class="form-control" type="hidden" name="id" value = "<?php echo $data["id"] ?>"><Br>
            <input class="form-control" type="text" name="name" id="" value = "<?php echo $data["name"] ?>"><br>
         
            <input class="btn btn-dark text-white" name="updatebtn" type="submit" value ="update language"><br>

        </form>
            <?php } ?>
    </div>
</body>
</html>
<?php
include("shared/footer.php");
?>