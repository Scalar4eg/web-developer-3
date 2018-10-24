<?php

/** @var \PDO $PDO */
$PDO = include 'db.php';
$id = $_GET['id'];

$Statement = $PDO->prepare("UPDATE news SET likes = likes + 1 WHERE id = ?");
$Statement->execute([$id]);

