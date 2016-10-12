<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=upcontent', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>