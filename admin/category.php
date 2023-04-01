<?php include('include/header.php');
include('../middleware/adminmiddleware.php');
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
             <h4>Categories</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                  
                        <?php
                        $ctagry = getAll("catagories");
                        

                        if(mysqli_num_rows($ctagry)>0)
                        {
                            foreach ($ctagry as $item) {

                                ?>
                                <tr>
                                    <td><?=$item['id'];?></td>
                                    <td><?=$item['name'];?></td>
                                    
                                    <td>
                                    <img src="../uploads/<?=$item['image'];?>" alt="<?=$item['name'];?>" width="50px" height="50px">
                                </td>
                                    <td><?=$item['status']== '0'? 'visible':'Hidden' ;?></td>
                                    <td>
                                        <a href="editcat.php?id=<?=$item['id'];?>" class="btn btn-primary">Edit</a>
                                        <form action="code.php" method="POST" style="display: inline-block;">
                                            <input type="hidden" name="catID" value="<?=$item['id'];?>">
                                            <button type="submit" class="btn btn-danger" name="deleteCatBtn">DElete</button>
                                    </form>
                                       
                                    </td>
                                </tr>
                                
                                <?php
                            }

                        }

                        else{

                            echo "No Results Found";
                        }
                        
                        ?>
                     
                    </tbody>

                </table>
            </div>
        </div>
    </div>
  </div>
</div>      

<?php include('include/footer.php'); ?>