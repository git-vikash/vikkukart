<?php

function  test($input){                     //for checking input data of sign up form
    $con= mysqli_connect('localhost', 'root', '', 'store') or die(mysqli_error($con));
   
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        $input = mysqli_real_escape_string($con,$input);
        return $input;
    }
    

if($_SERVER["REQUEST_METHOD"]=="POST"/*isset($_POST['submit'])*/){

$name = test($_POST['uname']);
    $name= filter_var($name,FILTER_SANITIZE_STRING);
    
$email = test($_POST['uemail']);
    $email= filter_var($email, FILTER_SANITIZE_EMAIL);
        if(filter_var($email,FILTER_VALIDATE_EMAIL)===FALSE){  ?>
            <script>
                alert('Invalid email!');
            </script> 
            <?php 
            die(); }
$password = test($_POST['upassword']); if(strlen($password)>8){ $password= md5($password);}else{ ?>
            <script>
                alert('Please use more than 8 charecters for password!');
            </script> 
            <?php die(); }
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
$qry= "INSERT INTO `users`(`name`, `email`, `password`, `contact`, `city`, `address`) VALUES ('$name','$email','$password','$contact','$city','$address') ";

$run= mysqli_query($con, $qry)or die(mysqli_error($con));


if($run==TRUE){       
    ?>
    <script>
        alert('You registered successfully! Please Login to make a purchase.');
        window.open('login.php','_self');
    </script> 
    
    
    <?php  
}
    
   //$_SESSION['id']= mysqli_insert_id($con);   echo $_SESSION['id']; can be used to set session auto after registering.
}
?>
