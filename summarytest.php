<?php 
include 'includeelogged.html';
include'User.php';
$xx = new user();



		$Result=array();
        $Result= $xx::viewSummaries();
        $length = count($Result);
		for ($i=0;$i<$length;$i++)
				{
			$idd = $Result[$i]["id"];
            $Summary = $Result[$i]["Summary"];
        
		


			?>
		  
		  
      <?php 
	  	  echo"<br> <br>";

	  echo $Summary; 
	  echo"<br> <br>";

	  ?> 
			<?php 
			}
			
			
			include 'footer.html';
			
			?>