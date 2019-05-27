<?php
include 'includes/common.php';
include'includes/check-if-added.php';
$qery="SELECT  DISTINCT(`category`) FROM `items`";
$run= mysqli_query($con, $qery) or die(mysqli_error($con));
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Latest Collection</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- link for bootstrap,jquery,javascript  -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <!-- offline bootstrap files --> 
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="icon" href="image/logo/logo1.jpg" type="image/gif" sizes="16x16">
        <style>
            .cont{ margin-top: 50px; background-color: #bce8f1;padding-top: 20px;}
            footer{
                padding-top: 5px ;
                background-color:black;
                width:100%;
                color: #9d9d9d;
                margin-bottom: -5px;
               }
             .item_bar{ background-color: brown;padding-bottom: 40px;padding-top: 10px;}
             .itm{color:white;margin-bottom: 40px;}
             .logo{margin-top: -5px;}
             .img1{max-width:100px; max-height: 140px;}
             .thumb{ height: 280px;}
             
           
        </style> <!-- .row{position:sticky;top: 0;}-->
    </head>
    <body>
         <?php
            include'includes/header.php';
         ?>
        <div class="cont">
        <div class="container  ">
            <div class="jumbotron"><center>
                <h1>Welcome to our Fashion Store!</h1>
                <p>We have the best cameras, watches and shirts for you. No need to hunt around, we have all at one places.</p>
                </center>
            </div>
            <?php if(mysqli_num_rows($run)>0){                  // this loop is for fetching all category of items
                    while ($data= mysqli_fetch_array($run)){
                       $category= $data['category'];                     // for using category type in inner select query in while loop.
                    ?>
                    <div class="row ">
                    <center>
                        <div class="item_bar "><h3 class="itm"><?php echo "Best ".$data['category']."s";?> </h3>
                        <?php 
                         include 'includes/product_items.php';
                        ?>
                        </div>
                    </center>
                    </div> 
                    <?php 
                    }
                  }
            ?>
        </div>
        </div>
        <?php include 'includes/footer.php';?>
    </body>
</html>
