<?php 
session_start();
if(!isset($_SESSION['id'])){
    ?>
        <script>
            alert('Please Login !!');
            window.open('index.php','_self');
        </script>
    <?php
    
    }
 
?> 

<!DOCTYPE html>
<html>
    <head>
        <title>Setting | Change Password</title>
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
            .logo{margin-top: -5px;}
        </style>
    </head>
    <body>
        <?php
        include 'includes/header.php';
        ?>
        
        <div class="container cont">
        <div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3 frm jumbotron">
            <form action="change_pass.php" method="POST">
                <center><p><b>Change Password</b></p></center>
                <div class="form-group">
                    <label for="oldpassword">Old Password</label>
                    <input type="password" name="oldpassword" placeholder="Old password" class="form-control" required="require">
                </div>
                <div class="form-group">
                    <label for="newpassword">New Password</label>
                    <input type="password" name="newpassword" placeholder="New password" class="form-control" required="require">
                </div>
                <div class="form-group">
                    <label for="renewpassword">Re-type New Password</label>
                    <input type="password" name="renewpassword" placeholder="Re-type New password" class="form-control" required="require">
                </div>
                <div class="form-group">
                    
                    <input type="submit" name="submit" value="Change" class="form-control btn btn-primary">
                </div>
            </form>
        </div>
        </div>
                
        <footer class=" navbar-fixed-bottom">
            <div class="container  ">
                <center> <p>Copyright &copy; Vikku Store. All Rights Reserved | Contact Us: +987654321</p></center>
            </div>
        </footer>
    </body>
</html>

<?php

if(isset($_POST['submit'])){
   
$con= mysqli_connect('localhost', 'root', '', 'store') or die(mysqli_error($con));
    
    $oldpassword=$_POST['oldpassword'];
        $oldpassword = $_POST['oldpassword']; if(strlen($oldpassword)>8){ $oldpassword= md5($oldpassword);}
    $newpassword=$_POST['newpassword'];
        $newpassword = $_POST['newpassword']; if(strlen($newpassword)>8){ $newpassword= md5($newpassword);}
    
    $renewpassword=$_POST['renewpassword'];
        $renewpassword = $_POST['renewpassword']; if(strlen($renewpassword)>8){ $renewpassword= md5($renewpassword);}
    
    $id= $_SESSION['id'];         //echo $id ;
    
    $sql_id="SELECT `id` FROM `users` WHERE `id`='$id' AND `password`='$oldpassword'";    
    $run_id= mysqli_query($con, $sql_id)or die(mysqli_error($con));
    
    $row_id= mysqli_num_rows($run_id); //echo $row_id; die($row_id);
    //$data= mysqli_fetch_assoc($run_id);  if session is not set with id it's set with something else
    //$id=$data['id'];
    if($row_id==1){  
    if($newpassword==$renewpassword){
        
        $sql="UPDATE `users` SET `password`='$newpassword' WHERE id='$id'";
        $run = mysqli_query($con, $sql)or die(mysqli_error($con));
       // $row= mysqli_num_rows($run);//echo $row;  echo $sql['password'];die($row); 
        //dont use $row here because it is not fetching any data it is updating, so dont show any value. so cant be used for verification. othrwise if want to use then use select qry so that row can get some value
        if($run==1){       
        ?>
            <script>
                alert('Password changed successfully!');
                window.open('setting.php','_self');
               
            </script>   
        <?php  
        }
        }
        else{
        ?>
            <script>
                alert('New passwords not same !');
            </script>   
        <?php 
        }
    } 
    else{
        ?>
            <script>
                alert('Please enter correct old password !');
            </script>   
        <?php 
        }
}
?>