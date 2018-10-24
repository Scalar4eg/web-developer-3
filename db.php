<?php

return new PDO("mysql:dbname=skill;unix_socket=/tmp/mysql.sock", "root", "");





/*
 CREATE TABLE skill.news (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title TEXT,
    body TEXT,
    likes INT NOT NULL DEFAULT 0
);
 */