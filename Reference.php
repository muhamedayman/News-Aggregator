<?php
include'includee.html';


 $summary="A fast-moving virus originating in China has spread to more than 60 countries. Among the additional cases, 519 are from Daegu city and 61 are from North Gyeongsang Province, which surrounds Daegu city."; 

$data = [
    ["id" => 1, "text" => 'A fast-moving virus originating in China has spread to more than 60 countries. It has claimed more than 3,000 lives so far. Coronavirus affects the lungs and causes pneumonia-like symptoms. The vast majority of cases are in China, but the virus is now spreading faster outside the country.', "link"=>'http://google.com'],
    ["id" => 2, "text" => 'The death toll from the coronavirus has reached 28 in South Korea with 600 newly confirmed cases, raising the national tally to 4,812 cases, the South Korean Centers for Disease Control and Prevention (KCDC) said in a news release Tuesday. Among the additional cases, 519 are from Daegu city and 61 are from North Gyeongsang Province, which surrounds Daegu city. Daegu city alone accounts for 74.8% of the overall national confirmed cases.My name is alaa. I am pretty 80%', "link"=>'http://youtube.com'],
];
////////////////////////////////////////////////////////////////////////////////////////////////////////

function tokensummary ( $data , $summaryText){
    $Articles=[];
    for ($i = 0; $i <= count($data)-1; $i++)
   {
    array_push($Articles ,$data[$i]["text"]);
  
   }
   $tokenizedSummary = explode('. ', $summaryText);
   checknumeric($tokenizedSummary,$Articles,$summaryText,$data);
}

////////////////////////////////////////////////////////////////////////////////////////////////////////

function checknumeric($tokenizedSummary,$Articles,$summaryText,$data){
//check numeric
//send sentence that has num.
 
    $sentence =[];
    $numb= [];
    for ($i = 0; $i <= count($tokenizedSummary)-1; $i++) 
    {
            if (preg_match('~[0-9]+~', $tokenizedSummary[$i],$matches)) 
            {
                array_push($sentence,$tokenizedSummary[$i]);
                array_push($numb,$matches[0]);
            }
    }
    compareSentence($sentence,$numb,$Articles,$summaryText,$data);

    
}
////////////////////////////////////////////////////////////////////////////////////////////////////////

function compareSentence($sentence,$matches,$ArticleText,$summaryText,$data)
{
    $finalmatch=[];
  
    for($i=0;$i<count($sentence);$i++)
    {   
        for($j=0;$j<count($ArticleText);$j++)
        {      
            
            $tokenizedArticle = explode('. ', $ArticleText[$j]);
            for($k=0;$k<count($tokenizedArticle);$k++){
            if(strpos($sentence[$i],$tokenizedArticle[$k]) !== false)
            {   
                
                array_push($finalmatch,$ArticleText[$j],$matches[$i]);
            }
        }
        
          
        }

    }
    turnTheWordIntoALink($summaryText,$finalmatch,$data);
}
/////////////////////////////////////////////////////////////////////////////////////////////////

function turnTheWordIntoALink($string, $word,$data) {
    $summary=[];
    $links=[];
    $words=[];

    
    for($i=0 ; $i<count($word);$i++)
    {
        for ($j = 0; $j <= count($data)-1; $j++)
        {
            if($word[$i]==$data[$j]["text"]){

              $link = $data[$j]["link"];
              array_push($links,$link);
              array_push($words,$word[$i+1]);
              
                
            }
        }  
    }


    for($r=0;$r<count($words);$r++){
    $string = str_replace($words[$r], "<a href=\"" . $links[$r] . "\">" . $words[$r] . "</a>", $string);
    
   }


 echo $string;
}


tokensummary($data , $summary);

include'footer.html';

?>