
<?php

session_start();

   include "db.php";
   include "retrive.php";
   include "function.php";
   include "logic.php";
   include "headerFooter.php";
  

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
      <script  type="text/javascript" >
       
       function saveEdits() {
          //get the editable element
          var editElem2 = document.getElementById("club1");
          var editElem3 = document.getElementById("club2");
          var editElem4 = document.getElementById("updateTimeDate");
          var editElem5 = document.getElementById("update_event");
          var editElem6 = document.getElementById("lastcClub1");
          var editElem7 = document.getElementById("lastClub2");
          var editElem8 = document.getElementById("updateScore");
          var editElem9 = document.getElementById("updateLastTimeDate");

          

          //get the edited element content
          var club1 = editElem2.innerHTML;
          var club2 = editElem3.innerHTML;
          var updateTimeDate = editElem4.innerHTML;
          var update_event = editElem5.innerHTML;
          var lastcClub1 = editElem6.innerHTML;
          var lastClub2 = editElem7.innerHTML;
          var updateScore = editElem8.innerHTML;
          var updateLastTimeDate = editElem9.innerHTML;

          //save the content to local storage
          localStorage.updateEdit = club1;
          localStorage.updateEdit1 = club2;
          localStorage.updateEdit2 = updateTimeDate;
          localStorage.updateEdit3 = update_event;
          localStorage.updateEdit4 = lastcClub1;
          localStorage.updateEdit5 = lastClub2;
          localStorage.updateEdit6 = updateScore;
          localStorage.updateEdit7 = updateLastTimeDate;

          //write a confirmation to the user
          document.getElementById("update").innerHTML="Edits saved!";
       }
      
      function checkEdits2() {
          //find out if the user has previously saved edits
          if(localStorage.updateEdit!=null){
          document.getElementById("club1").innerHTML = localStorage.updateEdit;
          }
         if(localStorage.updateEdit1!=null){
         document.getElementById("club2").innerHTML = localStorage.updateEdit1;
         }
         if(localStorage.updateEdit2!=null){
            document.getElementById("updateTimeDate").innerHTML = localStorage.updateEdit2;
         }
         if(localStorage.updateEdit3!=null){
            document.getElementById("update_event").innerHTML = localStorage.updateEdit3;
         }
         if(localStorage.updateEdit4!=null){
            document.getElementById("lastcClub1").innerHTML = localStorage.updateEdit4;
         }
         if(localStorage.updateEdit5!=null){
            document.getElementById("lastClub2").innerHTML = localStorage.updateEdit5;
         }
         if(localStorage.updateEdit6!=null){
            document.getElementById("updateScore").innerHTML = localStorage.updateEdit6;
         }
         if(localStorage.updateEdit7!=null){
            document.getElementById("updateLastTimeDate").innerHTML = localStorage.updateEdit7;
         }

      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   </head>

   <body onload="checkEdits2()" style="background-image: url('images/background.png') ;">


      <?php if (!empty($_SESSION['username'])){?>
               <?php $_POST['edit'] = "true" ?>
         <?php } ?>
      <?php if (empty($_SESSION['username'])){?>
         <?php $_POST['edit'] = "false" ?>
      <?php } ?>


      <?php if (!empty($_SESSION['username'])){?>
         <div id="update"> - Edit the text and click to save for next time
         </div>
      <?php } ?>



         <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center mt-4 ">
         <div class="col">
         <div class="card h-100 border-dark border-2">
         <?php
                        $path = 'gallery';
                        $files = scandir($path);
                        $files = array_diff(scandir($path), array('.', '..'));
            ?>
         <h5 class="card-title text-center fw-bolder fs-4">התמונה האחרונה שהועלתה</h5>
            <div class="card-body">
            <img src="gallery/<?php echo $files[count($files)-1]?>" class="card-img-top" alt="...">
            </div>
         </div>
         </div>
         <div class="col">
         <div class="card h-100 border-dark border-2">
            <div class="card-body">
            <h5 class="card-title text-center fw-bolder fs-4 " dir="rtl">האירוע האחרון</h5>
            <p contentEditable=<?php echo $_POST['edit']?> class="card-text text-end fw-bolder text-dark" id="update_event" dir="rtl">קייטנת יולי-אוגוסט 2022 יוצאת לדרך וגם אתם יכולים להיות שם !!!</p>
            </div>
         </div>
         </div>
         </div>
         <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
         <div class="col my-3 mt-5">
         <div class="card h-100 border-dark border-2">
            <div class="card-body">
               <div class="row">      
                  <h4 class="card-title text-center fw-bolder" dir="rtl">המשחק הבא</h4>
               </div>
                  <div class="row"> 
                     <div class="col-4">
                        <h6 contentEditable=<?php echo $_POST['edit']?> class="text-center" dir="rtl" id="club1">הפועל קריית טבעון </h6>
                     </div>
                  <div class="col-4">
                        <h2 class="display- text-center fw-bolder" id="vs">vs</h2>
                     </div>
                  <div class="col-4">
                        <h6 contentEditable=<?php echo $_POST['edit']?> class="text-center" dir="rtl" id="club2">הפועל גבעת חיים </h6>
                  </div>
               </div>
                     <div>
                        <p contentEditable=<?php echo $_POST['edit']?> class="card-text card-subtitle fw-bolder fs-6 text-center" dir="rtl" id="updateTimeDate"> <br> 12/05/22<br>19:30</p>
                     </div>
               </div>
            </div>
         </div>
         <div class="col my-3 mt-5">
         <div class="card h-100 border-dark border-2">
         <h4 class="card-title text-center fw-bolder" dir="rtl">תוצאת המשחק האחרון</h4>
            <div class="card-body">
               <div class="row"> 
                  <div class="col-4">
                  <!-- <img src="images/TivonLogo.PNG" class="img-fluid" alt="">  -->
                  <h6 contentEditable=<?php echo $_POST['edit']?> class="text-center" dir="rtl" id="lastcClub1">הפועל קריית טבעון </h6>
                  </div>
                  <div class="col-4">
                  <h2 class="display- text-center fw-bolder" id="vs">vs</h2>
                  </div>
                  <div class="col-4">
                  <!-- <img src="..." class="img-thumbnail" alt="...">  -->
                  <h6 contentEditable=<?php echo $_POST['edit']?> class="text-center" dir="rtl" id="lastClub2">הפועל גבעת חיים </h6>
                  </div>
                  <p  contentEditable=<?php echo $_POST['edit']?> class="lead card-subtitle fw-bolder fs-3 text-center " id="updateScore"> 17:6</p>
               </div>
               <div>
                  <p contentEditable=<?php echo $_POST['edit']?> class="lead card-subtitle fw-bolder fs-6 text-center" dir="rtl" id="updateLastTimeDate"> <br> 11/06/22<br>19:30</p>
               </div>
            </div>
         </div>
         </div>
         </div>



         <?php if (!empty($_SESSION['username'])){?>
       <!-- <input type="button" class="btn btn-success" value="save my edits" onclick="saveEdits();"/> -->
         <?php date_default_timezone_set('Asia/Jerusalem');
         $date = date('d-m-y');?>
       <form name="form" method="post" action="update.php">&nbsp;
            <input type="hidden" name="Hdate" value="<?php echo $date?>">
            <input type="hidden" name="userName" value="<?php echo $_SESSION['username']?>">
            <button type="submit" name="History" value ="Update" class="btn btn-success mt-3" onclick="saveEdits();">save my edits</button>
        </form>
      <?php } ?>

         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <footer  style="background-color:rgba(255,0,0,0.5)">
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
         <div class= "col mt-3 me-3 text-center">
            <h6 class="text-end fw-bolder text-uppercase">All rights reserved to Tom&Dennis ©<br>contact: 052-690-9944</h6>
            <!-- <h4 class="text-end fw-bolder text-uppercase pe-3 pb-5"> contact: 052-690-9944</h4> -->
         </div>
         <!-- <div class="text-end">
           
         </div> -->
      </div>
  </footer>
   </body>

</html>