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

   </head>

 
   <body style="background-image: url('images/background.png') ;">
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

      <h1>legasy page</h1>
      <?php echo $_SESSION['username']; ?>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   </body>

</html>