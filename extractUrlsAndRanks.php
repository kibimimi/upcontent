<?php
include 'simplehtmldom_1_5/simple_html_dom.php';
$doc2 = new DOMDocument();
$doc2->strictErrorChecking = FALSE;

@$doc2->loadHTML($content = @file_get_contents('http://www.google.fr/search?hl=fr&lr=lang_fr&safe=off&num=10&q=bagues+or+femmes&start=10&sa=N'));
$xpath2 = new DOMXPath($doc2);
$file = 'ggcontent.html';
file_put_contents($file, $content);
//$UrlsAndRanks = $xpath2->query('//div[@role="menu"]//ol//li[@role="menuitem"]//a');
$UrlsAndRanks = $xpath2->query('//h3[@class="r"]//a');
if($UrlsAndRanks->length==0){
    echo utf8_decode("Vérifier si le pattern correspond toujours");
} die();
foreach ($UrlsAndRanks as $k => $UrlAndRank){
    $Url = $UrlAndRank->getAttribute('href') ;
    echo $Url.'<br>';
    $Rank = $UrlAndRank->getAttribute('onmousedown') ;
    $Rank = explode("''", $Rank);
    $Rank = explode(",", $Rank[3]);
    echo str_replace("'", "", $Rank[1]).'<br>';
       
}
