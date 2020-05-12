


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Star Rating System</title>
    <meta name="viewport" content="width=device-width">
    
</head>

<body>
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
        
    </div>



  <?php

include_once 'Database.php'; 
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
 $rate = $_POST['rating'];
   $sql = "INSERT INTO `rating`( `articleID`, `userID`, `Rate`) VALUES (1,2,$rate)";
      if (mysqli_query($db, $sql)) {
        echo "Your rate saved";
     } else {
        echo "Error: " . $sql . " " . mysqli_error($db);
     }
     mysqli_close($db);
     ?>

</body>