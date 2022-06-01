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
      <style>
      .lds-roller {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-roller div {
  animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  transform-origin: 40px 40px;
}
.lds-roller div:after {
  content: " ";
  display: block;
  position: absolute;
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: #fff;
  margin: -4px 0 0 -4px;
}
.lds-roller div:nth-child(1) {
  animation-delay: -0.036s;
}
.lds-roller div:nth-child(1):after {
  top: 63px;
  left: 63px;
}
.lds-roller div:nth-child(2) {
  animation-delay: -0.072s;
}
.lds-roller div:nth-child(2):after {
  top: 68px;
  left: 56px;
}
.lds-roller div:nth-child(3) {
  animation-delay: -0.108s;
}
.lds-roller div:nth-child(3):after {
  top: 71px;
  left: 48px;
}
.lds-roller div:nth-child(4) {
  animation-delay: -0.144s;
}
.lds-roller div:nth-child(4):after {
  top: 72px;
  left: 40px;
}
.lds-roller div:nth-child(5) {
  animation-delay: -0.18s;
}
.lds-roller div:nth-child(5):after {
  top: 71px;
  left: 32px;
}
.lds-roller div:nth-child(6) {
  animation-delay: -0.216s;
}
.lds-roller div:nth-child(6):after {
  top: 68px;
  left: 24px;
}
.lds-roller div:nth-child(7) {
  animation-delay: -0.252s;
}
.lds-roller div:nth-child(7):after {
  top: 63px;
  left: 17px;
}
.lds-roller div:nth-child(8) {
  animation-delay: -0.288s;
}
.lds-roller div:nth-child(8):after {
  top: 56px;
  left: 12px;
}
@keyframes lds-roller {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
/* Mobile Media */
/* Extra small devices (portrait phones, less than 576px) */
/* @media (max-width: 575.98px) {
    .video-card {
        display: inline !important;
    }
    .video-card-image {
      flex: auto !important;
    }

} */
      </style>
   </head>
   <body id="page-top" >
   
   
   <!-- navbar -->
   <?php require_once 'partials/_nav.php';?>
      
      <div id="app">
      <div id="wrapper">
         <!-- Sidebar -->
         <?php require_once 'partials/_sidebar.php';?>
         
         <div id="content-wrapper">
            <div class="container-fluid">
               <center>
                  <div class="top-category section-padding mb-4">
                  <div class="lds-roller" id="loader">
                  <div>
                  </div>
                  <div>
                  </div>
                  <div>
                  </div>
                  <div></div><div></div><div></div><div></div><div></div></div>
               
                  
               </div>
               </center>
               <hr style="border-top:0px;">
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <!-- <div class="btn-group float-right right-action">
                              <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right">
                                 <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Most Liked</a>
                                 <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Most Viewed</a>
                                 <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                              </div>
                           </div> -->
                           <center><h4>Incamake z'Amakuru</h4></center>
                        </div>
                     </div>
                     <!-- insert everything here -->
                     <div class=" row" id="articles">
                           
                     </div>
                     
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
      <script>
      
        loadData();

        function getData(){
         $.ajax({
            type: 'GET',
            url: URLROOT+'umuryango.php',
            success: function (data){
               done = true;
            }
         })
         $.ajax({
            type: 'GET',
            url: URLROOT+'umuseke.php',
            success: function (data){
               done = true;
            }
         })
         $.ajax({
            type: 'GET',
            url: URLROOT+'bwiza.php',
            success: function (data){
               done = true;
            }
         })
         $.ajax({
            type: 'GET',
            url: URLROOT+'igihe.php',
            success: function (data){
              done = true;
              loadData();
            }
         })
        }
        function loadData(){
         $.ajax({
               type: 'POST',
               url: URLROOT+'operations.php',
               data: {
                  'action': 'getHomeNews',
               },
               success: function (data){
                  $('#articles').html(data);
                  $('#loader').hide();
                  $('#websites').show();
                  $.ajax({
                    type: 'POST',
                    url: URLROOT+'operations.php',
                    data: {
                      'action': 'ClearHistory',
                    },
                    success: function (data){
                      getData();
                      
                    }
                  })
               }
            })
        }
      </script>
   </body>

 </html>