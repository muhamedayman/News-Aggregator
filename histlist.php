
<?php

include 'includeelogged.html';
include'User.php';

?>

<?php
    $x = new user();
    $x::displayHistory(); 
  
include 'footer.html';  
?>

                                         