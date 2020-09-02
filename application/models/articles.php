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
    
        $query = ' SELECT * FROM articles';
        $sth= $dbh->query($query);
        $articles = $sth->fetchAll();
        return $articles;
    }