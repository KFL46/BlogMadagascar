<?php
	
    function getAllArticles (){   
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
    
        $query = ' SELECT articles.id, titre, urlImage, resume, contenu, dateParution, redacteurs.pseudo FROM articles INNER JOIN redacteurs ON articles.redacteurId = redacteurs.id ORDER BY dateParution';
        $sth= $dbh->query($query);
        $articles = $sth->fetchAll();
        
        return $articles;
    }
