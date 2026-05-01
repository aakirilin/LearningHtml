<?php
    session_start();

    function render_php($path, $state)
    {
        ob_start();
        include($path);
        $var=ob_get_contents(); 
        ob_end_clean();
        return $var;
    }

    function redirect($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }

    class State{

    }
?>


<?php
    //prepare render main
    $page = explode('?', $_SERVER['REQUEST_URI'])[0];
    if($page == '/'){
        $page = '/home';
    }

    $file_name = '../views' . $page . '.php';
    $state = new State();
    $main_section = '<article class="article">';
    if(file_exists($file_name)){
        $main_section = $main_section . render_php($file_name, $state);
    }
    else{
        $main_section = $main_section . $file_name;
        $main_section = $main_section . 'Страница не нейдена.';
    }
    $main_section = $main_section . '</article>';

    $main_section_short_articles = '';

    $dir = '../views/articles';
                
    $articles = array_diff(scandir($dir), ['.', '..']);
    shuffle($articles);
    $articles = array_slice($articles, 0, 2);
    
    $state = new State();
    foreach($articles as $article){
        $article_file_name = $dir . '/' . $article . '/short.php';
        $article_href = '/articles/' . $article . '/full';
        $main_section_short_articles = $main_section_short_articles .'<article class="article"><a href="' . $article_href . '">';
        $main_section_short_articles = $main_section_short_articles . render_php($article_file_name, $state);
        $main_section_short_articles = $main_section_short_articles . '</article>';
    }
?>


<?php
    //prepare render header

    $file_name = '../views/header.php';
    $state = new State();
    $header = render_php($file_name, $state);
?>

<?php
    //prepare render footer
    $file_name = '../views/footer.php';
    $state = new State();
    $footer = render_php($file_name, $state);
?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>Сайт визитка</title>
    <link rel="stylesheet" type="text/css" href="/styles.css"/>
  </head>
  <body>
    <header>
        <?php 
            print_r($header);
        ?>
    </header>
    <main>
        <div class="main-section">
            <?php
                print_r($main_section);
            ?>
        </div>
        <div class="main-section">
            <?php
                print_r($main_section_short_articles);
            ?>
        </div>
    </main>
    <footer>
        <?php 
            print_r($footer);
        ?>
    </footer>
  </body>
</html>