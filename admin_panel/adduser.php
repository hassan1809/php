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
    $name = $_POST["username"];
    $email = $_POST["useremail"];
    $password = $_POST["userpassword"];
    $user_role_id = $_POST["user_role_id"];


    $sql = "INSERT INTO users(name, email, password, user_role_id) VALUES('{$name}', '{$email}', '{$password}','{$user_role_id}')";
    $run = mysqli_query($conn, $sql);
    if($run){
        echo"<script>alert('register successfully')
        location.href='analytics.php'
        </script>";
    } 

}
?>
<?php

$roles = mysqli_query($conn, "SELECT role_id, role_name FROM roles");

?>
<div class="login-form mt-5">

<form action=""  method ="post" onsubmit="return validateForm();">
            <input class="form-control" type="text" name="username" id="" placeholder= " name"><BR>
            <input class="form-control" type="email" name="useremail" id="" placeholder= " email"><BR>
            <input class="form-control" type="password" name="userpassword" id="" placeholder= " password"><BR>
            
                
             <div class="mb-3">
            <label class="form-label">role</label>
            <select class="form-control" name="user_role_id" required>
                <option value="">Select role</option>
                <?php while($row = mysqli_fetch_assoc($roles)): ?>
                    <option value="<?= $row['role_id'] ?>"><?= htmlspecialchars($row['role_name']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>
       

            <input class="btn btn-dark text-white" type="submit" value ="add user" name="reg_btn" ><BR>

        </form>
    
   
</form>

                        <script>
function validateForm() {
    const name = document.getElementById("username").value.trim();
    const email = document.getElementById("useremail").value.trim();
    const password = document.getElementById("userpassword").value;

    if (!name || !email || !password) {
        alert("All fields are required.");
        return false;
    }

    const emailRegex = /^[\\w-\\.]+@([\\w-]+\\.)+[\\w-]{2,4}$/;
    if (!emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false;
    }

    return true;
}
</script>
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
