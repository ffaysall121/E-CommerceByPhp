<?php 
include('../middleware/adminmiddleware.php');
include('include/header.php');

?>

<div class="container">
    <form action="code.php" method="POST" enctype="multipart/form-data">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Product</h4>
                </div>
                <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                    <select class="form-select" aria-label="Default select example" name="cId">
                        <option selected>Select</option>
                        
                        <?php
                            $category = getAll('catagories');
                            if (mysqli_num_rows($category)>0) 
                            {

                                foreach($category as $item)
                                {
    
                            ?>
                            <option value="<?=$item['id'] ?>" ><?=$item['name'] ?></option>
                            <?php
                        
                            }

                            }
                            else
                            {
                                echo"No catagories available";
                            }
                            
                            ?>
                               
                           

                        <label for="">Select Category </label>
                        
                    </select>
                </div>
                <div class="col-md-6">
                   <label for="">Trending </label>
                    <input type="checkbox" name="trending">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                    <label for="">Name </label>
                    <input type="text" name="name" class="form-control">
                    </div>
                   <div class="col-md-6">
                   <label for="">Slug </label>
                    <input type="text" name="slug" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <label for="">Small Description</label>
                    <textarea name="smallDescription"  rows="3" class="form-control"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                    <label for="">Description </label>
                    <textarea name="description"  rows="3" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-4">
                   <label for="">Original Price </label>
                    <input type="number" name="orginalPrice" class="form-control">
                </div>

                <div class="col-md-4">
                   <label for="">Selling Price </label>
                    <input type="number" name="sellingPrice" class="form-control">
                </div>

                <div class="col-md-4">
                   <label for="">quantity</label>
                    <input type="number" name="qnty" class="form-control">
                </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                    <label for="">Meta title </label>
                    <input type="text" name="meteTitle" class="form-control">
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                    <label for="">Meta Description </label>
                    <textarea name="metaDescription"  rows="3" class="form-control"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                    <label for="">Meta KeyWord </label>
                    <textarea name="metaKeywords"  rows="3" class="form-control"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                    <label for="">Upload Image </label>
                    <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <div class="selectBox">
                        <label for="">Status </label>
                        <input type="checkbox" name="status"> 
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit" name="addProduct">Add Product</button>
                </div>

                </div>
                
            </div>

        </div>
    </div>
    </form>
</div>      
    <!-- id	categorieID	name	slug	smlDescription	description	orginalPrice	sellingPrice	image	qnty	status	tranding	meteTitle	metaKeywords	metaDescription	createdAt	 -->

<?php include('include/footer.php'); ?>