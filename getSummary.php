<?php
include'includeelogged.html';
include'User.php';
?>
 <!--<div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Summary</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>-->

							<div class="container">
			<?php
	$var = htmlspecialchars($_GET["searchKeyword"]);
    $x=new user();
	$x::getSummary($var);
	
	
	?>					  
				
                                  
								  </div>

<?php
	include'footer.html';
?>

