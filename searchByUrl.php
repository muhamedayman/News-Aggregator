<?php
include'includee.html';

?>
	
	  <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Search By URL</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
	
	
	<div class="container">
                                    <form action="UserController.php" method="POST" >
                                     <input type="text"  name="URL"class="form-control" placeholder="Enter URL"> 				
                                     <input type="submit" name="btn" class="btn vizew-btn " value="submit">
                                    </form>
                                     </div>
									 
									 
<?php include'footer.html';?>