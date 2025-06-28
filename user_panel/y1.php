  <?php
  include("shared/navbar.php");
include("shared/connection.php");
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
                  include("shared/navbar.php");
             ?>