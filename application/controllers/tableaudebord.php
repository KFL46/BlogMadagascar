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
session_start();
//var_dump($_SESSION);
//exit;

//	Si l'utilisateur n'est pas authentifié
if (!array_key_exists('redacteurId', $_SESSION)) {
	//Redirection vers la page d'accueil
    header('Location: ./');
    
exit;
}
// //////////////////// RECUPERATION DES DONNEES DE LA BDD ////////////////////////////
//On sélectionne les annonces 
$query = 'SELECT* FROM articles WHERE redacteurId=?';
$sth = $dbh->prepare($query);
$sth->bindValue(1, ($_SESSION['redacteurId']), PDO::PARAM_INT);
$sth->execute();
$articles = $sth->fetchAll();
    header('Location: insertionArticle.php');
//	Inclusion du HTML
include '../views/tableaudebord.phtml';
