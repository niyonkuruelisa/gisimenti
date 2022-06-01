<?php require_once '../bootstrap.php';
require_once 'publicOps.php';
?>
<!DOCTYPE html>
<html lang="en">
   
 <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Askbootstrap">
      <meta name="author" content="Askbootstrap">
      <title><?php echo SITENAME;?> - Contact Us</title>
      <!-- load css and favicon image -->
      <?php require_once '../css.php';?>
   </head>
   <body id="page-top">
   
   
   <!-- navbar -->
   <?php require_once 'partials/_nav.php';?>
      
      <div id="app">
      <div id="wrapper">
         <!-- Sidebar -->
         <?php require_once 'partials/_sidebar.php';?>
         
         <div id="content-wrapper">
            <div class="container-fluid">
                
            </div>
            <!-- /.container-fluid -->
            
            <!-- Sticky Footer -->
            <?php require_once 'partials/_footer.php'?>
         </div>
         <!-- /.content-wrapper -->
      </div>
      <!-- /#wrapper -->
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
      </a>
      </div>
      <!-- modals -->
      <?php require_once 'partials/_modals.php' ;?>
      <!-- load js -->
      <?php require_once '../js.php' ;?>
      <script src="../js/vue/admin/home.js"></script>
   </body>

 </html>