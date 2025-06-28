<?php
  include("shared/header.php");
  include("shared/sidebar.php");
  include("shared/nav.php");
  include("shared/connection.php");


  ?>
<?php

$id = $_GET["id"];
$sql = "SELECT * FROM albums WHERE Id = '{$id}'";
$row = mysqli_query($conn,$sql);

?>
<?php

$artists = mysqli_query($conn, "SELECT id, name FROM artists");

?>

</head>
<body>
<h1 class= "text-center mt-5">update language</h1>
    <div class= "container">
           
        <form action="updatealbum.php" method ="post">
            <input class="form-control" type="hidden" name="id" value = "<?php echo $data["id"] ?>"><Br>
            <input class="form-control" type="text" name="title" id="" value = "<?php echo $data["title"] ?>"><br>
             <input class="form-control" type="text" name="release_year" id="" placeholder= "<?php echo $data["release_year"] ?>"><BR>
           
          <select class="form-control" name="artist_id" required>
                <option value="">Select Artist</option>
                <?php while($row = mysqli_fetch_assoc($artists)): ?>
                    <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['name']) ?></option>
                <?php endwhile; ?>
            </select>
            <input class="btn btn-dark text-white" name="updatebtn" type="submit" value ="update album"><br>

        </form>
            <?php ?>
    </div>
</body>
</html>
<?php
include("shared/footer.php");
?>