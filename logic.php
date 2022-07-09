<?php

  if(isset($_POST['login'])){
      $result = login($conn , $username, $password);

      foreach($result as $r){

          if($password === $r['password']){
              $_SESSION['username'] = $r['username'];
              echo '<script>alert("welcome")</script>';
              
          }
          else{
            echo '<script>alert("Wrong password")</script>';
          }
      }
  }

  if(isset($_POST['logout'])){
      session_destroy();
      header("Refresh:0");
      exit();
  }
  if(isset($_POST['deletePlayer'])){
    deletePlayer($conn,$_POST['deletePlayer']);
    
}
  if(isset($_POST['deleteTeam'])){
    deleteTeam($conn,$_POST['deleteTeam']);
  
  }


  if(isset($_POST['Upload'])){
    if (($_FILES['my_file']['name']!="")){
      // Where the file is going to be stored
        $target_dir = "playersimages/";
        $file = $_FILES['my_file']['name'];
        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];
        $temp_name = $_FILES['my_file']['tmp_name'];
        $path_filename_ext = $target_dir.$filename.".".$ext;
        move_uploaded_file($temp_name,$path_filename_ext);}
        newPlayerAdult($conn, $_POST['pId'], $_POST['Name'], $_POST['age'],$_POST['role'], $path_filename_ext);
        unset($_POST);
  }

  if(isset($_POST['UploadTeam'])){
    if (($_FILES['my_file']['name']!="")){
      // Where the file is going to be stored
        $target_dir = "images/";
        $file = $_FILES['my_file']['name'];
        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];
        $temp_name = $_FILES['my_file']['tmp_name'];
        $path_filename_ext = $target_dir.$filename.".".$ext;
        move_uploaded_file($temp_name,$path_filename_ext);}
        newTeam($conn,$_POST['tId'],$_POST['Tname'], $path_filename_ext);
        unset($_POST);
  }

  if(isset($_POST['UploadGalleryPhoto'])){
    if (($_FILES['my_file']['name']!="")){
      // Where the file is going to be stored
        $target_dir = "gallery/";
        $file = $_FILES['my_file']['name'];
        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];
        $temp_name = $_FILES['my_file']['tmp_name'];
        $path_filename_ext = $target_dir.$filename.".".$ext;
        move_uploaded_file($temp_name,$path_filename_ext);}
        unset($_POST);
        unset($_FILES);
  }
        
  
 

?>
  <div class="modal fade" id="ModalToggle" aria-hidden="true" aria-labelledby="ModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Sign in</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-darl">
        <form method="POST" class="bg-dark text-white p-5 rounded-lg">
          <h2 class="my-3 text-center text-warning">Sign in</h2>
          <input type="text" name="username" placeholder="Username" class="form-control">
          <input type="password" name="password" placeholder="Password" class="form-control mt-3">
          <button type="submit" name="login" value = "login" class="btn btn-outline-light mt-3">Login</button>
        </form>
      </div>
    </div>
    </div>
  </div>

  <div>
         <div class="modal fade" id="ModalToggleTeam" aria-hidden="true" aria-labelledby="ModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header"style="background-color:rgb(29,0,51);" > <h2 style="color:rgb(178, 45, 35);">Team Details:</h2>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body" style="background-color:rgb(29,0,51);">
            <form name="form" method="post" action="team.php" enctype="multipart/form-data" >&nbsp;
            <input type="text" name="tId" placeholder="Team Number" class="form-control">&nbsp;
            <input type="text" name="Tname" placeholder="Team Name" class="form-control">&nbsp;
            <input type="file" name="my_file" style="color:rgb(178, 45, 35);"/><br /><br />
            <input type="submit" name="UploadTeam" value="העלאה" class="btn btn-danger"/>
            </form>
            </div>
            </div>
            </div>
         </div>
      </div>

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

      <div class="modal fade" id="ModalTogglePhoto" aria-hidden="true" aria-labelledby="ModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
               <div class="modal-header"style="background-color:rgb(29,0,51);" > <h2 style="color:rgb(178, 45, 35);">New photo:</h2>
               <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" ></button>
               </div>
               <div class="modal-body" style="background-color:rgb(29,0,51);">
                  <form name="form" method="post" action="gallery.php" enctype="multipart/form-data" >&nbsp;
                  <input type="file" name="my_file" style="color:rgb(178, 45, 35);"/><br /><br />
                  <input type="submit" name="UploadGalleryPhoto" value="העלאה" class="btn btn-danger"/>
                  </form>
               </div>
               </div>
            </div>
         </div>

         <div class="modal fade" id="ModalToggleKid" aria-hidden="true" aria-labelledby="ModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-header"style="background-color:rgb(29,0,51);" > <h2 style="color:rgb(178, 45, 35);">Player U18 Details:</h2>
               <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" ></button>
               </div>
               <div class="modal-body" style="background-color:rgb(29,0,51);">
               <form name="form" method="post" action="team.php">&nbsp;
               <input type="text" name="Name" placeholder="Full Name" class="form-control">&nbsp;
               <input type="text" name="age" placeholder="Team ID" class="form-control">&nbsp;
               <button type="submit" name="addKid" value = "addKid" class="btn btn-outline-light mt-3">Add</button>
               </form>
               </div>
            </div>
         </div>
      </div>

  



