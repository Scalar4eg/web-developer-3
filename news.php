<?php

/** @var \PDO $PDO */
$PDO = include 'db.php';
$id = $_GET['id'];

$Statement = $PDO->prepare("SELECT body FROM news WHERE id = ?");
$Statement->execute([$id]);

$entry = $Statement->fetch();

echo $entry['body'];
