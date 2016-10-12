<?php
require_once 'inc.php';
function motsAExclure(){
	return array('et','de','du','le','la','les','des');
}
//var_dump(motsAExclure());

function WhereAnd($keywords,$champ){
	$keywords = explode(' ', $keywords);
	$WhereAnd = '';
	foreach ($keywords as $key => $keyword) {
		if(!in_array($keyword, motsAExclure()))
	    $WhereAnd .= $champ." like '%".$keyword."%' And ";
	}	
	return 'WHERE '.substr($WhereAnd, 0,-5);
	unset($keywords);
	unset($WhereAnd);
}
//echo WhereAnd("bagues or hommes de le desd");

function WhereOr($keywords,$champ){
	$keywords = explode(' ', $keywords);
	$WhereOr = '';
	foreach ($keywords as $key => $keyword) {
		if(!in_array($keyword, motsAExclure()))
	    $WhereOr .= $champ." like '%".$keyword."%' Or ";
	}	
	return 'WHERE '.substr($WhereOr, 0,-4);
	unset($keywords);
	unset($WhereOr);
}
//echo WhereOr("bagues or femmes et hommes");

function keywordForGG($keyword){
	$keyword = str_replace(' ', '+',$keyword);	
	return $keyword;
	unset($keyword);
}
//echo keywordForGG("bagues or femmes et hommes");

function getTitle(){
	include 'connexion.php';
	$titles = $bdd->query("SELECT distinct titles FROM titles ".WhereOr(THEKEYWORD,'titles'));
	// Pour l'instant $titles est un objet; on va le transformer en tableau
	$titles_arr = array();
	foreach ($titles as $key => $title) {
	    $titles_arr[] = $title['titles'];
	   //var_dump($title['titles']);
	}

	// Pour selectionner des clés au hasard dans le tableau, ici on ne va selectionner qu'une clé
	$rand_keys = array_rand($titles_arr, 1);
	return $titles_arr[$rand_keys];
	unset($titles);unset($titles_arr);unset($bdd);unset($rand_keys);
}
//echo getTitle();


function getMetaDescription(){
	include 'connexion.php';
	$descriptions = $bdd->query("SELECT distinct descriptions  FROM descriptions ".WhereOr(THEKEYWORD,'descriptions'));
	$descriptions_arr = array();
	foreach ($descriptions as $key => $description) {
	    $descriptions_arr[] = $description['descriptions'];
	}
	// Pour selectionner des clés au hasard dans le tableau
	$rand_keys = array_rand($descriptions_arr, 1);
	// A partir des clés on récupère les valeurs, en l'occurrence les meta descriptions
	// On utilise la boucle foreach pour plusieurs éléments à électionner
	
	//foreach ($rand_keys as $key => $value) {
	   //return $descriptions_arr[$value];
	   return $descriptions_arr[$rand_keys];
	   unset($descriptions);unset($descriptions_arr);unset($bdd);unset($rand_keys);
	//}
}
//echo getMetaDescription();

function getMetaKeywords(){
	include 'connexion.php';
	$keywords = $bdd->query("SELECT distinct keywords  FROM keywords ".WhereOr(THEKEYWORD,'keywords'));
	$keywords_arr = array();
	foreach ($keywords as $key => $keyword) {
	    $keywords_arr[] = $keyword['keywords'];
	}
	$rand_keys = array_rand($keywords_arr, 5);
	$keywords_arrTempo = '';
	foreach ($rand_keys as $key => $value) {
		$keywords_arrTempo .= $keywords_arr[$value];
	    return $keywords_arrTempo;
	}
	unset($keywords);unset($keywords_arr);unset($bdd);unset($rand_keys);
}
//echo getMetaKeywords();

function getParagraphes(){
	include 'connexion.php';
	$paragraphes = $bdd->query("SELECT distinct paragraphes  FROM paragraphes ".WhereOr(THEKEYWORD,'paragraphes'));
	$paragraphes_arr = array();
	foreach ($paragraphes as $key => $paragraphe) {
	    $paragraphes_arr[] = $paragraphe['paragraphes'];
	}
	$rand_keys = array_rand($paragraphes_arr, 2);
	foreach ($rand_keys as $key => $value) {
	    return $paragraphes_arr[$value];
	}
	unset($paragraphes);unset($paragraphes_arr);unset($bdd);unset($rand_keys);
}
//echo getParagraphes();

/*****************************************************/
// Insertion de l'url dans la base de données
function insertUrlIndb($url,$position){
	include 'connexion.php';
    $urls_insert = $bdd->prepare("INSERT INTO urls(id_requetes,urls,positions)
    VALUES(:id_requetes,:urls,:positions)");

    $urls_insert->execute(array(
    'id_requetes' => $bdd->query("SELECT MAX(`id_requetes`) FROM requetes")->fetchColumn(),
    'urls' => $url,
    'positions' =>  $position
    ));
    unset($url);unset($position);unset($urls_insert);unset($bdd);
}
// Insertion du title dans la base de données
function insertTitleIndb($title){
	include 'connexion.php';
	$titles_insert = $bdd->prepare("INSERT INTO titles(id_urls,titles)
	VALUES(:id_urls,:titles)");
	$titles_insert->execute(array(
	'id_urls' => $bdd->query("SELECT MAX(`id_urls`) FROM urls")->fetchColumn(),
	'titles' => $title
	));
	unset($title);unset($titles_insert);unset($bdd);                
}
// Insertion de la meta description dans la base de données
function insertDescriptionIndb($description){
	include 'connexion.php';  
    $descriptions_insert = $bdd->prepare("INSERT INTO descriptions(id_urls,descriptions)
    VALUES(:id_urls,:descriptions)");
    $descriptions_insert->execute(array(
    'id_urls' => $bdd->query("SELECT MAX(`id_urls`) FROM urls")->fetchColumn(),
    'descriptions' => $description
    ));
    unset($description);unset($descriptions_insert);unset($bdd);		                
}
// Insertion de la meta keywords dans la base de données
function insertKeywordsIndb($keywords){
	include 'connexion.php';
    $keywords_insert = $bdd->prepare("INSERT INTO keywords(id_urls,keywords)
    VALUES(:id_urls,:keywords)");
    $keywords_insert->execute(array(
    'id_urls' => $bdd->query("SELECT MAX(`id_urls`) FROM urls")->fetchColumn(),
    'keywords' => $keywords
    ));
    unset($keywords);unset($keywords_insert);unset($bdd);		                
}
    // Insertion des paragraphes dans la base de données
function insertParagraphesIndb($paragraphes){
	include 'connexion.php';
    $paragraphes_insert = $bdd->prepare("INSERT INTO paragraphes(id_urls,paragraphes)
    VALUES(:id_urls,:paragraphes)");

    $paragraphes_insert->execute(array(
    'id_urls' => $bdd->query("SELECT MAX(`id_urls`) FROM urls")->fetchColumn(),
    'paragraphes' => $paragraphes
    ));
    unset($paragraphes);unset($paragraphes_insert);unset($bdd);		                
}
?>