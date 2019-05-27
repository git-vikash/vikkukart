<?php
session_start();
$con= mysqli_connect('localhost', 'root', '', 'store') or die(mysqli_error($con));
if(isset($_SESSION['id'])){
$user_id=$_SESSION['id'];

$qry="SELECT  `name` FROM `users` WHERE id='$user_id'";
$run= mysqli_query($con, $qry);

if(mysqli_num_rows($run)>=1){
    while ($data = mysqli_fetch_array($run)) {
        $user_name=$data['name'];
    }
}
}
$qery="SELECT  DISTINCT(`category`) FROM `items`";
$run2= mysqli_query($con, $qery) or die(mysqli_error($con));


?>


<!DOCTYPE html>
<html>
    <head>
        <title>Welcome | Home page</title>
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
            #banner_image{
                padding-top:75px;     
                padding-bottom: 50px;
                text-align: center;
                color: green;
                background: url('image/logo/photo1.jpg') no-repeat center ;
                background-size: cover;
                margin-bottom: 25px;
                min-height: 600px;
            }
            #banner_content{
                position:relative;
                padding-top: 16px;
                padding-bottom: 26px;
                margin-top: 160px;
                margin-bottom: 12%;
                margin-left: auto;
                margin-right: auto;
                background-color:rgba(0,0,0,0.7);
                max-width: 560px;
                width: 80%;
                max-height: 200px;
            }
            footer{
               padding-top: 5px ;
                background-color:black;
                width:100%;
                color: #9d9d9d;
                margin-bottom: -5px;
                
            }
            a:hover{ text-decoration: none;}
            
            .bdy{ background-color: #b9def0;padding-top: 15px; }
            #banner{ font-family:cursive;color: white; }
            .logo{margin-top: -5px;}            
            
            
            
        </style>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header ">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNav">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <a href="index.php" class="navbar-brand"><img src="image/logo/logo1.jpg" height="30" width="30" class="img-responsive img-rounded logo"></a>
                    
                </div>
                <div class="collapse navbar-collapse" id="myNav">
                    <ul class="nav navbar-nav navbar-right">
                        
                        <?php 
                        if(isset($_SESSION['id'])){ ?>
                        <li><a href="setting.php"> Welcome <?php echo ucwords($user_name);?></a></li>
                            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out "></span>&nbsp;Logout</a></li>
                            <?php
                        }
                        else{
                            ?>
                            <li><a href="login.php"><span class="glyphicon glyphicon-log-in "></span>&nbsp;Login</a></li>
                            <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span>&nbsp;SignUp</a></li>
                    
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div id="banner_image">
             <div id="banner_content" >
                <div id="banner"><h2>We are best in Fashion sale!</h2><p>Flat 100% off on premium brands</p></div>
                <a href="product.php" class="btn btn-danger btn-lg active">Shop Now</a>
            </div>
        </div>
    
        <div class="bdy ">
        <div class="container">
            <div class="row"><center>
            <?php   if(mysqli_num_rows($run2)>0){
                    while ($data2= mysqli_fetch_array($run2)){
                            $image=$data2['category']; 
                    ?>
                    <div class="col-sm-3 col-xs-6">
                        <div class="thumbnail">
                            <a href="product.php">
                            <img src="image/item_category_image/<?php echo $image;?>.jpg" alt="<?php echo $data2['category'];?>">
                            <div class="caption"><h3><?php echo $data2['category'];?></h3><p>Watches from top brands like Titan, HMT,Rolex .</p> </div>
                            </a>
                        </div>
                    </div>
                    <?php
                    }
                  }
                ?>
               </center> </div>
        </div>
        </div>
        
            <?php include 'includes/footer.php'; ?>
        
    </body>
</html>
 
