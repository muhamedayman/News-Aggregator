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