<?php
set_time_limit(0);
/*$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: fr\r\n" .
              "Cookie: name=eeefe\r\n".
			  "Cookie: value=ggvggv\r\n"
			  
));

$context = stream_context_create($opts);*/

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=upcontent', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

include 'simplehtmldom_1_5/simple_html_dom.php';
$doc = new DOMDocument();
$doc->strictErrorChecking = FALSE;

$doc2 = new DOMDocument();
$doc2->strictErrorChecking = FALSE;

   @$doc->loadHTML(file_get_contents('gg1.htm'));
    $xpath = new DOMXPath($doc);
    //$products = $xpath->query('//table[@class="products"]//tr[@class="imagerow"]//td');
    $mesUrls = $xpath->query('//h3[@class="r"]//a');

        $maRequete = 'bagues or femmes gg1.htm';
        $selectRequetes = $bdd->prepare("SELECT * FROM requetes WHERE requetes = ?");
        $selectUrls = $bdd->prepare("SELECT * FROM urls WHERE urls = ?");
    
        /* On ne rentre dans la boucle que si la requête n'existe pas encore dans la bdd, 
        pour éviter les doublons */

        $selectRequetes->execute(array($maRequete));
        if ($selectRequetes->fetchColumn() == 0){
        // Insertion de l'expression de la requête dans la base de données
        $requetes_insert = $bdd->prepare("INSERT INTO requetes(requetes)
        VALUES(:requetes)");

        $requetes_insert->execute(array(
        'requetes' => $maRequete
        ));
       foreach ($mesUrls as $k => $monUrl)
       {    
            $urlexpression = utf8_decode($monUrl->getAttribute('href'));  

            /* On ne rentre dans la boucle que si l'url n'existe pas encore dans la bdd, 
            pour éviter les doublons */
            $selectUrls->execute(array($urlexpression));
            if ($selectUrls->fetchColumn() == 0){
            // Insertion de l'url dans la base de données
            $urls_insert = $bdd->prepare("INSERT INTO urls(id_requetes,urls)
            VALUES(:id_requetes,:urls)");

            $urls_insert->execute(array(
            'id_requetes' => $bdd->query("SELECT MAX(`id_requetes`) FROM requetes")->fetchColumn(),
            'urls' => $urlexpression
            ));
            /*$urlexpression = str_replace('</em>','',str_replace('<em>','',$urlexpression));*/
            @$doc2 ->loadHTML(file_get_contents($urlexpression));
            $xpath2 = new DOMXPath($doc2);
            
            $titles = $xpath2->query('//title');
            foreach ($titles as $key => $title) {
            $titleexpression = utf8_decode($title->nodeValue);
            echo $urlexpression.'<br>'.utf8_decode($titleexpression).'<br>'.'<br>';
            // Insertion du title dans la base de données
            $titles_insert = $bdd->prepare("INSERT INTO titles(id_urls,titles)
            VALUES(:id_urls,:titles)");

            $titles_insert->execute(array(
            'id_urls' => $bdd->query("SELECT MAX(`id_urls`) FROM urls")->fetchColumn(),
            'titles' => $titleexpression
            ));

            }

            $descriptions = $xpath2->query('//meta[@name="description"]');
            foreach ($descriptions as $key => $description) {
            $descriptionsexpression = utf8_decode($description->getAttribute('content'));
            echo $urlexpression.'<br>'.utf8_decode($description->getAttribute('content')).'<br>'.'<br>';
            // Insertion de la meta description dans la base de données
            $descriptions_insert = $bdd->prepare("INSERT INTO descriptions(id_urls,descriptions)
            VALUES(:id_urls,:descriptions)");

            $descriptions_insert->execute(array(
            'id_urls' => $bdd->query("SELECT MAX(`id_urls`) FROM urls")->fetchColumn(),
            'descriptions' => $descriptionsexpression
            ));
            }

            $keywords = $xpath2->query('//meta[@name="keywords"]');
            foreach ($keywords as $key => $keyword) {
            $keywordsexpression = utf8_decode($keyword->getAttribute('content'));
            echo $urlexpression.'<br>'.utf8_decode($keyword->getAttribute('content')).'<br>'.'<br>';
            // Insertion de la meta keywords dans la base de données
            $keywords_insert = $bdd->prepare("INSERT INTO keywords(id_urls,keywords)
            VALUES(:id_urls,:keywords)");

            $keywords_insert->execute(array(
            'id_urls' => $bdd->query("SELECT MAX(`id_urls`) FROM urls")->fetchColumn(),
            'keywords' => $keywordsexpression
            ));
            }

            $paragraphes = $xpath2->query('//p');
            foreach ($paragraphes as $key => $paragraphe) {
            echo $urlexpression.'<br>'.utf8_decode($paragraphe->nodeValue).'<br>'.'<br>';
            // Insertion des paragraphes dans la base de données
            $paragraphes_insert = $bdd->prepare("INSERT INTO paragraphes(id_urls,paragraphes)
            VALUES(:id_urls,:paragraphes)");

            $paragraphes_insert->execute(array(
            'id_urls' => $bdd->query("SELECT MAX(`id_urls`) FROM urls")->fetchColumn(),
            'paragraphes' => utf8_decode($paragraphe->nodeValue)
            ));

            }
        }
    }    
}
$paragraphesSum ='';
$mesparagraphes = $bdd->query("SELECT distinct TRIM(paragraphes) as paragraphes_trim
    FROM paragraphes"); //WHERE LENGTH(paragraphes)>350");
foreach ($mesparagraphes as $key => $mesparagraphe) {
    //echo $mesparagraphe['paragraphes_trim'].'<br>'.'<br>';
    $paragraphesSum .= $mesparagraphe['paragraphes_trim'];
}

$descriptionsSum = '';
$mesdescriptions = $bdd->query("SELECT distinct TRIM(descriptions) as descriptions_trim
    FROM descriptions");
foreach ($mesdescriptions as $key => $mesdescription) {
    //echo $mesdescription['descriptions_trim'].'<br>'.'<br>';
    $descriptionsSum .= $mesdescription['descriptions_trim'];
}

$keywordsSum = '';
$meskeywords = $bdd->query("SELECT distinct TRIM(keywords) as keywords_trim
    FROM keywords");
foreach ($meskeywords as $key => $meskeyword) {
    //echo $meskeyword['keywords_trim'].'<br>'.'<br>';
    $keywordsSum .= $meskeyword['keywords_trim'];
}

$contents = $descriptionsSum;//.$paragraphesSum;
//echo $contents;

$contents = explode('. ',$contents);
//echo utf8_decode('Nombre total de mots clés : ').count($contents).'<br>';

for($i=1;$i<10;$i++){
  $pos = rand(0, count($contents));
  if(isset($contents[$pos])) echo $contents[$pos].'<br>';
} 
 



        
/***************************/
    /*$kw = array();
	$array = array();
    foreach ($kws as $k => $val)
    {  	
    	if($k==0)
    	{
    		$array = explode(':', $val);
    		$kw[] =  next($array);
    	}
        elseif($k==count($kws))
    	{
    		$kw[] =  substr($val, 0,-1);
    	}
    	else $kw[]= $val;
    }

    print_r($kw);*/