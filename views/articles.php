<?php $_SESSION['page_title_ru'] = 'Заметки'; $_SESSION['page_title_en'] = 'Notes'; ?>

<div>
    <?php
    global $language;
    $dir = '../views/articles';
    
    $articles = array_diff(scandir($dir), ['.', '..']);
    
    $state = new State();
    foreach($articles as $article){
        $article_file_name = $dir . '/' . $article . '/short.php';
        $article_href = '/' . $language . '/articles/' . $article . '/full';
        print_r('<a href="' . $article_href . '">');
        print_r(render_php($article_file_name, $state));
        print_r('</a>');
    }

    ?>
</div>