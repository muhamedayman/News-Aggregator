<?php include'includee.html';?>

   <div class="container">
	<p id="date"></p>
<script>    
var d = new Date();
 
var date = d.getDate();
var month = d.getMonth() + 1;
var year = d.getFullYear();

var time = "Current Time: "+d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
var breakL="\n";
var dateStr = "Today's Date: "+date + "/" + month + "/" + year+"\n";
var result=dateStr.fontsize(7);
var result2=time.fontsize(7);
document.write(result);
document.write(result2);




var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
							       <h1 align="center">TOP NEWS</h1>

       <?php
 
       $Yahoo = simplexml_load_file("https://news.yahoo.com/rss/mostviewed"); //Yahoo News
       $BBC = simplexml_load_file("http://feeds.bbci.co.uk/news/rss.xml"); //BBC News
       $CNN = simplexml_load_file("http://rss.cnn.com/rss/edition.rss");
       $cbs = simplexml_load_file("https://www.cbsnews.com/latest/rss/main");
       $cYahoo = 0;
       $cBBC = 0;
       $cCNN = 0;
        $cbsc = 0;
       echo  "<img src=\"bbc.png\" width=\"70\" height=\"90\"  alt=\"BBC\" />";
      // echo "<h3 style='color: #bf0000'>Top 5 BBC News</h3>";

       foreach($BBC->channel->item as $itm)
       {
           $cBBC +=1;
           $title = $itm->title;
           $link = $itm->link;
           $des = $itm->description;

           echo " <a href=\"$link\"><h6>$title</h6> </a>  ";

           echo "Link : <a href=\"$link\">$link</a>";
           if ($cBBC == 5)

               break;

       }

        echo"<br>";
       //echo "<h3 style='color: #bf0000'>Top 5 Yahoo News</h3>";
       echo  "<img src=\"yahoo.png\" width=\"80\" height=\"90\"  alt=\"BBC\" />";
       foreach($Yahoo->channel->item as $itm)
       {
           $cYahoo +=1;
           $title = $itm->title;
           $des = $itm->description;
           $link = $itm->link;
           echo "<a href=\"$link\"><h6 >$title</h6></a>";
           echo "Link : <a href=\"$link\">$link</a>";
           if ($cYahoo == 5)

               break;
       }
       echo"<br>";

     //  echo "<h3 style='color: #bf0000'>Top 5 CNN News </h3>";
       echo  "<img src=\"cnn.png\" width=\"60\" height=\"90\"  alt=\"BBC\" />";

       foreach ($CNN->channel->item as $itm)
       {
           $cCNN += 1;
           $title = $itm->title;
           $link = $itm->link;
           echo "<a href=\"$link\"><h6>$title</h6></a>";
           echo "Link : <a href=\"$link\">$link</a>";
           if ($cCNN == 5)

               break;
       }

        echo "<br>";
       echo  "<img src=\"cbs.png\" width=\"80\" height=\"90\"  alt=\"BBC\" />";

       foreach ($cbs->channel->item as $itm)
       {
           $cbsc += 1;
           $title = $itm->title;
           $link = $itm->link;
           echo "<a href=\"$link\"><h6>$title</h6></a>";
           echo "Link : <a href=\"$link\">$link</a>";
           if ($cbsc == 5)

               break;
       }


       ?>

   </div>
<?php include'footer.html';?>


<div style="margin-top:-1140px;margin-left:300px;" class="conta">
  <h5  >Original sources:</h5>
  <div class="slideshow" >
  <a href="https://news.google.com/topstories?hl=en-US&gl=US&ceid=US:en">
    <img class="mySlides" src="Google.JPG"  ></a>

  <a href="https://news.yahoo.com/"> 
  <img class="mySlides" src="Yahoo.PNG" ></a>

  <a href="https://edition.cnn.com/">
  <img class="mySlides" src="cnn.PNG" ></a>

  <a href="https://www.bbc.com/news">
  <img class="mySlides" src="bbc.PNG" ></a>

  <a href="https://www.buzzfeednews.com/">
  <img class="mySlides" src="Buzz.png" ></a>

  <a href="https://abcnews.go.com/">
  <img class="mySlides" src="Abclogo.PNG" ></a>

  <a href="https://www.foxnews.com/">
  <img class="mySlides" src="fox.JPG" ></a>

  <a href="https://www.cbsnews.com/">
  <img class="mySlides" src="cbs.PNG" ></a>

</div></div>
<style type="text/css">
  .mySlides  {
     margin-top:-8px;
     width:60%;  
   height:250px;
    padding:5px;
    border:1px solid #999;

}
.conta{
  padding-left:700px;
  
}
</style>


<script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
    <script>

var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}

</script>