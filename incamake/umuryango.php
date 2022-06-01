
<?php

include_once('simple_html_dom.php');
require_once 'bootstrap.php';
// Create DOM from URL
$html = file_get_html('http://umuryango.rw/');
$articles[] = array();
//var_dump($html->find('div.article'));
$flag  = 0;
$first = $html->find('.m12.darken-3')[0];
$title      = $first->find('h5 a', 0)->plaintext;
$link       = 'http://umuryango.rw/'.$first->find('h5 a', 0)->href;
$thumbail   = 'http://umuryango.rw/'.$first->find('a img', 0)->attr['src'];

//check if article exist in database
if(!$db->Check("SELECT * FROM `articles` WHERE `articles`.`title` = ? AND `articles`.`link` = ? AND `articles`.`thumbnail` = ?",
["$title","$link","$thumbail"])){
    //saving article
    if($db->InsertData("INSERT INTO `articles` (`id`,`unique_id`, `title`, `link`, `thumbnail`, `website`, `status`, `created_at`, `updated_at`) 
    VALUES (NULL,?, ?, ?, ?, ?, ?, current_timestamp(), current_timestamp())",
    [$function->getRandomID(),"$title","$link","$thumbail","1","ACTIVE"])){
        echo "Success";
    }else{
        echo "something went wrong";
    }
}

foreach($html->find('.col.l12 .col.l8 .row') as $article) {
    // var_dump($article->plainte);
    $flag++;
    $title      = $article->find('h2 a', 0)->plaintext;
    $link       = 'http://umuryango.rw/'.$article->find('h2 a', 0)->href;
    $thumbail   = 'http://umuryango.rw/'.$article->find('a img', 0)->attr['data-src'];

    //check if article exist in database
    if(!$db->Check("SELECT * FROM `articles` WHERE `articles`.`title` = ? AND `articles`.`link` = ? AND `articles`.`thumbnail` = ?",
    ["$title","$link","$thumbail"])){
        //saving article
        if($db->InsertData("INSERT INTO `articles` (`id`,`unique_id`, `title`, `link`, `thumbnail`, `website`, `status`, `created_at`, `updated_at`) 
        VALUES (NULL,?, ?, ?, ?, ?, ?, current_timestamp(), current_timestamp())",
        [$function->getRandomID(),"$title","$link","$thumbail","3","ACTIVE"])){
            echo "Success";

        }else{
            echo "something went wrong";
        }
    }
    
    if($flag == 4){
        
        $html->clear(); 
        unset($html);
        header("Location: ".URLROOT);
        exit();
    }
}
