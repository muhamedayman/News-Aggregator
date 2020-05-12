
<?php
session_start();
include 'includee.html';
include 'ConnectionClass.php';
include'User.php';
//include_once'newsOnline/RssNews.php';
        if(!empty($_SESSION["Email"]) && !empty($_SESSION["Password"])){

?>
<!Doctype html>
<html>
<style>
 .hist{
     
     margin-left: 56%;
    margin-top: -10%;
    position: relative;
    z-index: 100;
    width: fit-content;
    /* padding-block-end: initial; */
    background: #ffffff;
    
 }
 </style>
 </html>
 
        <div class="classy-nav-container breakpoint-off">
                <div class="container">

                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="vizewNav">

                        <!-- Nav brand -->
                        <?php
                        echo "Welcome : " . $_SESSION["Email"];
                        echo "<br>";
                        echo "Your password is : " . $_SESSION["Password"];
                         echo"<br>";
                         ?>
                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                <form method="post" action="UserController.php">
								<!--<li class="active"><input type='submit' class="btn vizew-btn " name='ReadArticlesFromInterest' value='Read Articles'></li>-->
                            <!--    <li class="active"><input type='submit' class="btn vizew-btn " name='AddInterest' value='Add Interest'></li>-->
                                <li class="active"><input type='submit' class="btn vizew-btn " name='Edit' value='Edit Profile'></li>
								<li class="active"><input type='submit' class="btn vizew-btn " name='Delete' value='Delete Profile'></li>

								<!--<li class="active"><input type='submit' class="btn vizew-btn " name='searchHistory' value='History'></li>-->
							<!--	<li class="active"><input type='submit' class="btn vizew-btn" name="signOut" value='Sign Out'></li> -->

								

                                
                                    </form>	
        </ul>
                                        </div>
                                        <!-- Nav End -->
                                    </div>

                                </nav>
		
						
                                </div>
						
                                </div>
								
                                <?php
	                                                        }
		                        else{
							echo"Something went wrong, ";
									?>
						<h3>	<a href="Login.php">Try Logging in again</a></h3>
								<?php                                    }?>
						
								  <div style="display:none;" id="content" class="hist">
                                         <?php
                                         	$x = new user();
                                             $x::displayHistory();
                                             
                                         ?>
                                         </div>
						
						<!--    <form action="UserController.php" method="POST">
	  <div class="starRatingg" >
       <input id="rating5" type="radio" name="rating" value="1">
                    <label for="rating1">1</label>

       <input id="rating4" type="radio" name="rating" value="2">
                    <label for="rating2">2</label>

     <input id="rating3" type="radio" name="rating" value="3">
                    <label for="rating3">3</label>

     <input id="rating2" type="radio" name="rating" value="4">
                    <label for="rating4">4</label>

     <input id="rating1" type="radio" name="rating" value="5">
                    <label for="rating5">5</label>
                    <br><br>
        <input type="submit" name="submitRate"  class="btn vizew-btn " value="Submit Rate">
    </div>
	</form>-->
						  <?php 
						  
						//$x::ReadFile("hh",$text);
                           
								

        include 'footer.html';
?>
<script>
    function show_hide(){
        var click = document.getElementById("content");
        if(click.style.display==="none"){
             click.style.display = "block";
        }
        else{
            click.style.display = "none";

        }
    }
 </script>
   
