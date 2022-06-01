<?php

include_once('simple_html_dom.php');
require_once 'bootstrap.php';
// Create DOM from URL
$html = file_get_html('https://igihe.com/');
$articles;
//var_dump($html->find('div.article'));

$flag  = 0;

foreach($html->find('.homenews') as $article) {

    $flag++;
    $title      = $article->find('a', 2)->plaintext;
    $link       = "https://igihe.com/".$article->find('a', 0)->href;
    $thumbail   = "https://igihe.com/".$article->find('img.lazy', 0)->attr['data-original'];

    $time       = "";
    //check if article exist in database
    if(!$db->Check("SELECT * FROM `articles` WHERE `articles`.`title` = ? AND `articles`.`link` = ? AND `articles`.`thumbnail` = ?",
    ["$title","$link","$thumbail"])){
        //saving article
        if($db->InsertData("INSERT INTO `articles` (`id`,`unique_id`, `title`, `link`, `thumbnail`, `website`, `status`, `created_at`, `updated_at`) 
        VALUES (NULL,?, ?, ?, ?, ?, ?, current_timestamp(), current_timestamp())",
        [$function->getRandomID(),"$title","$link","$thumbail","2","ACTIVE"])){
            echo "Success";

        }else{
            echo "something went wrong";
        }
    }
    
    if($flag == 3){

        $html->clear(); 
        unset($html);
        header("Location: ".URLROOT);
        exit();
    }
}

//print_r($articles);