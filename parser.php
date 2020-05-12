<?php


$string_file=file_get_contents("https://cse.google.com/cse?cx=009965058711885998812%3Agnvskkzngqt&q=corona&oq=corona&gs_l=partner-generic.3...26017.26564.0.26726.6.6.0.0.0.0.60.215.6.6.0.gsnos%2Cn%3D13...0.554j69112j6...1.34.partner-generic..3.3.127.eG1NUzShF4w#gsc.tab=0&gsc.q=corona&gsc.page=1");
$str=file_get_contents("https://www.google.com/search?q=corona&oq=corona&aqs=chrome..69i57j0l4j69i60l3.918j0j4&sourceid=chrome&ie=UTF-8");
//$ch= curl_init("https://cse.google.com/cse?cx=009965058711885998812%3Agnvskkzngqt&q=corona&oq=corona&gs_l=partner-generic.3...26017.26564.0.26726.6.6.0.0.0.0.60.215.6.6.0.gsnos%2Cn%3D13...0.554j69112j6...1.34.partner-generic..3.3.127.eG1NUzShF4w#gsc.tab=0&gsc.q=corona&gsc.page=1");
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//curl_exec($ch);

$title=array();
preg_match('/<a class="gs-title">(.*)<\/a>/',$string_file,$title);

//$title_out=$title[0];
//$title_out2=$title[1];

//echo $title_out;
//echo "<br>";
//echo $title_out2;
echo $string_file;
//echo $str;
?>