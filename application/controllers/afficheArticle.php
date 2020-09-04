<?php
$dbh = new PDO
(
    'mysql:host=localhost;dbname=blog_malagasy;charset=utf8',
    'root',
    '',
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
);

//On sélectionne les annonces 
$query = 'SELECT titre, urlImage, contenu FROM articles WHERE id=?';
$sth = $dbh->prepare($query);
$sth->bindValue(1, ($_GET['id']), PDO::PARAM_INT);
$sth->execute();
$article = $sth->fetch();
//var_dump($article);

//	Inclusion du HTML
include '../views/afficheArticle.phtml';
