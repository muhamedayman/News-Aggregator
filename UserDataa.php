
<?php
include 'includeelogged.html';

        if(!empty($_SESSION["Email"]) && !empty($_SESSION["Password"])){

?>
<!Doctype html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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


                                <?php
	                                                        }
		                        else{
							echo"Something went wrong, ";
									?>
						<h3>	<a href="Login.php">Try Logging in again</a></h3>
								<?php                                    }?>
						

						  <?php 
						  
						//$x::ReadFile("hh",$text);
                           
								

        include 'footer.html';
?>

 
   
