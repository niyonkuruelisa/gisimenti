<?php

include_once('simple_html_dom.php');
require_once 'bootstrap.php';
// Create DOM from URL
$html = file_get_html('http://ijabiro.com/');
$articles[] = array();
//var_dump($html->find('div.article'));
$flag  = 0;

foreach($html->find('.hitmag-post') as $article) {
    $flag++;
    $title      = $article->find('h3', 0)->plaintext;
    $link       = $article->find('a', 0)->href;
    $thumbail   = $article->find('img', 0)->src;
    $time       = $article->find('time', 0)->datetime;
    

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

    if($flag == 4){
        
    $html->clear(); 
    unset($html);
    header("Location: ".URLROOT);
    exit();
    }
}