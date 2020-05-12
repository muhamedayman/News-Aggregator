<?php
include'includee.html';
echo shell_exec("python C:\wamp64\cgi-bin\webScrapingCGI.py 2>&1");
//echo shell_exec("python D:/SummarizationGrad/output.py 2>&1");

include'footer.html';


?>