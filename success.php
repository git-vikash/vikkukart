<?php
session_start();

if(!isset($_SESSION['id'])){
    ?>
        <script>
            alert('Please Login to see your cart!!');
            window.open('index.php','_self');
        </script>
    <?php
    }
else{
    
    $user_id=$_SESSION['id'];
     
    }


?>
<?php
$con= mysqli_connect('localhost', 'root', '', 'store') or die(mysqli_error($con));
$qry="UPDATE `users_items` SET `status`='confirmed' WHERE user_id='$user_id' ";
$run= mysqli_query($con, $qry);

if($run==TRUE){
    ?>
        <script>
            alert('Your order confirmed! Thank you for shopping with us.');
            window.open('product.php','_self');
        </script>
    <?php
}