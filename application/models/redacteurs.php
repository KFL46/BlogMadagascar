<?php
	
    function getAllRedacteurs (){   
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
    
        $query = ' SELECT * FROM redacteurs';
        $sth= $dbh->query($query);
        $redacteurs = $sth->fetchAll();
        return $redacteurs;
    }
    function getRedacteurById ($id){   
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
    
        $query = ' SELECT * FROM redacteurs WHERE id = :id';
        $sth= $dbh->prepare($query);
        $sth->bindValue(":id", $id, PDO::PARAM_INT);
        $sth->execute();

        $redacteurs = $sth->fetchAll();
        return $redacteurs;
    }
    function getRedacteurPseudoById ($id){   
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
    
        $query = ' SELECT * FROM redacteurs WHERE id = :id';
        $sth= $dbh->prepare($query);
        $sth->bindValue(":id", $id, PDO::PARAM_INT);
        $sth->execute();

        $redacteurs = $sth->fetchAll();
        return $redacteurs[0]['pseudo'];
    }