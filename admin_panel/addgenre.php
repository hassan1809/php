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
include("shared/connection.php");
if(isset($_POST["reg_btn"])){
    $name = $_POST["name"];



    $sql = "INSERT INTO genre(name) VALUES('{$name}')";
    $run = mysqli_query($conn, $sql);
    if($run){
        echo"<script>alert('register successfully')
        location.href='genre.php'
        </script>";
    } 

}
?>

<div class="login-form mt-5">

<form action=""  method ="post" >
            <input class="form-control" type="text" name="name" id="" placeholder= " name"><BR>
           
            <input class="btn btn-dark text-white" type="submit" value ="add user" name="reg_btn" ><BR>

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
