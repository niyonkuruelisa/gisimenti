
<?php



$getArticle = "";

if(isset($_GET['query'])){

    $id = $_GET['query'];
    $getArticle   = $db->GetRow("SELECT articles.*,websites.name FROM articles
    INNER JOIN `websites` ON `articles`.`website` = `websites`.`id` WHERE  `articles`.`unique_id` =  ? ORDER BY `articles`.`created_at` DESC",
    ["$id"]);

}
