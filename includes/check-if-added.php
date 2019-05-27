
<?php
function check_if_added_to_cart($item_id){
    $con= mysqli_connect('localhost', 'root', '', 'store') or die(mysqli_error($con));
    $user_id=$_SESSION['id'];
    
    $qry="SELECT * FROM users_items WHERE item_id='$item_id' AND user_id ='$user_id' AND status='Added'";
    
    $run= mysqli_query($con, $qry);
    
    if(mysqli_num_rows($run)>=1){
        return 1;
    }
    else{
        return 0;
    }
}
?>