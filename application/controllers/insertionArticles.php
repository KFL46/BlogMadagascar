<?php
	//	
	session_start();

	//	Si l'utilisateur n'est pas authentifié
	if(!array_key_exists('redacteurId', $_SESSION))
	{
		//	Redirection vers la page d'authentification
		header('Location: connexionRedacteur.php');
		exit;
	}

	//	Traitement du formulaire de publication d'un article s'il a été soumis
	if(!empty($_POST))
	{
		if($_FILES['image']['error'] != 4)
		{
			if($_FILES['image']['error'] == 0)
			{
				if(in_array(mime_content_type($_FILES['image']['tmp_name']), ['image/png', 'image/jpeg']))
				{
					if($_FILES['image']['size'] <= 3000000)
					{
						$imageFileName = uniqid().'.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

						move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.$imageFileName);
					}
					else
					{
						echo 'Le fichier est trop volumineux…';
					}
				}
				else
				{
					echo 'Le type mime du fichier est incorrect…';
				}
			}
			else
			{
				echo 'Le fichier n\'a pas pu être récupéré…';
			}
		}

		//	Connexion à la base de données
		$dbh = new PDO
		(
			'mysql:host=localhost;dbname=Blog_malagasy;charset=utf8',
			'root',
			'',
			[
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			]
		);

		//	Ajout de l'article
		$query = 'INSERT INTO articles (titre, urlImage, resume, contenu, dateParution, redacteurId) 
		VALUES (:titre, :urlImage, :resume, :contenu, dateParution, :redacteurId)';
		$sth = $dbh->prepare($query);
		$sth->bindValue(':title', trim($_POST['title']), PDO::PARAM_STR);
		$sth->bindValue(':content', trim($_POST['content']), PDO::PARAM_STR);
		if(isset($imageFileName))
		{
			$sth->bindValue(':imageFileName', $imageFileName, PDO::PARAM_STR);
		}
		else
		{
			$sth->bindValue(':imageFileName', null, PDO::PARAM_NULL);
		}
		$sth->bindValue(':writerId', $_SESSION['authentication'], PDO::PARAM_INT);
		$sth->execute();

		//	Redirection vers le tableau de bord
		header('Location: dashboard.php');
		exit;
	}

	//	Inclusion du HTML
	include 'write-post.phtml';