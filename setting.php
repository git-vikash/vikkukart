<?php 
session_start();
if(!isset($_SESSION['id'])){
    ?>
        <script>
            alert('Please Login first!');
            window.open('index.php','_self');
        </script>
    <?php
    }
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Settings</title>
        
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
            .cont{ margin-top: 100px;  }
            footer{
                padding-top: 5px ;
                background-color:black;
                width:100%;
                color: #9d9d9d;
                margin-bottom: -5px;
               }
               .hov{color:blue;}
               .hov:hover,.frm:hover{ text-decoration: none; color: white;background-color: #2aabd2;}
            .logo{margin-top: -5px;}
        </style>
    </head>
    <body>
        <?php
      include 'includes/header.php';
        ?>

        <div class="container cont">
            <a href="change_pass.php" class="hov no"><div class=" col-xs-5 jumbotron frm "><h3>Change Password</h3></div></a>
            <a href="change_detail.php" class="hov no"><div class=" col-xs-5 col-xs-offset-2 jumbotron frm"> <h3>Change Details</h3></div></a>
        </div>
                
        <footer class=" navbar-fixed-bottom">
            <div class="container  ">
                <center> <p>Copyright &copy; Vikku Store. All Rights Reserved | Contact Us: +987654321</p></center>
            </div>
        </footer>
    </body>
</html>
