 <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header ">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNav">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <a href="index.php" class="navbar-brand"><img src="image/logo/logo1.jpg" height="30" width="30" class="img-responsive img-rounded logo"></a>
                    
                </div>
                <div class="collapse navbar-collapse" id="myNav">
                    <ul class="nav navbar-nav navbar-right">
                        
                        <?php 
                        if(!isset($_SESSION['id'])){ ?>
                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in "></span>&nbsp;Login</a></li>
                        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span>&nbsp;SignUp</a></li>

                        <?php
                        }
                        else{
                            ?>
                             <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Cart</a></li>
                            <li><a href="setting.php"><span class="glyphicon glyphicon-cog "></span>&nbsp;Setting</a></li>
                            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out "></span>&nbsp;Logout</a></li>
                    
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            
</nav>