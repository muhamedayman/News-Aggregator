<?php
include ('simple_html_dom.php');

$s = 'Covid-19';
$url = 'https://yetigogo.com/?q='.$s;
$html = file_get_html($url); //bbc

echo "<h1 style='color: crimson'>News ".$s."</h1>";
$list = $html->find('div[id="results"]',0);

$file = fopen("sr.csv","w");
$title = array ('Link','Title');
fputcsv($file, $title);
#echo $list;
foreach($list->find('a') as $E)
{
    echo 'title: '. $E->plaintext;
    echo "<br>";
    echo 'link: '.$E->href;
    echo '<br>';
    $list = array (

        array($E, $E->plaintext)
    );

    foreach ($list as $line) {
        fputcsv($file, $line);
        echo "Added";
    }
    echo "<br>";
}

?>
