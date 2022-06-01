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
      <title><?php echo SITENAME;?></title>
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
                <div class="row">
                    <div class="col-md-8 mx-auto text-center">
                        <a class="btn btn-outline-success" href="<?php echo URLROOT;?>"><i class="mdi mdi-home"></i>SUBIRA AHABANZA</a>
                        <br><br><a class="btn btn-primary" target="_blank" href="<?php echo $getArticle['link'];?>"><i class="mdi mdi-home"></i>KANDA USOME INKURU IRAMBUYE: <?php echo $getArticle['name'];?></a>
                    </div>
                    <div class="col-md-8 mx-auto text-center  pt-4 pb-5">
                    <h1><?php echo $getArticle['title'];?></h1>
                        <h1><img alt="<?php echo $getArticle['name'];?>" src="<?php echo $getArticle['thumbnail'];?>" class="img-fluid"></h1>
                        
                        <!-- <p class="land">Unfortunately the page you are looking for has been moved or deleted.</p> -->
                       
                    </div>
                </div>
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