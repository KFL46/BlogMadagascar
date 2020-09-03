<?php
require '../models/articles.php';


$articles = getAllArticles ();
//var_dump($articles);exit;
require '../views/index.phtml';
