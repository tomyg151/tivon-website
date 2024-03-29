
<?php

session_start();


include "db.php";
include "retrive.php";
include "function.php";
include "logic.php";
include "headerFooter.php";

$sql = "SELECT  COUNT(*) as 'Count', 
            coach.Name as 'Coach'
            FROM teams
            JOIN coach
            ON coach.cId = teams.cId
            GROUP BY coach.Name
            ";
$query = mysqli_query($conn, $sql);




?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

   <head>
      <meta charset="utf-8">
      <title> HWPC tivon</title>
      <link rel="stylesheet" href="style.css">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
      <script src="jquery-3.6.0.min.js"></script>
      <link rel="stylesheet" type="text/css" href="css/print.css" media="print" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      
      <style type="text/css">
         .watermark { display: none; }

         @media print {
         header, footer, nav, button, #joind, input {display: none !important;}
            /*adding text at the end of the printed page*/
            body:after{
                content:"All rights reserved to Tom&Dennis © contact: 052-690-9944";
            }
            .watermark {
            display: block;
            }	

         }
               
      </style>



   </head>

   <body style="background-image: url('images/background.png') ;">
   
   
        
      <div class = "container-xlg py-3">
      <?php
      date_default_timezone_set('Asia/Jerusalem');
      $date = date('d-m-y h:i:s');
      ?>
         <div class="row my-5 align-items-center justify-content-center">
            <div class="col-5">
            <div class="watermark my-3 ">מועדון כדורמים קרית טבעון   <img src="images/TivonLogo.PNG" height="50" width="100" >
            </div>
               <!-- Bulding card for each proffesinal player in the db -->
               <div class="card">
                  <div class="card-header text-center" dir ="rtl">
                     דו"ח כמות קבוצות למאמן 
                  </div>
                  <div class="card-body" id="GalleryReport">
                  <h5 class="card-title text-center fw-bolder fs-3" dir ="rtl">כמויות:</h5>
                  <p class="card-text fs-6 fw-bold text-center" dir="rtl">זמן יצירת הדו"ח <?php echo $date; ?></p>
                  <div class="row my-5 justify-content-center">
                     <div class="col">
                     <table class="table table-striped">
                        <thead>
                           <tr>
                              <th scope="col">Coach Name</th>
                              <th scope="col">Team Count</th>
                           </tr>
                        </thead>
                           <tbody>
                                <?php
                                    while($rows = $query -> fetch_assoc()){
                                        ?>
                                        <tr>
                                        <td><?php echo $rows['Coach']?></td>
                                        <td><?php echo $rows['Count']?></td>
                                        </tr>
                                    <?php } ?>
                           </tbody>
                        </table>
                        </div>
                    </div>
                  </div>
               </div>
               <button type="button" class="btn btn-primary my-3" onclick="window.print()">הדפס</button>
            </div>
         </div>

      </div>

      
   


      <footer style="background-color:rgba(255,0,0,0.5)">
      <div class="row justify-content-start ">
         <div class="col-1 mt-3 text-center ">
            <!-- <img src="shopingLogo.jpg" class="img-fluid" alt="shoping logo"> -->
            <a href="https://turboswim.com/en/">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
               <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
               </svg>
            </a>
         </div>
         <div class="col-1 mt-3 text-center">
            <a href="https://www.instagram.com/accounts/login/?next=/waterpolo_tivon/">
               <!-- <img src="instagramLogo.jpg" class="img-fluid" alt="insta logo" > -->
               <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
               </svg>
            </a> 
         </div>
         <div class="col-1 mt-3 text-center">
            <a href="https://www.facebook.com/kiryattivonwaterpolo/"> 
               <!-- <img src="facbookLogo.jpg" class="img-fluid" alt="facbook logo" > -->
               <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
               </svg>
            </a>
         </div>
         <div id="credit" class= "col mt-3 me-3 text-center">
            <h6 class="text-end fw-bolder text-uppercase">All rights reserved to Tom&Dennis ©<br>contact: 052-690-9944</h6>
            <!-- <h4 class="text-end fw-bolder text-uppercase pe-3 pb-5"> contact: 052-690-9944</h4> -->
         </div>
         <!-- <div class="text-end">
           
         </div> -->
      </div>
  </footer>
   </body>

</html>