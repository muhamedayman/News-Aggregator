<?php
include 'includee.html';
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
								  
								<form name="search" action="../../../cgi-bin/webscraping.py" method="post">

									<textarea rows="4" cols="50"class="form-control"name="searchbox">
                                        Enter your Keyword.
                                        </textarea>
                                        <input type="submit" name="Searchbtn"   class="btn vizew-btn " value="Search">								

										</form>
                                  
								  </div>
								  
								  <?php
								  
								          include 'footer.html';
										  ?>
