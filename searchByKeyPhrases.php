<?php include'includee.html';?>

    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Type a Keyword/Keyphrase to read articles</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
	
	
						<script async src="https://cse.google.com/cse.js?cx=009965058711885998812:gnvskkzngqt"></script>
							<div class="gcse-search" enableHistory="true"></div>   
										
										
							<!--			<div class="gcse-searchbox-only"> </div>
										<div class="gcse-searchresults-only">	</div>			-->				

	<!--
									<div class="container">
                                    <form action="UserController.php" method="POST" >
									<select name="Categoriesx" class="form-control"id="Categories">
										 <option>Select Category</option>-->
											<?php 
										/*	include'ConnectionClass.php';
											$Query = "SELECT * FROM Categories";
											$Result = mysqli_query($Connection,$Query);
											
											while($row=mysqli_fetch_array($Result)){
											echo "<option value=".$row['id'].">" . $row['Name'] . "</option>";
											}
											*/?>
										<!-- </select>
														
                                     <input type="text"  name="ArticleKeywords"class="form-control" placeholder="Enter Title or keyword to the event"> 
                                     <input type="submit" name="submitSearchArticle" class="btn vizew-btn " value="submit">
                                    </form>
                                     </div>	-->
	
	<?php include'footer.html';?>