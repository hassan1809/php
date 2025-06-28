
<?php
include("shared/connection.php");
if(isset($_POST["reg_btn"])){
    $name = $_POST["username"];
    $email = $_POST["useremail"];
    $password = $_POST["userpassword"];

    $sql = "INSERT INTO users(name, email, password, user_role_id) VALUES('{$name}', '{$email}', '{$password}', 2)";
    $run = mysqli_query($conn, $sql);
    if($run){
        echo"<script>alert('register successfully')
        location.href='login.php'
        </script>";
    } 

}
?>

<?php
include("shared/navbar.php");
?>
<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
    <div class="bradcumbContent">
        <p>See what’s new</p>
        <h2>Register</h2>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Login Area Start ##### -->
<section class="login-area section-padding-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="login-content">
                    <h3>Welcome</h3>
                    <!-- Registration Form -->
                    <div class="login-form">
                        <form action="#" method="post">
                            <div class="form-group">
                                <label for="username">Name</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Enter name" required>
                            </div>
                            <div class="form-group">
                                <label for="useremail">Email address</label>
                                <input type="email" name="useremail" class="form-control" id="useremail" placeholder="Enter E-mail" required>
                                <small class="form-text text-muted"><i class="fa fa-lock mr-2"></i>We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="userpassword">Password</label>
                                <input type="password" name="userpassword" class="form-control" id="userpassword" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn oneMusic-btn mt-30" name="reg_btn">Register</button>
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
</section>
<!-- ##### Login Area End ##### -->
  
        <?php
include("shared/footer.php");
?>