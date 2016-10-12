<?php
require_once 'inc.php';


$titles = $bdd->query("SELECT distinct titles FROM titles ".WhereOr(THEKEYWORD,'titles'));
// Pour l'instant $titles est un objet; on va le transformer en tableau
$titles_arr = array();
foreach ($titles as $key => $title) {
    $titles_arr[] = $title['titles'];
   //var_dump($title['titles']);
}
// Pour selectionner des clés au hasard dans le tableau
$rand_keys = array_rand($titles_arr, 1);
//echo $titles_arr[$rand_keys];
unset($rand_keys);

$descriptions = $bdd->query("SELECT distinct descriptions  FROM descriptions ".WhereOr(THEKEYWORD,'descriptions'));
$descriptions_arr = array();
foreach ($descriptions as $key => $description) {
    $descriptions_arr[] = $description['descriptions'];
}
// Pour selectionner des clés au hasard dans le tableau
$rand_keys = array_rand($descriptions_arr, 2);
// A partir des clés on récupère les valeurs, en l'occurrence les meta descriptions
foreach ($rand_keys as $key => $value) {
   // echo $descriptions_arr[$value].'<br>';
}


$keywords = $bdd->query("SELECT distinct keywords  FROM keywords ".WhereOr(THEKEYWORD,'keywords'));
$keywords_arr = array();
foreach ($keywords as $key => $keyword) {
    $keywords_arr[] = $keyword['keywords'];
}
$rand_keys = array_rand($keywords_arr, 2);
foreach ($rand_keys as $key => $value) {
    //echo $keywords_arr[$value].'<br>';
}
unset($rand_keys);

$paragraphes = $bdd->query("SELECT distinct paragraphes  FROM paragraphes ".WhereOr(THEKEYWORD,'paragraphes'));
$paragraphes_arr = array();
foreach ($paragraphes as $key => $paragraphe) {
    $paragraphes_arr[] = $paragraphe['paragraphes'];
}
$rand_keys = array_rand($paragraphes_arr, 2);
foreach ($rand_keys as $key => $value) {
    echo $paragraphes_arr[$value].'<br>';
}
die();


/*
Fusion Meta descriptions et paragraphes, puis random
*/
echo '<br>descriptions et paragraphes:<br>';
$contents = $descriptionsSum.$paragraphesSum;
$contents = explode('. ',$contents);
for($i=1;$i<10;$i++){
  $pos = rand(0, count($contents));
  if(isset($contents[$pos])) echo $contents[$pos].'<br>';
}
/*****************************************/


/*
Fusion Meta descriptions et paragraphes, puis random
*/
echo '<br>descriptions et paragraphes:<br>';
$contents = $descriptionsSum.$paragraphesSum;
$contents = explode('. ',$contents);
for($i=1;$i<10;$i++){
  $pos = rand(0, count($contents));
  if(isset($contents[$pos])) echo $contents[$pos].'<br>';
}
/*****************************************/

/*
Fusion Meta descriptions, puis random
*/
echo '<br>Mes descriptions:<br>meta name="description" content="';
$descriptions = $descriptionsSum;
$descriptions = explode('. ',$descriptions);
for($i=1;$i<3;$i++){
  $pos = rand(0, count($descriptions));
  if(isset($descriptions[$pos])) echo $descriptions[$pos];
   // $descriptions[$pos].'.'
}
echo '"'.'>';
/*****************************************/

    //<meta name="keywords" content="bagues femme, bague femme,bijoux argent,perles,saphir,rubis,emeraude,chevalière,bijoux homme, bague en diamant,chaine en or">

/*
Fusion Meta keywords , puis random
*/
echo '<br>Mes keywords:<br>meta name="keywords" content="';
$keywords = $keywordsSum;
$keywords = explode(', ',$keywords);
for($i=1;$i<20;$i++){
  $pos = rand(0, count($keywords));
  if(isset($keywords[$pos])) echo $keywords[$pos].',';
}
echo '"'.'>';
/*****************************************/