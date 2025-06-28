<?php
include("shared/navbar.php");
include("shared/connection.php");
?>

<!-- ##### Hero Area Start ##### -->
  <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url(img/bg-img/bg-1.jpg);"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms">Latest album</h6>
                                <h2 data-animation="fadeInUp" data-delay="300ms">Beyond Time <span>Beyond Time</span></h2>
                                <a data-animation="fadeInUp" data-delay="500ms" href="#" class="btn oneMusic-btn mt-50">Discover <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url(img/bg-img/bg-2.jpg);"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms">Latest album</h6>
                                <h2 data-animation="fadeInUp" data-delay="100ms">Colorlib Music <span>Colorlib Music</span></h2>
                                <a data-animation="fadeInUp" data-delay="100ms" href="albums-store.php" class="btn oneMusic-btn mt-50">Discover <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Latest Albums Area Start ##### -->
    
    <!-- ##### Latest Albums Area End ##### -->

    <!-- ##### Buy Now Area Start ##### -->
   
    <!-- ##### Buy Now Area End ##### -->

    <!-- ##### Featured Artist Area Start ##### -->
    <section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed" style="background-image: url(img/bg-img/bg-4.jpg);">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-12 col-md-5 col-lg-4">
                    <div class="featured-artist-thumb">
                        <img src="img/get.jfif" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="featured-artist-content">
                        <!-- Section Heading -->
                        <div class="section-heading white text-left mb-30">
                            <p>See what’s new</p>
                            <h2>top trending</h2>
                        </div>
                        <p>Nam tristique ex vel magna tincidunt, ut porta nisl finibus. Vivamus eu dolor eu quam varius rutrum. Fusce nec justo id sem aliquam fringilla nec non lacus. Suspendisse eget lobortis nisi, ac cursus odio. Vivamus nibh velit, rutrum at ipsum ac, dignissim iaculis ante. Donec in velit non elit pulvinar pellentesque et non eros.</p>
                        <div class="song-play-area">
                            <div class="song-name">
                                <p>01. pal pal jena </p>
                            </div>
                            <audio preload="auto" controls>
                                <source src="audio/Afusic - Pal Pal (Official Music Video) Prod. @AliSoomroMusic.mp4">
                            </audio>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Featured Artist Area End ##### -->

    <!-- ##### Miscellaneous Area Start ##### -->
    <section class="miscellaneous-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- ***** Weeks Top ***** -->
               

                <!-- ***** New Hits Songs ***** -->
                <div class="col-12 col-lg-4">
                    <div class="new-hits-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <p>See what’s new</p>
                            <h2>New Hits</h2>
                        </div>

                        
                        
                        <?php
                        $sql = "SELECT * FROM media";
                        $run = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($run)>0){
                            while($data = mysqli_fetch_assoc($run)){
                        ?>

                        <!-- Single Top Item -->
                        <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="150ms">
                            <div class="first-part d-flex align-items-center">
                                <div class="thumbnail">
                                    <img src="<?php echo $data["thumbnail_path"] ?>" alt="">
                                </div>
                                <div class="content-">
                                    <h6><?php echo $data["title"] ?></h6>
                                    <p><?php echo $data["artist_id"] ?></p>
                                </div>
                            </div>
                            <audio preload="auto" controls>
                                <source src="<?php echo $data["file_path"] ?>">
                            </audio>
                        </div>
                        <?php
                            }
                        }
                        ?>

                        
                    </div>
                </div>
                <?php
                
                ?>
                <!-- ***** Popular Artists ***** -->
                <div class="col-12 col-lg-4">
                    <div class="popular-artists-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <p>See what’s new</p>
                            <h2>Popular Artist</h2>
                        </div>
                        <?php
                        $sql = "SELECT * FROM artists";
                        $run = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($run)>0){
                            while($data = mysqli_fetch_assoc($run)){
                        ?>
                        <!-- Single Artist -->
                        <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="100ms">
                            <div class="thumbnail">
                                <img src="<?php echo $data["image_artist"] ?>" alt="">
                            </div>
                            <div class="content-">
                                <p><?php echo $data["name"] ?></p>
                            </div>
                        </div>

                        <?php 
                    }
                    }?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Miscellaneous Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100 bg-img bg-overlay bg-fixed has-bg-img" style="background-image: url(img/bg-img/bg-2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading white wow fadeInUp" data-wow-delay="100ms">
                        <p>See what’s new</p>
                        <h2>Get In Touch</h2>
                    </div>
                </div>
            </div>
            <?php
include("shared/connection.php");
if(isset($_POST["reg_btn"])){
    $user_name = $_POST["user_name"];
    $user_email = $_POST["user_email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    

    $sql = "INSERT INTO subject(user_name, user_email, subject, message) VALUES('{$user_name}', '{$user_email}', '{$subject}', '{$message}')";
    $run = mysqli_query($conn, $sql);
    if($run){
        echo"<script>alert('register successfully')
        location.href='index.php'
        </script>";
    } 

}
?>
            <div class="row">
                <div class="col-12">
                <div class="login-form text-center mt-5">

<form action=""  method ="post" >
<div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="user_name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="user_email" placeholder="E-mail">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                    </div>
            <input class="btn btn-dark text-white" type="submit" value ="submit" name="reg_btn" ><BR>

        </form>
    
   
</form>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->
    <?php
include("shared/footer.php");
?>
