<?php $_SESSION['page_title'] = 'Заметки'; ?>

<div>
    <?php
    
    $dir = '../views/articles';
    
    $articles = array_diff(scandir($dir), ['.', '..']);
    
    $state = new State();
    foreach($articles as $article){
        $article_file_name = $dir . '/' . $article . '/full.php';
        print_r('<article class="article">');
        print_r(render_php($article_file_name, $state));
        print_r('</article>');
    }

    ?>
</div>