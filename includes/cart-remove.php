<?php
session_start();
$user_id=$_SESSION['id'];

$item_id=$_GET['id'];
if(filter_var($item_id, FILTER_VALIDATE_INT)===FALSE){ ?>
            <script>
                alert('Product id should be number only to remove');
            </script> 
            <?php 
            die(); 
        }
        
$con= mysqli_connect('localhost', 'root', '', 'store') or die(mysqli_error($con));
$insert_qry="DELETE FROM users_items where user_id='$user_id' AND item_id='$item_id' LIMIT 1";
$run_insert= mysqli_query($con, $insert_qry); 

if($run_insert==TRUE){
    ?>
        <script>
            alert('One item removed!');
            window.open('../cart.php','_self');
        </script>
    <?php
}
 


?> 

