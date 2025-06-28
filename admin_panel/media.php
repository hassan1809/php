<?php
  include("shared/header.php");
  include("shared/sidebar.php");
  include("shared/nav.php");
  include("shared/connection.php");


  ?>
  
  
  
 
 <div class="content-wrapper">
       


<div class="row">
  <div class="col">
    <!-- Basic Table-->
    <div class="card card-default">
      <div class="card-header">
      <h1 class= "text-center">media</h1>
      <a class="btn mdi mdi-code-tags" data-toggle="collapse" href="#collapse-table-1" role="button"
          aria-expanded="false" aria-controls="collapse-table-1"> </a>
      </div>

      <div class="card-body">
        <?php
        $sql = "SELECT * from media";
        $run = mysqli_query($conn,$sql);
        if(mysqli_num_rows($run)>0){
            ?>
          
            <table class="table  table-bordered mt-5 w-100 m-auto ">
                <thead >
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>type</th>
                        <th>artist_id</th>
                        <th>album_id</th>
                        <th>language_id</th>
                        <th>genre_id</th>
                        <th>year</th>
                        <th>file_path</th>
                        <th>thumbnail_path</th>
                        <tr>
                            </thead>
                            <tbody>
                                <?php
                                while($row = mysqli_fetch_assoc($run)){
                                    ?>
                                    <tr>
                                        <td><?php echo $row["id"]?></td>
                                        <td><?php echo $row["title"]?></td>
                                        <td><?php echo $row["type"]?></td>
                                        <td><?php echo $row["artist_id"]?></td>
                                        <td><?php echo $row["album_id"]?></td>
                                        <td><?php echo $row["language_id"]?></td>
                                        <td><?php echo $row["genre_id"]?></td>
                                        <td><?php echo $row["year"]?></td>
                                        <td><?php echo $row["file_path"]?></td>
                                        <td><?php echo $row["thumbnail_path"]?></td>
                                        <td>
                                            <a href="editmedia.php?id=<?php echo $row["id"] ?>" class= "btn btn-primary">edit</a>
                                            <a href="deletemedia.php?dit=<?php echo $row ["id"] ?>"class="btn btn-danger">delete</a>
    
                                        </td>
    
                                </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                                </table>
                                </div>
                                <?php
                                
                                
        }
        mysqli_close($conn);
        ?>
        <div class="container mt-5">
        <a href="addmedia.php"><button class ="btn btn-dark text-light d-flex m-auto" >add media

        </button></a>
    </div>
        
        
      </div>

      
    </div>
    </div>
    </div>
    </div>
    </div>
    


                    <?php
  include("shared/footer.php");
  ?>