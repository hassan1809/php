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
    $name = $_POST["name"];
  

    $sql = "INSERT INTO languages(name ) VALUES('{$name}')";
    $run = mysqli_query($conn, $sql);
    if($run){
        echo"<script>alert('register successfully')
        location.href='languages.php'
        </script>";
    } 

}
?>
<div class="login-form text-center mt-5">

<form action=""  method ="post" >
            <input class="form-control" type="text" name="name" id="" placeholder= " name"><BR>
            
            <input class="btn btn-dark text-white" type="submit" value ="add language" name="reg_btn" ><BR>

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
