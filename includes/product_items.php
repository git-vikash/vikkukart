<?php 
                            $qry="SELECT * FROM `items` WHERE `category`='$category'";
                            $run_inside= mysqli_query($con, $qry);
                    
                            if(mysqli_num_rows($run_inside)>0){                     // this loop for fetching all data of each category
                                while ($data2= mysqli_fetch_array($run_inside)){
                                   
                                    ?> 
                        
                                       <div class="col-sm-3 ">
                                        <div class="thumbnail thumb">
                                            <img src="image/item_photos/<?php echo $data2['category_image'];?>" alt="<?php echo $data['category'];?>" class="img1" >
                                                <div class="caption"><h4><?php echo $data2['name']; ?></h4><p><?php echo $data2['price']; ?></p> 
                                                <?php $id=$data2['id']; ?>
                                                <?php
                                                if (!isset($_SESSION['id'])) { ?> 
                                                    <p><a href="includes/cart-add.php" role="button" class="btn btn-primary ">Buy Now</a></p>
                                                <?php }
                            
                                                else {              //We have created a function to check whether this particular product is added to cart or not.
                                                    if (check_if_added_to_cart($id)) {                //This is same as if(check_if_added_to_cart != 0) 
                                                        ?>
                                                    
                                                        <a href="includes/cart-add.php?id=<?php echo $id;?>" class="btn  btn-success" >Added to cart</a>
                                                        <?php
                                                    } 
                                                    else { ?> 
                                                    <a href="includes/cart-add.php?id=<?php echo $id;?>" name="add"  class="btn  btn-primary">Add to cart</a> 
                                                    <?php 
                                                    }
                                                }  
                                                ?>
                                                </div>
                                        </div>
                                        </div>
                                    <?php 
                                }}
                                ?>
