<div class='nav'>
    <div>
        Вы на странице:
        <?php
            print_r($_SESSION['page_title']);
        ?>
    </div>
    <div>
         <a href='/'>Главная</a>
        <a href='/photos'>Фото галерея</a>
        <a href='/articles'>Заметки</a>
    </div>
</div>