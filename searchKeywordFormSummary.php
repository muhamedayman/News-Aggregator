<?php
include 'includeelogged.html';
?>
 
    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Type a Keyword/Keyphrase to get summary</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

							<div class="container">
								  
								<form action="UserController.php" method="post">
									    <input type="text" name="searchboxSummary">

										<input type="submit" value="Search" name="searchSummary" class="btn vizew-btn">
							

										</form>
                                  
								  </div>
								  
								  <?php
								  
								          include 'footer.html';
										  ?>
