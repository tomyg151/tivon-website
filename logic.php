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
    unset($_POST);
}

  // $uploaddir = 'playersimages/';
  // $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
  // echo "<p>";
  // echo $uploadfile;
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

  



