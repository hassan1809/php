<?php
include("shared/connection.php");
?>
<?php
include("shared/header.php");
 include("shared/nav.php");

?>
<?php
include("shared/sidebar.php");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</head>
<body>
<?php
include("shared/connection.php");
if(isset($_POST["reg_btn"])){
    $title = $_POST["title"];
    $artist_id = $_POST["artist_id"];
    $release_year = $_POST["release_year"];

    $sql = "INSERT INTO albums(title, artist_id,release_year) VALUES('{$title}', '{$artist_id}', '{$release_year}' )";
    $run = mysqli_query($conn, $sql);
    if($run){
        echo"<script>alert('register successfully')
        location.href='albums.php'
        </script>";
    } 

}
?>
<?php

$artists = mysqli_query($conn, "SELECT id, name FROM artists");

?>
<div class="  mt-5">

<form action=""  method ="post" >
            <input class="form-control" type="text" name="title" id="" placeholder= " title"><BR>
            
            <input class="form-control" type="text" name="release_year" id="" placeholder= " release_year"><BR>
           
             <div class="mb-3">
            <label class="form-label">album</label>
            <select class="form-control" name="artist_id" required>
                <option value="">Select Artist</option>
                <?php while($row = mysqli_fetch_assoc($artists)): ?>
                    <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['name']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>

          

            <input class="btn btn-dark text-white" type="submit" value ="add album" name="reg_btn" ><BR>

        </form>
    
   
</form>

                     
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</body>
</html>
<?php
include("shared/footer.php");
?>
