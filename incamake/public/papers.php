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
      <title><?php echo SITENAME;?> - Ibitangaza Makuru</title>
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
            <div class="video-block section-padding">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-title">
                            
                            <h6>Ibitangaza Makuru</h6>
                        </div>
                    </div>
                    <div id="newspapers" class="row">

                    </div>
                    
                </div>
                <!-- <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center pagination-sm mb-4">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav> -->
            </div>
            <hr>
           
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
      <script>
        $.ajax({
          type: 'GET',
          url: URLROOT+'operations.php',
          data: {
            'action': 'ibinyamakuru',
          },
          success: function (data){
            $('#newspapers').append(data);
            
          }
        })
        </script>
   </body>

 </html>