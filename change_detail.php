<?php 
include 'includes/common.php';

if(!isset($_SESSION['id'])){
    ?>
        <script>
            alert('Please Login !!');
            window.open('index.php','_self');
        </script>
    <?php
    }
  
$user_id=$_SESSION['id'];
$qry= "select * from users where id='$user_id'";
$run= mysqli_query($con, $qry)or die(mysqli_error($con));

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Setting | Change Details</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- link for bootstrap,jquery,javascript  -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
            <form action="change_detail.php" method="POST" ><center><p><b>Register Here</b></p></center>
                <?php while($data=mysqli_fetch_array($run)) {?> 
                <div class="form-group">
                <label for="name"> Name</label>
                <input type="text" name="uname" value="<?php echo $data['name']; ?>" class="form-control" required="require">
                </div>
                <div class="form-group">
                        <label for="uemail">Email</label>
                        <input type="email" name="uemail" value="<?php echo $data['email']; ?>" class="form-control" required="require">
                    </div>
                
                <div class="form-group">
                        <label for="ucontact">Contact</label>
                        <input type="number" name="ucontact" value="<?php echo $data['contact']; ?>" class="form-control" required="require">
                    </div>
                
                <div class="form-group">
                        <label for="ucity">City</label>
                        <input type="text" name="ucity" value="<?php echo $data['city']; ?>"  class="form-control" required="require">
                    </div>
                <div class="form-group">
                        <label for="uaddress">Address</label>
                        <input type="text" name="uaddress" value="<?php echo $data['address']; ?>" class="form-control" required="require">
                    </div>
                <?php }?>
                <div class="form-group">
                    <input type="submit" name="submit" value="Update" class="form-control btn btn-primary" required="require">
                    </div>
                
            </form>
        </div>
        </div>
                
        <?php include 'includes/footer.php';?>
    </body>
</html>

<?php
function  test($input){                     //for checking input data of sign up form
    $con= mysqli_connect('localhost', 'root', '', 'store') or die(mysqli_error($con));
   
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        $input = mysqli_real_escape_string($con,$input);
        return $input;
    }

if(isset($_POST['submit'])){
   
$name = test($_POST['uname']);
    $name= filter_var($name,FILTER_SANITIZE_STRING);
    if(!preg_match("/^[a-zA-Z]*$/", $name)){  ?>
            <script>
                alert('Only letters and spaces allowed in name ');
            </script> 
            <?php 
            die(); }
$email = test($_POST['uemail']);
    $email= filter_var($email, FILTER_SANITIZE_EMAIL);
        if(filter_var($email,FILTER_VALIDATE_EMAIL)===FALSE){  ?>
            <script>
                alert('Invalid email!');
            </script> 
            <?php 
            die(); }

$contact = test($_POST['ucontact']);
    
        if(filter_var($contact, FILTER_VALIDATE_INT)===FALSE){ ?>
            <script>
                alert('Only numbers allowed in contact');
            </script> 
            <?php 
            die(); 
        }
        else{
            if(strlen($contact)!=10){ ?>
                <script>
                    alert('Please Enter a 10 digit number');
                </script> 
                <?php 
                die();
            }  
        }
$city = test($_POST['ucity']);
    $city= filter_var($city,FILTER_SANITIZE_STRING);
    if(!preg_match("/^[a-zA-Z]*$/", $city)){  ?>
            <script>
                alert('Only letters and spaces allowed in city');
            </script> 
            <?php 
            die(); }
$address = test($_POST['uaddress']);
    $address= filter_var($address,FILTER_SANITIZE_STRING);
    if(preg_match("/^[a-zA-Z]*$/", $address) && !filter_var($contact, FILTER_VALIDATE_INT)===FALSE){  ?>
            <!--script>
                alert('Only letters and spaces allowed in address');
            </script--> 
            <?php 
           // die(); 
           }
           
$update_qry="UPDATE `users` SET `name`='$name',`email`='$email',`contact`='$contact',`city`='$city',`address`='$address' WHERE `id`='$user_id'";
        $update_run = mysqli_query($con, $update_qry)or die(mysqli_error($con));
       // $row= mysqli_num_rows($run);//echo $row;  echo $sql['password'];die($row); 
        //dont use $row here because it is not fetching any data it is updating, so dont show any value. so cant be used for verification. othrwise if want to use then use select qry so that row can get some value
        if($update_run==1){       
        ?>
            <script>
                alert('Details updated!');
                window.open('setting.php','_self');
            </script>   
        <?php  
        }
    } 
?>



