<div class='nav'>
    <div>
        
        <?php 
            print_r_l("Вы на странице:", "You are on the page:");
        ?>
        <?php
            print_r_l($_SESSION['page_title_ru'], $_SESSION['page_title_en']);
        ?>
    </div>
    <div>
        <?php 
            print_r_l("
                <a href='/ru/home'>Главная</a>
                <a href='/ru/photos'>Фото галерея</a>
                <a href='/ru/articles'>Заметки</a>
            ",
            "
                <a href='/en/home'>Home</a>
                <a href='/en/photos'>Photo gallery</a>
                <a href='/en/articles'>Notes</a>
            ");
            $page_path = explode('?', $_SERVER['REQUEST_URI'])[0];
            $page_path = substr($page_path, 3, $page_path->length);
            print_r_l("<a href='/en" . $page_path . "'>EN</a>", "<a href='/ru" . $page_path . "'>RU</a>");
        ?>
    </div>
</div>