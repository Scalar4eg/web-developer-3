<html>
<head>
    <meta charset="UTF-8"/>
    <!-- Подключение стилей Bootstrap к нашей странице -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Подключение jQuery (рассмотри на втором уроке) -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <!-- Подключение JavaScript кода Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Основной скрипт нашей страницы -->
    <script src="script.js"></script>

    <!-- Дополнительные CSS-стили для страницы -->
    <link rel="stylesheet" href="style.css">
</head>
<body>


<!-- Верхняя панель -->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <img class="logo" src="skill_logo.png"> SkillNews
            </a>
            <p class="navbar-text">Узнайте самые свежие новости</p>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Спорт</a></li>
                <li><a href="#">Экономика</a></li>
                <li><a href="#">Стартапы</a></li>
                <li><a href="#">Информационные технологии</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Блок с новостями -->
<div class="news-container">

<?php

/** @var \PDO $PDO */
$PDO = include 'db.php';

$Statement = $PDO->prepare("SELECT * FROM news");

$Statement->execute();

$news = $Statement->fetchAll();

foreach ($news as $entry) {
    ?>
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="picture.jpg">
            <div class="caption">
                <h3><?= $entry['title']; ?></h3>
                <p><?= $entry['body']; ?></p>
                <p><a href="#" class="btn btn-primary show-large-news" role="button" data-id="<?= $entry['id'] ?>">Подробнее</a>
                    <a href="#" class="btn btn-default like-button" role="button" data-id="<?=$entry['id']?>">(<span
                                class="likes"><?= $entry['likes']; ?></span>) Like
                        <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></a>
                </p>
            </div>
        </div>
    </div>
    <?php
}

?>

</div>


<div class="modal fade large-news" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Заголовок новости</h4>
            </div>
            <div class="modal-body">
                <img src="picture.jpg">
                <p class="full-text">
                    ВСТАВИТЬ СЮДА ТЕКСТ НОВОСТИ
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</body>
</html>
