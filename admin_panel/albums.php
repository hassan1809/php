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
      <h1 class= "text-center">albums</h1>
      <a class="btn mdi mdi-code-tags" data-toggle="collapse" href="#collapse-table-1" role="button"
          aria-expanded="false" aria-controls="collapse-table-1"> </a>
      </div>

      <div class="card-body">
        <?php
        $sql = "SELECT * from albums";
        $run = mysqli_query($conn,$sql);
        if(mysqli_num_rows($run)>0){
            ?>
          
            <table class="table  table-bordered mt-5 w-100 m-auto ">
                <thead >
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>artist_id</th>
                        <th>relaese_year</th>
                        
                        <tr>
                            </thead>
                            <tbody>
                                <?php
                                while($row = mysqli_fetch_assoc($run)){
                                    ?>
                                    <tr>
                                        <td><?php echo $row["id"]?></td>
                                        <td><?php echo $row["title"]?></td>
                                        <td><?php echo $row["artist_id"]?></td>
                                        <td><?php echo $row["release_year"]?></td>
                                       
                                        <td>
                                            <a href="editalbum.php?id=<?php echo $row["id"] ?>" class= "btn btn-primary">edit</a>
                                            <a href="deletealbum.php?dit=<?php echo $row ["id"] ?>"class="btn btn-danger">delete</a>
    
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
        <a href="addalbum.php"><button class ="btn btn-dark text-light d-flex m-auto" >add new album</button></a>
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