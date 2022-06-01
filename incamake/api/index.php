<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"), true);
require_once  '../bootstrap.php';
//defining response
$response = array();
//operate on api
switch($data['action']){

    //admin part
        //admin operations
    //login operations
    case 'loginAdmin':
        //add new Seller
        $email          = $data['email'];
        $password       = $data['password'];
        $hashPass = hash("sha256",$password);
        if($user = $db->GetRow("SELECT * FROM `system_users` WHERE `system_users`.`email` =? AND `system_users`.`password` =?",["$email","$hashPass"])){
            $response['success'] = true;
            $response['names'] = $user["names"];
            $_SESSION['userEmail'] = $email;
            $_SESSION['user_password'] = 'true';
            $_SESSION['type'] = 0;
            
        }else{
            $response['exist'] = false;
        }
    break;
    case 'addGenre':
        //add new Genre
        $name = $data['name'];
        if($db->Check("SELECT * FROM `genre` WHERE `genre`.`name` =?",["$name"])){
            $response['exist'] = true;
        }else{
            if($db->InsertData("INSERT INTO `genre` (`id`,`guid`, `name`, `created_at`, `updated_at`) VALUES (NULL,?, ?, current_timestamp(), current_timestamp())",[$function->GUIDv4(),$name])){
                $response['success'] = true;
            }else{
                $response['success'] = false;
            }
        }
    break;
    case 'getSummary':
        $response['totalMovies'] = count($db->GetRows('SELECT * FROM movie'));
        $response['totalSubscribers'] = count($db->GetRows('SELECT * FROM clients WHERE clients.status != ?',["Pending"]));
        $response['totalClients'] = count($db->GetRows('SELECT * FROM clients'));
    break;
    case 'getGenres':
        $response = $db->GetRows('SELECT * FROM genre ORDER BY genre.updated_at DESC');
    break;
    case 'getCategories':
        $response = $db->GetRows('SELECT * FROM genre ORDER BY genre.updated_at DESC');
    break;
    case 'getVideos':
        $response = $db->GetRows('SELECT m.*,group_concat(g.name) as genres
        from movie m inner join movie_genres mg
        on m.id=mg.movie_id
        inner join genre g
        on g.id=mg.genre_id 
        group by m.id ORDER BY m.created_at DESC');
    break;
    case 'getUpcomingVideos':
        $movieID = $data['movieID'];

        $response = $db->GetRows('SELECT m.*,group_concat(g.name) as genres
        from movie m inner join movie_genres mg
        on m.id=mg.movie_id
        inner join genre g
        on g.id=mg.genre_id WHERE m.guid != ?
        group by m.id ORDER BY m.created_at DESC',["$movieID"]);
    break;
    
    case 'getVideosByGenre':
        $genre = $data['genre'];
        
        $response = $db->GetRows('SELECT m.*,group_concat(g.name) as genres
        from movie m inner join movie_genres mg
        on m.id=mg.movie_id
        inner join genre g
        on g.id=mg.genre_id WHERE  g.name = ?
        group by m.id ORDER BY m.created_at DESC',["$genre"]);
    break;
    case 'deleteGenre': 
        $id = $data['id'];
        if($db->DeleteData("DELETE FROM genre WHERE genre.id = ?",[$id])){
            $response['success'] = true;
        }else{
            $response['success'] = false;
        }
    break;
    case 'updateGenre':
        //edit Genre
        $name = $data['name'];
        $id = $data['id'];
        if($db->UpdateData("UPDATE `genre` SET `genre`.`name` =? WHERE `genre`.`id` =?",[$name,$id])){
            $response['success'] = true;
        }else{
            $response['success'] = false;
        }
    break;
    case 'saveMovieData':

        $videoId             =$data['videoId'];
        $title               =$data['title'];
        $title_english       =$data['title_english'];
        $description_intro   =$data['description_intro'];
        $description_full    =$data['description_full'];
        $year_released       =$data['year_released'];
        $movie_language      =$data['movie_language'];
        $size                =$data['size'];
        $genres              =$data['genres'];
        $runtime             =$data['runtime'];
        $youtube_code        =$data['youtube_code'];
        $time                =$data['time'];
        if($db->UpdateData("UPDATE `movie` SET 
        `size` = ?,
        `time` = ?,
        `title` = ? ,
         `title_english`= ? ,
          `title_long` = ? ,
           `slug` = ?,
            `year` =?,
             `runtime` =? ,
              `description_intro` = ? ,
               `description_full` = ?,
                `yt_trailer_code` = ?,
                 `language` = ?,
                  `updated_at` = current_timestamp() WHERE `id` = ?",[
                      $size,
                      $time,
                      $title,
                      $title_english,
                      $title,
                      $title,
                      $year_released,
                      $runtime,
                      $description_intro,
                      $description_full,$youtube_code,$movie_language,$videoId])){
                          foreach($genres as $genre){
                              if($db->InsertData("INSERT INTO `movie_genres` (`id`,`guid`, `genre_id`, `movie_id`, `created_at`, `upldated_at`) VALUES (NULL,?, ?, ?, current_timestamp(), current_timestamp())",[$function->GUIDv4(),$genre,$videoId])){
                                
                              }
                          }
                          $response['success'] = true;
            
        }else{
            $response['success'] = false;
        }
    break;
    case 'updateMovieData':

        $videoId             =$data['videoId'];
        $title               =$data['title'];
        $title_english       =$data['title_english'];
        $description_intro   =$data['description_intro'];
        $description_full    =$data['description_full'];
        $year_released       =$data['year_released'];
        $movie_language      =$data['movie_language'];
        $youtube_code        =$data['youtube_code'];
        if($db->UpdateData("UPDATE `movie` SET 
        `title` = ? ,
         `title_english`= ? ,
          `title_long` = ? ,
           `slug` = ?,
            `year` =?,
              `description_intro` = ? ,
               `description_full` = ?,
                `yt_trailer_code` = ?,
                 `language` = ?,
                  `updated_at` = current_timestamp() WHERE `id` = ?",[
                      $title,
                      $title_english,
                      $title,
                      $title,
                      $year_released,
                      $description_intro,
                      $description_full,$youtube_code,$movie_language,$videoId])){
                        $response['success'] = true;
                      }else{
                        $response['success'] = false;
                      }
    break;
    case 'getVideo':        $id = $data['videoId'];
        $response = $db->GetRow('SELECT m.*,group_concat(g.name) as genres
        from movie m inner join movie_genres mg
        on m.id=mg.movie_id
        inner join genre g
        on g.id=mg.genre_id WHERE m.guid = ?
        group by m.id',[$id]);
    break;
    //client part
    case 'registerClient':
        //add new Seller
        $code           = $data['code'];
        $names          = $data['names'];
        $firebaseUID    = $data['firebaseUID'];
        $phone          = $data['phone'];
        $password       = $data['password'];
        $hashPass = hash("sha256",$password);
        if(!empty($firebaseUID)){
            if($db->Check("SELECT * FROM `clients` WHERE `clients`.`firebase_uid` =?",["$firebaseUID"])){
                $response['exist'] = true;
            }else{
                if($db->InsertData("INSERT 
                INTO `clients` (`id`, `names`, `phone`,`code`,`password`, `firebase_uid`,`status`, `created_at`, `updated_at`) 
                VALUES (NULL, ?, ?, ?, ?, ?,?,current_timestamp(), current_timestamp())",
                ["$names","$phone","$code","$hashPass","$firebaseUID","Pending"])){
                    $response['success'] = true;
                    
                    $_SESSION['userEmail'] = $phone;
                    $_SESSION['user_password'] = 'true';
                    $_SESSION['type'] = 1;

                }else{
                    $response['success'] = false;
                }
            }
        }else{
            $response['success'] = false;
        }
    break;
    //login operations
    case 'loginClient':
        //add new Seller
        $phone          = $data['phone'];
        $password       = $data['password'];
        $hashPass = hash("sha256",$password);
        if($user = $db->GetRow("SELECT * FROM `clients` WHERE `clients`.`phone` =? AND `clients`.`password` =?",["$phone","$hashPass"])){
            $response['success'] = true;
            $_SESSION['userEmail'] = $phone;
            $_SESSION['user_password'] = 'true';
            $_SESSION['type'] = 1;
            
        }else{
            $response['exist'] = false;
        }
    break;
    case 'getMyInfo':
        //edit Genre
        $code = $data['code'];
        if($response = $db->GetRow("SELECT * FROM clients WHERE `clients`.`code` =?",[$code])){
            
        }else{
            $response['success'] = false;
        }
    break;
    case 'updateInfo':
        $code    =$data['code'];
        $email   =$data['email'];
        $names   =$data['names'];
        $address =$data['address'];
        if($db->UpdateData("UPDATE clients SET clients.email = ? , clients.names =? ,clients.address = ? 
        WHERE clients.code = ? ",["$email","$names","$address","$code"])){
            $response['success'] = true;
        }else{
            $response['success'] = false;
        }

    break;

    
    //logout operations
    case 'logout':
        //SIGNOUT
        session_destroy();
        $response['success'] = true;
}
echo json_encode($response);

