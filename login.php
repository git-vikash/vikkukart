<?php 
session_start();
if(isset($_SESSION['id'])){
    ?>  <script>
            alert('Your are already login.');
            window.open('index.php','_self');
        </script> <?php
    }
?> 

<!DOCTYPE html>

<html>
    <head>
        <title>Login Please</title>
        
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
            .pan{ margin-top: 80px;}
            footer{
                padding-top: 5px ;
                background-color:black;
                width:100%;
                color: #9d9d9d;
                 margin-bottom: -5px;
             }
             .logo{margin-top: -5px;}
        </style>
    </head>
    <body><?php include 'includes/header.php';?>
         
        <div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3 pan">
        <div class="panel panel-primary">
            
            <div class="panel-heading ">
                <h3>LOGIN</h3>
            </div>
            <div class="panel-body">
                <p class="text-warning">Login to make a purchase</p>
                
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <label for="uemail">Email</label>
                        <input type="email" name="uemail" placeholder="Enter your email" value="<?php if(isset($_POST['submit'])){echo $_POST['uemail'];}?>" class="form-control" required="require">
                    </div>
                    <div class="form-group">
                        <label for="upassword">Password</label>
                        <input type="password" name="upassword" placeholder="Enter password" value="<?php if(isset($_POST['submit'])){echo $_POST['upassword'];}?>" class="form-control" required="require">
                    </div>
                    <div class="form-group"></div>
                    <input type="submit" name="submit" value="Login" class="btn btn-primary btn-block">
                </form>
            </div>
            <div class="panel-footer">
                <center><p>Don't have an account? <br><a href="signup.php">Register Now</a></p></center>
            </div>
            </div>
        </div>
        <footer class="navbar-fixed-bottom ">
            <div class="container foot_contr ">
                <center> <p>Copyright &copy; Vikku Store. All Rights Reserved | Contact Us: +987654321</p></center>
            </div>
        </footer>
    </body>
</html>

<?php 
include 'includes/login-submit.php';   // Login- submit page inclusion that contain php codes.
?>