<?php
include 'includes/common.php';
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
     
$qry="SELECT DISTINCT i.id,i.name,i.price FROM users_items ui INNER JOIN users u ON u.id=ui.user_id INNER JOIN items i ON i.id=ui.item_id WHERE u.id='$user_id'";
$run= mysqli_query($con, $qry);

if(mysqli_num_rows($run)==0){
    ?>
        <script>
            alert('First add some item to your cart!!');
            window.open('product.php','_self');
        </script>
    <?php
}



function order_number($user_id,$item_id){
    $con= mysqli_connect('localhost', 'root', '', 'store') or die(mysqli_error($con));
    $qry="SELECT i.id FROM users_items ui INNER JOIN users u ON u.id=ui.user_id INNER JOIN items i ON i.id=ui.item_id WHERE i.id='$item_id' AND user_id='$user_id'";
    $run= mysqli_query($con, $qry)or die(mysqli_error($con));
    $row= mysqli_num_rows($run);
    
    return $row;
    
}
 }
?>
        
<!DOCTYPE html>
<html>
    <head>
        <title>Your Cart</title>
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
            #total{ background-color: #67b168;color: white;}
        </style>
    </head>
    <body>
        <?php
        include 'includes/header.php';
        ?>
        
        <div class=" container  cont  col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
            <table class="table table-striped table-hover table-bordered table-condensed">
                <tr><th colspan="6"><center><h3>Your cart</h3></center></th></tr>
                    <tr>
                        
                        <th>Number </th>
                        <th>Quntity</th>
                        <th>Item name</th>
                        <th>Price</th>
                        <th>Total cost per item</th>
                        <th>Manage</th>
                    </tr>
                    
                    <?php $counter=0;$tprice=0;$total=0;$total_id=0;while ($data = mysqli_fetch_array($run)) { $count=0;?>
                        
                     <tr> 
                        <td><?php $counter=$counter+1; echo $counter;//echo $data['id'];//  ?></td>
                        <td><?php $total_id=$total_id .','. $data['id'];$count=$count + order_number($user_id, $data['id']);$total=$total+$count; echo order_number($user_id, $data['id']) ?></td>
                        <td><?php echo $data['name']; ?></td>
                        <td><?php $price=$data['price'];echo $data['price'];?></td>
                        <td><?php  $tprice=$tprice + ($count*$price); echo $count*$price;?></td>
                        <td><a href='includes/cart-remove.php?id=<?php echo $data['id'];?>' class='remove_item_link'> Remove one</a>
                        </td>
                    </tr>
                    <?php }?>
                    <tr id="total">
                        <td><?php //echo $total_id;//$total_item_id=$all_id+?></td>
                        <td>Total : <?php echo $total; ?></td>
                        <td>Total Cost </td>
                        <td></td>
                        <td >Rs : <?php echo $tprice ?></td>
                        <td colspan="6"><a href="success.php?id=<?php echo $data['id'];?> " class="btn btn-primary btn-block ">Confirm Order</a></td>
                   
                    </tr>
                    
            </table>
        </div>
       <footer class="nav navbar-fixed-bottom">
            <div class="container  ">
                <center> <p>Copyright &copy; Vikku Store. All Rights Reserved | Contact Us: +987654321</p></center>
            </div>
        </footer>
    </body>
</html>
