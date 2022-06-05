
<?php

   session_start();

   include "db.php";
   include "retrive.php";
   include "function.php";
   include "logic.php";
   include "headerFooter.php";

   //qury to get all players
   $sql = "SELECT * FROM `players`";
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

   </head>
  
   <body style="background-image: url('images/background.png') ;" style="padding-bottom: 60px;">
    <nav>
      <label for="click" class="menu-btn">
      <i class="fas fa-bars"></i>
      </label>
      <ul>
      <li><a href="schedule.php">מערכת שעות</a></li>
            <li><a href="memorialization.php">הנצחה</a></li>
            <li><a href="legacy.php">מורשת</a></li>
            <li><a href="gallery.php">גלריה</a></li>
            <li><a href="update.php">עידכונים</a></li>
            <li><a href="player.php">שחקנים</a></li>
            <li><a href="team.php">קבוצות</a></li>
       </ul>
      </nav>
      <div class = "container-xlg py-3" style="background-color:rgba(255,0,0,0.5);"> 
         <div>
            <?php if (!empty($_SESSION['username'])){?>
               <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalTogglePlayer">
                  שחקן בוגר חדש
                  </button>
            <?php } ?>

               <div class="modal fade" id="ModalTogglePlayer" aria-hidden="true" aria-labelledby="ModalToggleLabel" tabindex="-1">
               <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header"style="background-color:rgb(29,0,51);" > <h2 style="color:rgb(178, 45, 35);">Player Details:</h2>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" ></button>
                  </div>
                  <div class="modal-body" style="background-color:rgb(29,0,51);">
                  <form name="form" method="post" action="player.php" enctype="multipart/form-data" >&nbsp;
                  <input type="text" name="pId" placeholder="Hat Number" class="form-control">&nbsp;
                  <input type="text" name="Name" placeholder="Full Name" class="form-control">&nbsp;
                  <input type="text" name="age" placeholder="Age" class="form-control">&nbsp;
                  <input type="text" name="role" placeholder="Role" class="form-control"><br>
                  <input type="file" name="my_file" style="color:rgb(178, 45, 35);"/><br /><br />
                  <input type="submit" name="Upload" value="העלאה" class="btn btn-danger"/>
                  </form>
                  </div>
               </div>
            </div>
         </div>
         </div>
         <h1 class="display-6 text-center fw-bolder" style="color:rgb(25, 33, 133);">שחקני הקבוצה הבוגרת</h1>
         <div class="row my-5 align-items-center justify-content-center">
         <?php while($rows = $query -> fetch_assoc()){?>
            <?php if( $rows['tId'] === "1"){?>
               <div class="col-3">
                  <div class="card my-3 border-primary border-2" style="background-color:rgb(236,157,157);">
                     <div class="card-body text-center py-4">
                        <h4 class="card-title"style="color:rgb(61,53,134)"><?php echo $rows['Name'];?></h4>
                        <p class="lead card-subtitle"style="color:rgb(61,53,134)"><?php echo $rows['role'];?></p>
                        <p class="lead card-subtitle"style="color:rgb(61,53,134)"><?php echo $rows['age'];?></p>
                        <img src="<?php echo $rows['imgsrc'];?>" class="card-img-bottom" alt="s1">
                        <?php if (!empty($_SESSION['username'])){?>
                        <form method="POST">
                           <button class="btn btn-outline-danger my-2" value="<?php echo $rows['pId'];?>" name="deletePlayer">מחק</button>
                        </form>
                        <?php } ?>
                     </div>
                  </div>
               </div>
            <?php } ?>
         <?php } ?>
         </div>

         
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <footer class="bg-danger">
        <div class="container-lg ">
         <div class="row justify-content-start ">
            <div class="col-1 py-1 text-center ">
               <!-- <img src="shopingLogo.jpg" class="img-fluid" alt="shoping logo"> -->
               <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
            </div>
            <div class="col-1 py-2 text-center">
               <a href="https://www.instagram.com/accounts/login/?next=/waterpolo_tivon/">
                 <!-- <img src="instagramLogo.jpg" class="img-fluid" alt="insta logo" > -->
                 <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                 </svg>
               </a> 
              </div>
              <div class="col-1 py-2 text-center">
               <a href="https://www.facebook.com/kiryattivonwaterpolo/"> 
                 <!-- <img src="facbookLogo.jpg" class="img-fluid" alt="facbook logo" > -->
                 <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                 </svg>
               </a>
              </div>
            <div class="text-end">
               <h2 class="text-end fw-bolder">All rights reserved to Tom&Dennis ©</h2>
            </div>
            <div class="text-end">
               <h4 class="text-end fw-bolder"> contact: 052-690-9944</h4>
        </div>
      </footer>
   </body>

  
</html>