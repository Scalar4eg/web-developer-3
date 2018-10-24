/** Эта функция будет вызываться на страрте страницы */
$(function () {

    /** Назначаем обработчик "клика" на кнопку "лайк" **/
    $(".like-button").click(function (e) {

        //Находим счетчик лайков
        let likes_counter = $(this).find('.likes');

        //Получаем текущее значение
        let current_value = parseInt(likes_counter.text());

        //Если новость уже лайкнута
        if ($(this).hasClass('liked')) {
            // Удаляем лайк
            likes_counter.text(current_value - 1);
            // Меняем стиль кнопки
            $(this).addClass('btn-default').removeClass('btn-success');
        } else {
            // Если новость еще не лайкунта, то добавляем лайк
            likes_counter.text(current_value + 1);
            $(this).addClass('btn-success').removeClass('btn-default');

            let id = $(this).data('id');
            $.get('/like.php?id=' + id);
        }

        //Переключаем класс "liked"
        $(this).toggleClass('liked');

        //Запускаем анимации
        $(this).css('animation', 'like-scale 1s ease-in-out');
        $(this).find('.glyphicon-thumbs-up').css('animation', 'icon-scale 1s ease-in-out');

        e.preventDefault();
    });

    /** Назначаем обработчик на кнопку "подробнее" **/
    $(".show-large-news").click(function () {
        let id = $(this).data('id');
        $(".full-text").load('/news.php?id=' + id);
        $(".large-news").modal('show');
    });
});