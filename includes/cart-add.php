<?php
session_start();

 if(isset($_SESSION['id']))   {

$user_id=$_SESSION['id'];

$item_id=$_GET['id']; 
        if(filter_var($item_id, FILTER_VALIDATE_INT)===FALSE){ ?>
            <script>
                alert('Product id should be number only to add');
            </script> 
            <?php 
            die(); 
        }
$con= mysqli_connect('localhost', 'root', '', 'store') or die(mysqli_error($con));
$insert_qry="INSERT INTO users_items(user_id, item_id, status) VALUES('$user_id', '$item_id', 'Added')";
$run_insert= mysqli_query($con, $insert_qry); 

if($run_insert==TRUE){
    ?>
        <script>
            alert('Item added successfully !!');
            window.open('../product.php','_self');
        </script>
    <?php
}
else{die(mysqli_error($con));
     ?> 
                                
                                
                                <script>
                                     alert('Something went wrong. Plesase try again!');
                                     window.open('../product.php','_self');
                                </script>
    
                                <?php 
 }
 }
 else{     
     ?> 
                                
                                
                                <script>
                                     alert('Please Login to make a purchase!');
                                     window.open('../login.php','_self');
                                </script>
    
                                <?php 
     
 }


?> 
