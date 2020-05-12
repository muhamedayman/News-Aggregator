

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
</head>
<body>
<div class="s003">
    <div class="inner-form">
        <form action="recommend.php.php" method="get">
        <button type="submit" formaction="recommend.php">Recommended</button>
        </form>
            <?php
            $key = $_POST["Searchbtn"];
            $queryString = http_build_query([
                'api_key' => 'F1F133AFEB1E49089F69ADA1AF43C190',
                'type' => 'everything',
                'locale' => 'en-US',
                'output' => 'json',
                'q' => $key ,
                'time_period' => 'last_week',
                'sort_by' => 'relevancy'
            ]);

            $ch = curl_init(sprintf('%s?%s', 'https://api.breakingapi.com/news', $queryString));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

            $json = curl_exec($ch);
            curl_close($ch);

            $api_result = json_decode($json, true);

            $file = fopen("ApiResults.csv","w");
            $title = array ('index','title','snip','link');
            $k = array(0,$key,'','');
            $index = 0;
            fputcsv($file, $title);
            fputcsv($file,$k);
            for($i=0; $i<10;$i++) {
                $title = $api_result['articles'][$i]['title'];
                $link = "<a href=" .$api_result['articles'][$i]['link'] ."> ". $api_result['articles'][$i]['link']. "</a>";
                $Sn = $api_result['articles'][$i]['snippet'];

                echo "<h3>Title : </h3>{$title}", PHP_EOL;
                echo"<br>";
                echo " <h4> SNIP:</h4> {$Sn}", PHP_EOL;
                echo "<br>";
                echo "<h5>Link : </h5>{$link}", PHP_EOL;
                echo"<br>";
                echo "-----------------------------------------------------------------------------------------------------------------";
                echo "<br>";
                $index+=1;

                $list = array (
                    array($index,$title,$Sn,$link)
                );

                foreach ($list as $line) {
                    fputcsv($file, $line);
                   # echo "Added";
                }





            }

            fclose($file);
           /* $url = 'https://yetigogo.com/?q='.$key;
            $html = file_get_html($url);
            echo "<h1 style='color: crimson'>Results</h1>";
            $list = $html->find('div[id="results"]',0);

            #echo $list;
            foreach($list->find('a') as $E)
            {
                echo $E;
                echo "<br>";
            }
*/
            echo '<br>';
            echo 'Python...';
            echo ' <br>';
            $command = escapeshellcmd('python recommend.py');
            $output = shell_exec($command);
            echo $output;

            ?>

    </div>
        </div>
    </form>

</div>

</body>
</html>