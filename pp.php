  <?php
/*
Cette page doit être lancée pour la création dynamique d'une page qui se récupère dans www/upcontent.
Mais au préalable, 
- s'assurer mise en place du Brand et du menu
- le THEKEYWORD doit être spécifié dans inc.php!!!
Après la création des pages, il faut mettre en place
	   - les images-produit
	   - le sitemap
	   - le robots.txt 
Ne pas oublier de vérifier et coriger la qualité du contenu textuel crée dynamiquement
*/
 set_time_limit(0);
require_once 'inc.php';
  $page_html = file_get_contents('http://upcontent.localhost/page-parametree.php');
file_put_contents(str_replace(' ', '-', THEKEYWORD).'.html', $page_html);return;?>