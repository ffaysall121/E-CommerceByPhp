<?php
session_start();
include('../config/connectDB.php');
include('../function/function.php');

if(isset($_POST['addCategoryBtn']))
{
    $name=$_POST['name'];
    $description=$_POST['description'];
    $slug=$_POST['slug'];
    $metaTitle=$_POST['metaTitle'];
    $metaDescription=$_POST['metaDescription'];
    $MetaKeyword=$_POST['MetaKeyWord'];
    $status=isset($_POST['status']) ? '1':'0';
    $popular=isset($_POST['popular']) ? '1':'0';

    $image =$_FILES['image']['name'];
    $path = "../uploads";
    $image_ext=pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;
  
   

    $catSql = "INSERT INTO catagories(name,slug,description,meta_title,meta_description,meta_keywords,status,popular,image)
    VALUES ('$name','$slug','$description','$metaTitle','$metaDescription','$metaKeyword','$status','$popular','$filename')
    ";
    $runCatSql= mysqli_query($connection,$catSql);

    if($runCatSql)
    {
       move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$filename) ;
       redirect('catagories added successfully','category.php');
    }
    else{
        redirect('Something went wrong','addCatagorie.php');
    }

}



else if(isset($_POST['updateCategoryBtn']))
{
    $catID=$_POST['catID'];
    $name=$_POST['name'];
    $description=$_POST['description'];
    $slug=$_POST['slug'];
    $metaTitle=$_POST['metaTitle'];
    $metaDescription=$_POST['metaDescription'];
    $MetaKeyword=$_POST['MetaKeyWord'];
    $status=isset($_POST['status']) ? '1':'0';
    $popular=isset($_POST['popular']) ? '1':'0';

    $newImage =$_FILES['image']['name'];
    $oldImage =$_POST['oldImage'];

    if($newImage !=""){
        
        $image_ext=pathinfo($newImage, PATHINFO_EXTENSION);
        $newImage = time().'.'.$image_ext;
      
                                          
    }
    else
    {
        $newImage =$oldImage;
    }

    $upCatSql = "UPDATE catagories SET name='$name',slug='$slug',description='$description',meta_title='$metaTitle',meta_description='$metaDescription',meta_keywords='$metaKeyword',status='$status',popular='$popular',image='$newImage' WHERE id ='$catID'";

    $runUpCatSql=mysqli_query($connection,$upCatSql);

    if($runUpCatSql)
    {
     if($_FILES['image']['name'] != "")
     
     {
        move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/'.$newImage);
        if(file_exists('../uploads/'.$newImage))
        {
            unlink('../uploads/'.$oldImage);
        }

        redirect('Update Info successfully','category.php?id=$category');
      
    }
    else{
        redirect('Something went wrong','editcat.php');
    }
}
}

else if(isset($_POST['deleteCatBtn']))
{

    $catID =mysqli_real_escape_string($connection,$_POST['catID']);
    $categoryInfo = "SELECT * FROM catagories WHERE id = '$catID'";
    $runCat = mysqli_query($connection, $categoryInfo);
    $getData = mysqli_fetch_array($runCat);
    $catImg = $getData['image'];
   
    $deleteCatSql ="DELETE FROM catagories where id = '$catID'";

    $runDeleteCatSql = mysqli_query($connection,$deleteCatSql);

    if($runDeleteCatSql){
        if(file_exists('../uploads/'.$catImg))
        {
            unlink('../uploads/'.$catImg);
            redirect('Category delete successfully','category.php');
        }
        
        else{
            redirect('Something went wrong','category.php');
        }

    }
 
}

// id	name	slug	description	status	popular	image	meta_title	meta_description	meta_keywords	created_at
?>