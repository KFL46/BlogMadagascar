<?php
require '../models/articles.php';
require '../models/redacteurs.php';


$articles = getAllArticles ();
foreach ($articles as $key=>$article)
{
    $articles[$key]['redacteurPseudo']=getRedacteurPseudoById($articles[$key]['redacteurId']);
}
require '../views/index.phtml';
