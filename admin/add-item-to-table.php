<?php
include '../includes/common.php';

function test($input){
    $con= mysqli_connect('localhost', 'root', '', 'store') or die(mysqli_error($con));
    $input= trim($input);
    $input= stripslashes($input);
    $input= htmlspecialchars($input);
    $input= mysqli_real_escape_string($con,$input);
    return $input;
}
?>
<html>
    <head>
        <title>Admin | Add New items</title>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- link for bootstrap,jquery,javascript  -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <!-- offline bootstrap files --> 
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="../bootstrap/js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
        <link rel="icon" href="../image/logo/logo1.jpg" type="image/gif" sizes="16x16">
        <style>
             .frm{ margin-top: 60px; }
            footer{
                padding-top: 5px ;
                background-color:black;
                width:100%;
                color: #9d9d9d;
               }
             .foot_contr{  margin-bottom: -5px;}
             
        
           
            a:hover{ text-decoration: none;}
            
            .bdy{ background-color: #b9def0;padding-top: 15px; }
            #banner{ font-family:cursive;color: white; }
            .logo{margin-top: -5px;}            
            .lrg{font-size: 25px; font-family:sans-serif;}
            .welcome{ float: right;}
            
        </style>
    </head>
    <body>
        
         <nav class="navbar navbar-inverse  ">
            <div class="container">
                <div class="navbar-header">
                    <a href="index.php" class="navbar-brand"><img src="../image/logo/logo1.jpg" height="30" width="30" class="img-responsive img-rounded logo"></a>
                </div>
            </div>
</nav>
        
       
    <div class="container">
        <div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3 frm jumbotron">
            <form action="add-item-to-table.php" method="post" enctype="multipart/form-data"><center><p><b>Add New Items</b></p></center>
                <div class="form-group">
                <label for="iname"> Name</label>
                <input type="text" name="iname" placeholder="Enter item name" class="form-control" required="require">
                </div>
                <div class="form-group">
                        <label for="iprice">Price</label>
                        <input type="number" name="iprice" placeholder="Enter price" class="form-control" required="require" min="0"max="100000">
                    </div>
                
                <div class="form-check">
                    <label class="form-check-label">Category<br>
                        <input type="radio" class="form-check-input" name="category" value="watch">Watch
                    </label>
                
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="category" value="camera">Camera
                    </label>
                
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="category" value="shirt">Shirt
                    </label>
                
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="category" value="photo">Photo
                    </label>
                </div>
                
                <div class="form-group">
                        <label for="iimage">Category Image</label>
                        <input type="file" name="iimage" placeholder="Contact number" class="form-control" required="require">
                    </div>
                
                <div class="form-group">
                    <input type="submit" name="submit" value="Add" class="form-control btn btn-primary" required="require">
                    </div>
            </form>
        </div>
        </div>
       
       
    </body>
   
    <footer class="nav">
        <div class="container  ">
            <center> <p>Copyright &copy; Vikku Store. All Rights Reserved | Contact Us: +987654321</p></center>
        </div>
    </footer>
</html>
    
<?php

if(isset($_POST['submit'])){
$name=$price=$category=$image=$tempimage="";


$name=test($_POST['iname']);      
$name= filter_var($name,FILTER_SANITIZE_STRING);
if(!preg_match("/^[a-zA-Z]*$/", $name)){  ?>
            <script>
                alert('Invalid name! Include only letters and spaces ');
            </script> 
            <?php 
            die(); }

$category=test($_POST['category']);  

$price=test($_POST['iprice']);          //use some validation for this also
/*if(filter_var($price, FILTER_VALIDATE_INT)===0 || !filter_var($price, FILTER_VALIDATE_INT)===FALSE){
    
            $flag=1;
}  
else{?>
            <script>
                alert('Price is not valid integer! ');
            </script> 
            <?php }  */
       

//image validation and checking============================
$image=$_FILES['iimage']['name']; 
$tempimage=$_FILES['iimage']['tmp_name'];

$path="../image/item_photos/$image";                //$target_file=$target_dir.basename($image);echo $target_file."3<br>";
                        
$uploadok=1;
$imageFileType= strtolower( pathinfo($path,PATHINFO_EXTENSION));
$check= getimagesize($tempimage);
if($check==TRUE){
    if($_FILES['iimage']['size']<200000){
        if($imageFileType!='jpg' && $imageFileType!='png' && $imageFileType!='gif' && $imageFileType!='jpeg'){
            $uploadok=0;
            ?>
            <script>
                alert('Sorry, Only JPG, PNG, GIF, JPEG are allowed! ');
            </script> 
            <?php 
        }
        else { 
            $uploadok=1;echo $imageFileType;
        }
    } 
    else {
           $uploadok=0;
            ?>
            <script>
                alert('Image size should be less than 200kB');
            </script> 
            <?php     
         }
} 
else{
    $uploadok=0;
    ?>
    <script>
        alert('File is not an image!');
    </script> 
    <?php 
}
 
if($uploadok==1 ){
move_uploaded_file($tempimage, "../image/item_photos/$image");

$qry= "INSERT INTO `items`(`name`, `price`, `category`, `category_image`) VALUES ('$name','$price','$category','$image')";
$run= mysqli_query($con, $qry)or die(mysqli_error($con));

echo $qry;
if($run==TRUE){      
    ?>
    <script>
        alert('One item added to database.');
        
    </script> 
    <?php  
    }
  }
}
?>