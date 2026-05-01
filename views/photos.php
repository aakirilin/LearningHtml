<?php $_SESSION['page_title_ru'] = 'Фотографии'; $_SESSION['page_title_en'] = 'Photos'; ?>
<?php

    $dir = '../public/imgs/gallery';
    $files = array_diff(scandir($dir), ['.', '..']);
    
    print_r('<div class="gallery">');
    foreach($files as $file){
        $path = '/imgs/gallery/' . $file;
        print_r('<a href="' . $path . '"><img class="gallery-img" src="' . $path . '"/></a>');
    }
    print_r('</div>');
?>