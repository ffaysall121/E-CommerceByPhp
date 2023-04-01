<?php include('include/header.php');
include('../middleware/adminmiddleware.php');
?>

<div class="container">
    <form action="code.php" method="POST" enctype="multipart/form-data">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Catagories</h4>
                </div>
                <div class="card-body">
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
                    <label for="">Description </label>
                    <textarea name="description"  rows="3" class="form-control"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                    <label for="">Meta title </label>
                    <input type="text" name="metaTitle" class="form-control">
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
                    <textarea name="MetaKeyWord"  rows="3" class="form-control"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                    <label for="">Upload Image </label>
                    <input type="file" name="image" class="form-control">
                    </div>
                </div>

                <div class="row">
                   <div class="col-md-4">
                   <label for="">Status </label>
                   <input type="checkbox" name="status"> 
                    </div>

                    <div class="col-md-4">
                   <label for="">Popular </label>
                    <input type="checkbox" name="popular">
                    </div>

                </div>

                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit" name="addCategoryBtn">Save</button>
                </div>

                </div>
                
            </div>

        </div>
    </div>
    </form>
</div>      

        <?php include('include/footer.php'); ?>