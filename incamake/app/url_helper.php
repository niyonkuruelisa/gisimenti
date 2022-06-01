<?php

  // Simple page redirect
  function redirect($userEmail,$password,$type){
    
    global $db;
    $page ="";
    $loginPage =  "login";
    $adminPage =  "admin/";
    $clientPage = "home/";
    if ($userEmail == '' || $userEmail == null) {
      $page = $loginPage;
    }else{

      if($password == 'true'){

        switch($type){

          case 0:

          if($db->check("SELECT * FROM `system_users` WHERE `system_users`.`email` = ?",["$userEmail"]) == true){
            $page = $adminPage;
          }
          break;
          case 1:

            if($db->check("SELECT * FROM `clients` WHERE `clients`.`phone` = ?",["$userEmail"]) == true){
              $page = $clientPage;
            }
            break;
          default:

          $page = $loginPage;
          break;

      }
        
      }else{
  
        $page =$homepage;
      }
    }

    header('Location: ' . URLROOT . $page);
  }