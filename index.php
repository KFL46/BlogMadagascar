<?php
$dbh = new PDO
	(
		'mysql:host=localhost;dbname=blog_madagascar;charset=utf8',
		'root',
		'',
		[
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		]
	);
include '../../views/index.phtml';
