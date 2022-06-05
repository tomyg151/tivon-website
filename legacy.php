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
      <script type="text/javascript">
        function saveEdits() {
            //get the editable element
            var editElem = document.getElementById("history_txt");

            //get the edited element content
            var userVersion = editElem.innerHTML;

            //save the content to local storage
            localStorage.userEdits = userVersion;

            //write a confirmation to the user
            document.getElementById("update").innerHTML="Edits saved!";

         }

         function checkEdits() {

            //find out if the user has previously saved edits
            if(localStorage.userEdits!=null)
            document.getElementById("history_txt").innerHTML = localStorage.userEdits;
         }
      </script>

   </head>

 
   <body onload="checkEdits()" style="background-image: url('images/background.png') ;">
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
      <?php if (!empty($_SESSION['username'])){?>
            <?php $_POST['edit'] = "true" ?>
      <?php } ?>
      <?php if (empty($_SESSION['username'])){?>
         <?php $_POST['edit'] = "false" ?>
      <?php } ?>
      <div id="update"> - Edit the text and click to save for next time</div>
 
      <p contentEditable=<?php echo $_POST['edit']?> class="text-end fw-bolder text-light" name="history_txt" id="history_txt" dir="rtl" style="background-color:rgba(255,0,0,0.5)">      
         בשנת 1955 הוקמה אגודת הפועל קריית טבעון בכדורמים ומאז הפכה לשם דבר בענף ועימה הפך הספורט למוביל בקרית טבעון ובישובי הסביבה
         .האגודה הוקמה בימיה הראשונים על ידי יהודים שעלו לארץ מהונגריה ורומניה וראשית שיחקו בשכונת בת גלים בחיפה עד שהגיעו לכמה יישובים בצפון בהם קריית טבעון והמשיכו לשחק את המשחק
         .כבר מההתחלה היה מיזוג בין שחקני הכדור מים לשחיינים וחלקם שיחקו בקבוצה המקומית ושחו בנבחרת המקומית במקביל
         .בשנת 1957 החל מיכה קניץ לאמן ילדים ונוער בכדורמים, והקים את אגודת הפועל קריית טבעון בכדורמים
         .בשנת 1962, בעקבות חילוקי דעות במועדון הפועל חיפה, פרשו ממנה מרבית השחקנים בהנהגתו של קניץ, ועברו להפועל קריית טבעון, בה שימש קניץ כמאמן-שחקן
         .הקבוצה שילבה נוער מטבעון וותיקים מחיפה, והשתלבה בצמרת הליגה הלאומית בכדורמים. בין מאמני הקובצה היה וילי ראושניץ שאימן גם נבחרת ישראל
         .האגודה היא קבוצת הכדורמים הוותיקה במדינת ישראל
         .במשך השנים היא הפכה לבית גידול לשחקני הכדורמים של הצפון וסיפקה שחקנים ושחיינים רבים לנבחרות ישראל בכדורמים
         <input type="button" value="save my edits" onclick="saveEdits()"/>         
      </p>



      
   </body>

</html>