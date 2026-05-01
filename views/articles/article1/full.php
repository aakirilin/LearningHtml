<?php 
    $_SESSION['page_title_ru'] = 'Заметки'; 
    $_SESSION['page_title_en'] = 'Notes';
    global $language;

    $state = new State();
    $content = "";
    if($language == 'ru'){
        $content = render_php(__DIR__ . '/content/ru.php', $state);
    }
    if($language == 'en') {
        $content = render_php( __DIR__ .'/content/en.php', $state);
    }

    print_r($content);
?>