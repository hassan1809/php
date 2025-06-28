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




</head>
<body>
<?php
if(isset($_POST["reg_btn"])){
    $artistname = $_POST["name"];
    
    if(isset($_FILES["image_artist"])){
        $name = $_FILES["image_artist"]["name"];
        $tempname = $_FILES["image_artist"]["tmp_name"];
        $type = $_FILES["image_artist"]["type"];
        if($type == "image/jpeg" || $type == "image/jpg" || $type == "image/png"){
            $folder = "image/".$name;
            move_uploaded_file($tempname,"../user_panel/" . $folder);
            $query ="INSERT INTO artists(name , image_artist) VALUES('{$artistname}', '{$folder}' )";
            $run = mysqli_query($conn, $query);
            if($run){
                echo "<script>alert('artist added successfully')</script>";
            }else{
                echo "<script>alert('try again something went wrong')</script>";

            }
            }else{
                echo "<script>alert('image format could not be supported')</script>";

            }
        }
    }



?>
<div class="login-form text-center mt-5">

<form action=""  method ="post" enctype ="multipart/form-data">
            <input class="form-control" type="text" name="name" id="" placeholder= " name"><BR>
            <input class="form-control" type="file" name="image_artist" id="" placeholder= "image_artist"><BR>
           
            

            <input class="btn btn-dark text-white" type="submit" value ="add artist" name="reg_btn" ><BR>

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
