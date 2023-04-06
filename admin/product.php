<?php
include('../middleware/adminmiddleware.php');

include('include/header.php');
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" id="pTbl" >
             <h4>Product</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" >
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
                        $product = getAll("product");
                        

                        if(mysqli_num_rows($product)>0)
                        {
                            foreach ($product as $item) {

                        ?>
                                <tr>
                                    <td><?=$item['id'];?></td>
                                    <td><?=$item['name'];?></td>
                                    
                                    <td>
                                    <img src="../uploads/<?=$item['image'];?>" alt="<?=$item['name'];?>" width="50px" height="50px">
                                </td>
                                    <td><?=$item['status']== '0'? 'visible':'Hidden' ;?></td>
                                    <td>
                                        <a href="editProduct.php?id=<?=$item['id'];?>" class="btn btn-primary">Edit</a>
        
                                            <button type="submit" class="btn btn-danger deleteProductBtn" name="deleteProductBtn" value="<?=$item['id'];?>">DElete</button>
                                   
                                       
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