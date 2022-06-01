<?php
require_once 'bootstrap.php';
$response = array();
if(isset($_POST["action"]) && $_POST["action"] == "ClearHistory"){
    
    if($db->DeleteData("DELETE FROM articles WHERE articles.created_at < DATE_SUB(NOW(), INTERVAL 1 DAY) ")){
        echo "true";   
    }else{
        echo "false";
    }
}
if(isset($_GET['action']) && $_GET['action']=="ibinyamakuru"){
    $websites   = $db->GetRows("SELECT websites.* FROM websites");
    foreach ($websites  as $website) {
        echo '
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="channels-card">

                <div class="channels-card-body">
                    <div class="channels-title">
                        <a target="_blank" href="'.$website["link"].'">'.$website["name"].'</a>
                    </div>
                    <div class="channels-card-image">
                        <a target="_blank" href="'.$website["link"].'"><img class="img-fluid" src="'.$website["thumbnail"].'" alt="'.$website["name"].'"></a>
                        <a target="_blank" href="'.$website["link"].' "
                                class="btn btn-outline-danger btn-sm">Sura
                                <strong>'.$website["name"].'</strong></a>
                    </div>
                </div>
                
            </div>
        </div>
        ';
    }
}
if(isset($_POST["action"]) && $_POST["action"] == "getHomeNews"){
    $getArticles   = $db->GetRows("SELECT articles.*,websites.name FROM articles
                                        INNER JOIN `websites` ON    `articles`.`website` = `websites`.`id` ORDER BY `articles`.`created_at` DESC LIMIT 24");
    $html = "";
    foreach ($getArticles  as $Article) {
    $articleID = $Article['unique_id'];
    echo '
        <div class="col-xl-4 col-sm-6  col-xs-12 col-md-6 mb-3">
            <div class="video-card" style="display:flex;">
                <div class="video-card-image" style="flex: 1;">
                    <a class="play-icon" href="'.URLROOT.'i/'.$articleID.'"><i class="fas fa-play-circle"></i></a>
                    <a href="'.URLROOT.'i/'.$articleID.'"><img class="img-fluid" src="'.$Article['thumbnail'].'" alt="'.$Article["title"].'" 
                   style=" display: block;
                   max-width:320px;
                   max-height:115px;
                   width: auto;
                   height: auto;"></a>
                    <div class="time">'.$function->formatDate($Article["created_at"]).'</div>
                </div>
                <div class="video-card-body"  style="flex: 2;">
                    <div class="video-title">
                        <a href="'.URLROOT.'i/'.$articleID.'">'.$Article["title"].'</a>
                    </div>
                    <div class="video-page text-success">
                        URUBUGA: '.$Article['name'].' <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                    </div>
                </div>
            </div>
        </div>
        ';
    }
}

