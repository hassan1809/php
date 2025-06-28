<?php
include("shared/navbar.php");
include("shared/connection.php");

?>
<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <p>See what’s new</p>
            <h2>Latest Albums</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Album Catagory Area Start ##### -->
    <section class="album-catagory section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    
                </div>
            </div>

            <div class="row oneMusic-albums">
            <?php
                        $sql = "SELECT * FROM albums INNER JOIN artists ON albums.artist_id = artists.id";
                        $run = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($run)>0){
                            while($data = mysqli_fetch_assoc($run)){
                        ?>
                <!-- Single Album -->
             <a href="songs.php?id=<?php echo $data["artist_id"] ?>">
                   <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item t c p">
                    <div class="single-album">
                        <img src="<?php echo $data["image_artist"] ?>" alt="">
                        <div class="album-info">
                            <a href="#">
                                <h5><?php echo $data["title"] ?></h5>
                            </a>
                            <p><?php echo $data["name"] ?></p>
                        </div>
                    </div>
                </div>
             </a>
                <?php
                            }
                        }
                ?>

              
            </div>
        </div>
    </section>    
    <!-- ##### Album Catagory Area End ##### -->

  
   

    <!-- ##### Song Area Start ##### -->
     
    <div class="one-music-songs-area mb-70">
        <div class="container">
            <div class="row">
                <?php
                        $sql = "SELECT * FROM media";
                        $run = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($run)>0){
                            while($data = mysqli_fetch_assoc($run)){
                        ?>


                <!-- Single Song Area -->
                <div class="col-12">
                    <div class="single-song-area mb-30 d-flex flex-wrap align-items-end">
                        <div class="song-thumbnail">
                            <img src="<?php echo $data["thumbnail_path"] ?>" alt="">
                        </div>
                        <div class="song-play-area">
                            <div class="song-name">
                                <p><?php echo $data["title"] ?></p>
                            </div>
                            <audio preload="auto" controls>
                                <source src="<?php echo $data["file_path"] ?>">
                            </audio>
                        </div>
                    </div>
                </div>

               
<?php
                            }
                        }
?>
            </div>
        </div>
    </div>
    <!-- ##### Song Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100 bg-img bg-overlay bg-fixed has-bg-img" style="background-image: url(img/bg-img/bg-2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading white">
                        <p>See what’s new</p>
                        <h2>Get In Touch</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Contact Form Area -->
                    <div class="contact-form-area">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" placeholder="E-mail">
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
                                </div>
                                <div class="col-12 text-center">
                                    <button class="btn oneMusic-btn mt-30" type="submit">Send <i class="fa fa-angle-double-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->
    <?php
include("shared/footer.php");
?>