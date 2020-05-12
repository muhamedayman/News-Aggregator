<?php
session_start();

include 'includee.html';
include_once 'ConnectionClass.php';
$DB = new Database();
 $detailsid =$_GET['varname'];
    $Query2 = "SELECT * FROM activity_details WHERE log_id =$detailsid";

    $Result2 = mysqli_query($DB->GetConnection(),$Query2);

  while($row2 = mysqli_fetch_array($Result2)){
      $topic=$row2["topic"];
      $summaryhist=$row2["summary"];
      $reclink=$row2["rec_links"];
      $time =$row2["time"];
      ?>
      <h1>Searched by</h1>
      <?php
      echo $topic."<br>";?>
      <h1>Summary</h1>
      <?php
      echo $summaryhist."<br>";
	  ?>
	<?php
    
  }
  include 'footer.html';
  ?>
   