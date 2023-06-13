<?php
    require_once('php/classes/simple_html_dom.php');
    $html = file_get_html('https://www.banki.ru/');
    $div = $html->find(".l965967d6", 1);
    $links = $div->find("a"); 
    foreach ($links as $a){ 
        echo $a->find(".l56781f45", 0);
        echo $a->find(".la77072ca", 0)->find(".l983f7424", 0)->plaintext." годовых<br>";
        echo $a->find(".l1f5c82b4", 1)->plaintext."<hr>";
    }