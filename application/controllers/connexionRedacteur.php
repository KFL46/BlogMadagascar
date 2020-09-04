<?php
	//	Traitement de l'authentification s'il a été soumis
	if(!empty($_POST))
	{
		//	Connexion à la base de données
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
        //	Connexion de l'utilisateur
        $query = 'SELECT id, motdepasse FROM redacteurs WHERE pseudo = :pseudo';
        $sth = $dbh->prepare($query);
		$sth->bindValue(':pseudo', trim($_POST['pseudo']), PDO::PARAM_STR);
		$sth->execute();
        $redacteur = $sth->fetch();
		//var_dump($redacteur,password_verify(trim($_POST['motdepasse']), $redacteur['motdepasse']));
		//exit;
         // vérification de la connexion de l'utilisateur
		//	Si l'authentification est réussie…
		if($redacteur !== false AND password_verify(trim($_POST['motdepasse']), $redacteur['motdepasse']))
		{
			session_start();
			$_SESSION['redacteurId'] = intval($redacteur['id']);
            //var_dump($_SESSION);
			//	Redirection vers la page privée
			header('Location: tableaudebord.php');
		}
		//	Sinon…
		else
		{
			//Redirection vers la page d'accueil
			header('Location: connexionRedacteur.php');
			exit;
		}

    }
    // Redirection vers la page d'accueil
include '../views/connexionRedacteur.phtml';

