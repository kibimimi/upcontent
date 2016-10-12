<?php
require_once 'inc.php';
function PagesCategories(){
	$doc = new DOMDocument();
	@$doc->loadHTML(file_get_contents('http://upcontent.localhost/page-parametree.php'));
	$xpath = new DOMXPath($doc);
	$PagesCategories = $xpath->query('//div[@class="navbar-collapse collapse"]//ul[@class="nav navbar-nav"]//li//a');
	return $PagesCategories;
}
var_dump(PagesCategories());

foreach (PagesCategories() as $k => $PageCategorie){
    $Url = $PageCategorie->getAttribute('href') ;
    echo str_replace('-',' ' ,str_replace('.html', '',$Url )).'<br>';
    
}


