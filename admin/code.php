<?php
include('../middleware/adminmiddleware.php');


if(isset($_POST['addCategoryBtn']))
{
    $name=$_POST['name'];
    $description=$_POST['description'];
    $slug=$_POST['slug'];
    $metaTitle=$_POST['metaTitle'];
    $metaDescription=$_POST['metaDescription'];
    $metaKeyword=$_POST['MetaKeyWord'];
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

             
            
            }
            redirect('Update Info successfully','category.php?id=$category');
   }
   else{
    redirect('Something went wrong','editcat.php');
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

    if($runDeleteCatSql)
    {
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


else if(isset($_POST['addProduct']))
{
    
    $cId=$_POST['cId'];
    $name=$_POST['name'];
    $slug=$_POST['slug'];
    $smallDescription=$_POST['smallDescription'];
    $description=$_POST['description'];
    $orginalPrice=$_POST['orginalPrice'];
    $sellingPrice=$_POST['sellingPrice'];
    $quantity=$_POST['qnty'];
    $status=isset($_POST['status']) ? '1':'0';
    $trending=isset($_POST['trending']) ? '1':'0';
    $metaTitle=$_POST['meteTitle'];
    $metaDescription=$_POST['metaDescription'];
    $metaKeyword=$_POST['metaKeywords'];

    $image =$_FILES['image']['name'];
    $path = "../uploads";
    $image_ext=pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;
  
   

    $addProductSql = "INSERT INTO product(categorieID,name,slug	,smlDescription,description,orginalPrice,sellingPrice,qnty,status,tranding,meteTitle,metaKeywords,metaDescription,image)
    VALUES ('$cId','$name','$slug','$smallDescription','$description','$orginalPrice','$sellingPrice','$quantity','$status','$trending','$metaTitle','$metaKeyword','$metaDescription','$filename')
    ";
    $runAddProductSql= mysqli_query($connection,$addProductSql);

    if($runAddProductSql)
    {
       move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$filename) ;
       redirect('catagories added successfully','addProduct.php');
    }
    else{
        redirect('Something went wrong','addProduct.php');
    }

}

else if(isset($_POST['updateProductButton']))
{
    $pId=$_POST['pId'];
    $cId=$_POST['cId'];
    $name=$_POST['name'];
    $slug=$_POST['slug'];
    $smallDescription=$_POST['smallDescription'];
    $description=$_POST['description'];
    $orginalPrice=$_POST['orginalPrice'];
    $sellingPrice=$_POST['sellingPrice'];
    $quantity=$_POST['qnty'];
    $status=isset($_POST['status']) ? '1':'0';
    $trending=isset($_POST['trending']) ? '1':'0';
    $metaTitle=$_POST['meteTitle'];
    $metaDescription=$_POST['metaDescription'];
    $metaKeyword=$_POST['metaKeywords'];

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

    $updateProductSql = "UPDATE product SET categorieID='$cId',name='$name',slug='$slug',smlDescription='$smallDescription',description='$description',	orginalPrice='$orginalPrice',sellingPrice=' $sellingPrice',qnty='$quantity',status='$status',tranding='$trending',meteTitle='$metaTitle',metaKeywords='$metaKeyword',metaDescription='$metaDescription',image='$newImage' WHERE id ='$pId'";

    $runUpdateProductSql=mysqli_query($connection, $updateProductSql);

    if($runUpdateProductSql)
    {

     if($_FILES['image']['name'] != "")
     
     {
        move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/'.$newImage);
        if(file_exists('../uploads/'.$newImage))
        {
            unlink('../uploads/'.$oldImage);
           
        }  
     }
     
     redirect('Update Info successfully','product.php');

    }
    else{
        redirect('Something went wrong','editProduct.php');
    }
}

else if(isset($_POST['deleteProductBtn']))
{

    $pId =mysqli_real_escape_string($connection,$_POST['pId']);
    $productInfo = "SELECT * FROM product WHERE id = '$pId'";
    $runSql = mysqli_query($connection, $productInfo);
    $getData = mysqli_fetch_array($runSql);
    $productImage = $getData['image'];
   
    $deleteProductSql ="DELETE  FROM product where id = '$pId'";

    $rundeleteProductSql = mysqli_query($connection,$deleteProductSql);

    if($rundeleteProductSql)
    {
        if(file_exists('../uploads/'.$productImage))
        {
            unlink('../uploads/'.$productImage);
            // redirect('Product delete successfully','product.php');
            echo 10;
        }
        
        else{
            // redirect('Product went wrong','product.php');
            echo 20;
        }

    }
    
 
}

// id	name	slug	description	status	popular	image	meta_title	meta_description	meta_keywords	created_at

// <!-- id	categorieID	name	slug	smlDescription	description	orginalPrice	sellingPrice	image	qnty	status	tranding	meteTitle	metaKeywords	metaDescription	createdAt	|| -->

?>