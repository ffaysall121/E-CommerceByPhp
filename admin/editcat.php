<?php include('include/header.php');
include('../middleware/adminmiddleware.php');
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
        <?php 
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $category = getById("catagories",$id);

        if(mysqli_num_rows($category) > 0){
            $data = mysqli_fetch_array($category);
        ?>
       
       <form action="code.php" method="POST" enctype="multipart/form-data">
    <div class="row">
            <input type="hidden" name="catID" value="<?= $data['id'] ?>">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Catagories</h4>
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                    <label for="">Name </label>
                    <input type="text" value="<?= $data['name']?>" name="name" class="form-control">
                    </div>
                   <div class="col-md-6">
                   <label for="">Slug </label>
                    <input type="text" value="<?= $data['slug']?>" name="slug" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                    <label for="">Description </label>
                    <textarea name="description"   rows="3" class="form-control"> <?= $data['description']?> </textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                    <label for="">Meta title </label>
                    <input type="text" name="metaTitle"  value="<?= $data['meta_title']?>" class="form-control">
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                    <label for="">Meta Description </label>
                    <textarea name="metaDescription"  rows="3" class="form-control"><?=$data['meta_description']?></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                    <label for="">Meta KeyWord </label>
                    <textarea name="MetaKeyWord" rows="3" class="form-control"><?=$data['meta_keywords']?></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                    <label for="">Upload Image </label>
                    <input type="file" name="image" class="form-control"><span>current image</span>
                    <img src="../uploads/<?= $data['image']?>" alt="" width="100px" height="100px">
                    <input type="hidden" name="oldImage" value="<?= $data['image']?>">
                    </div>
                </div>

                <div class="row">
                   <div class="col-md-4">
                   <label for="">Status </label>
                   <input type="checkbox" <?=$data['status'] ? "checked":"" ?> name="status"> 
                    </div>

                    <div class="col-md-4">
                   <label for="">Popular </label>
                    <input type="checkbox" <?=$data['popular'] ? "checked":""  ?> name="popular">
                    </div>

                </div>

                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit" name="updateCategoryBtn">Update Info</button>
                </div>

                </div>
                
            </div>

        </div>
    </div>
    </form>
        <?php
        }
    }
    else{
        echo "Something went wrong";
    }
    ?>
    </div>
  </div>
</div>      

<?php include('include/footer.php'); ?>
<!-- id	name	slug	description	status	popular	image	meta_title	meta_description	meta_keywords	created_at -->
