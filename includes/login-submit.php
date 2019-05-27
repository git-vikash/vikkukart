<?php
function  test($input){                     //for checking input data of login page 
    $con= mysqli_connect('localhost', 'root', '', 'store') or die(mysqli_error($con));
   
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        $input = mysqli_real_escape_string($con,$input);
        return $input;
    }
if( $_SERVER['REQUEST_METHOD']=='POST'/*isset($_POST['submit'])*/){
    $con= mysqli_connect('localhost', 'root', '', 'store') or die(mysqli_error($con));
    
$email=test($_POST['uemail']);  
        $email= filter_var($email, FILTER_SANITIZE_EMAIL);
        if(filter_var($email,FILTER_VALIDATE_EMAIL)===FALSE){  ?>
            <script>
                alert('Invalid email!');
            </script> 
            <?php 
            die(); }
$password = test($_POST['upassword']); 
        if(strlen($password)>8){ 
            $password= md5($password);
            
        }else{ ?>
            <script>
                alert('Please use more than 8 charecters for password!');
            </script> 
            <?php die(); }
   
    $qry="SELECT id,name FROM users WHERE email='$email' AND password='$password'"; 
   // using single or double inverted comma with column name produce error, either use tilt as `id` or simple as id . dont uses as 'id' or "id"
    $run = mysqli_query($con, $qry)or die(mysqli_error($con));
    
    $row = mysqli_num_rows($run);
    
    if($row<1){        
        ?>
    
        <script>
            alert('Email or Password is incorrect.');
            window.open('login.php','_self');
        </script>
        
        <?php
        }
    else{
        $data=mysqli_fetch_array($run);     //can use also mysqli_fetch_assoc() 
        $id=$data['id'];                 // use column name that is present in above qery
        
        $_SESSION['id']= $id;               //set session of id
        
        ?>    
        <script>
            alert('Login successful.');
            window.open('product.php','_self');
        </script>
        
        <?php
        }
    }
    ?>