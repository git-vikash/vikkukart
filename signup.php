<?php 
include 'includes/common.php';
if(isset($_SESSION['id'])){
  ?>
    <script>
            alert('You are already loged in! Please logout for new registration.');
            window.open('index.php','_self');
        </script>
    <?php  
   
    }
?> 

<!DOCTYPE html>

<html>
    <head>
        <title>New Registration</title>
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
            .frm{ margin-top: 60px; }
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
    <body>
        <?php
include 'includes/header.php';
        ?>
        <div class="container">
        <div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3 frm jumbotron">
            <form action="signup.php" method="POST" ><center><p><b>Register Here</b></p></center>
                <div class="form-group">
                <label for="name"> Name</label>
                <input type="text" name="uname" placeholder="Enter your name" value="<?php if(isset($_POST['submit'])){echo $_POST['uname'];}?>" class="form-control" required="require">
                </div>
                <div class="form-group">
                        <label for="uemail">Email</label>
                        <input type="email" name="uemail" placeholder="Enter your email" value="<?php if(isset($_POST['submit'])){echo $_POST['uemail'];}?>" class="form-control" required="require">
                    </div>
                <div class="form-group">
                        <label for="upassword">Password</label>
                        <input type="password" name="upassword" placeholder="Make a password" value="<?php if(isset($_POST['submit'])){echo $_POST['upassword'];}?>"class="form-control" required="require">
                    </div>
                <div class="form-group">
                        <label for="ucontact">Contact</label>
                        <input type="text" name="ucontact" placeholder="Contact number" value="<?php if(isset($_POST['submit'])){echo $_POST['ucontact'];}?>"class="form-control" required="require">
                    </div>
                
                <div class="form-group">
                        <label for="ucity">City</label>
                        <input type="text" name="ucity" placeholder="City name" value="<?php if(isset($_POST['submit'])){echo $_POST['ucity'];}?>"class="form-control" required="require">
                    </div>
                <div class="form-group">
                        <label for="uaddress">Address</label>
                        <input type="text" name="uaddress" placeholder="Your address" value="<?php if(isset($_POST['submit'])){echo $_POST['uaddress'];}?>" class="form-control" required="require">
                    </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Register" class="form-control btn btn-primary" required="require">
                    </div>
            </form>
        </div>
        </div>
        <?php
            include 'includes/footer.php';
        ?>
    </body>
</html>

<?php
include 'includes/signup-submit.php';
?>