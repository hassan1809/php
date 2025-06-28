

<?php
include("shared/navbar.php");
include("shared/connection.php");

?>
<!-- ##### Breadcumb Area Start ##### -->
  <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="bradcumbContent">
            <p>See what’s new</p>
            <h2>Song List</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100-0">
        <div class="container">
            
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-0-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <p>See what’s new</p>
                        <h2>Get In Touch</h2>
                    </div>
                </div>
            </div>

            <div class="row bg_black">
                <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="150ms">
                            <div class="first-part d-flex align-items-center">
                                <div class="thumbnail">
                    <?php $artistId = $_GET["id"];

                        $sql = "SELECT * FROM media WHERE artist_id = artist_Id";
                        $run = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($run)>0){
                            while($data = mysqli_fetch_assoc($run)){
                        ?>
                        <img src="<?php echo $data["thumbnail_path"] ?>" alt="">
                                <ul>
                                <li><?php echo $data["title"]?></li>
                            </ul>
                        </div>
                        <?php
                            }
                        }
                        ?>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->
    <?php
include("shared/footer.php");
?>
