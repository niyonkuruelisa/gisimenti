<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
//including image compression
include_once '../lib/ImageResize/ImageResize.php';
use \Gumlet\ImageResize;

//all response wiill be stored here.
$response = array();
if(isset($_FILES['video'])){
    require_once '../bootstrap.php';
    $parts = explode(".",$_FILES['video']['name']);

    $ext = end($parts);//spilt file name into array
    $folder = md5(rand(1000,1));
    $videoName = md5(rand(1000,1)).'.'.$ext;
    if (!file_exists(APPROOT.'movies/'.$folder)) {
        mkdir(APPROOT.'movies/'.$folder, 0777, true);
    }
    
    if (move_uploaded_file($_FILES["video"]["tmp_name"], APPROOT.'movies/'.$folder.'/'.$videoName)) {
        
        $path = 'movies/'.$folder.'/'.$videoName;
        $name = $_POST['name'];
        $type = $_POST['type'];
        $size = $_POST['size'];
        $response['success'] =  true;
        if($db->InsertData("INSERT INTO `movie` ( `guid`,`type`,`url`, `size`,`file_name`, `created_at`, `updated_at`) 
        VALUES (?, ?, ?, ?,?, current_timestamp(), current_timestamp())",[$function->GUIDv4(),$type,"$path", $size,$name])){
            $response['success'] =  true;
            $response['id'] = $db->GetRow("SELECT id FROM movie WHERE url = ?",[$path])["id"];
        }else{
            $response['success'] =  false;
        }    
        
    }else{
        $response['success'] =  false;
    }

 }else if(isset($_FILES['thumbnail'])){
    require_once '../bootstrap.php';
    $parts = explode(".",$_FILES['thumbnail']['name']);

    $ext = end($parts);//spilt file name into array
    $folder = md5(rand(1000,1));
    $imageName = md5(rand(1000,1)).'.jpg';
    if (!file_exists(APPROOT.'moviesThumbnail/'.$folder)) {
        mkdir(APPROOT.'moviesThumbnail/'.$folder, 0777, true);
    }

    if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], APPROOT.'moviesThumbnail/'.$folder.'/'.$imageName)) {
        //Crop Image And REplace with existing One.
        $image = new ImageResize(APPROOT.'moviesThumbnail/'.$folder.'/'.$imageName);
        $image->crop(400, 200);
        $image->save(APPROOT.'moviesThumbnail/'.$folder.'/'.$imageName);
        //prepare to save image path
        $path    = 'moviesThumbnail/'.$folder.'/'.$imageName;
        $movieId = $_POST['movieId'];
        $response['success'] =  true;
        if($db->UpdateData("UPDATE movie SET movie.thumbnail = ? WHERE movie.id = ?",["$path", $movieId])){
            $response['success'] =  true;
        }else{
            $response['success'] =  false;
        }
    }else{
        $response['success'] =  false;
    }
    
 }
 echo json_encode($response);