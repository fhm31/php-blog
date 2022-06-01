<?php

$articles = json_decode(file_get_contents('./articles.json'), true);
// dsn : lien de connexion
$dns = 'mysql:host=localhost:3306;dbname=blog';
$user = 'root';
$pwd= '';
// Php Data Object
$pdo = new PDO($dns, $user, $pwd);
// nouvel instance de classe pdo
$statement = $pdo->prepare('
    INSERT INTO article (title, category, content, image) VALUES (:title, :category, :content, :image)
');

foreach($articles as $article) {

    $statement->bindValue(':title', $article['title']);
    $statement->bindValue(':category', $article['category']);
    $statement->bindValue(':content', $article['content']);
    $statement->bindValue(':image', $article['image']);

    $statement->execute();

}