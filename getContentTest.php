<?php


/*2*/

// Create a stream
$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n"
  )
);

$context = stream_context_create($opts);

// Open the file using the HTTP headers set above
$file = file_get_contents('https://levelnews.org/', false, $context);
echo $file;








/*1*/
/*$homepage = file_get_contents('http://www.google.com/');
$homepage2 = file_get_contents('http://www.youtube.com/');

echo $homepage;
echo $homepage2;*/



/*3*/
/*
$url='https://harvardlawreview.org/';
// using file() function to get content
$lines_array=file($url);
// turn array into one variable
$lines_string=implode('',$lines_array);
//output, you can also save it locally on the server
echo $lines_string;
*/
?>