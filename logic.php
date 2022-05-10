<?php

    if(isset($_POST['login'])){
        $result = login($conn , $username, $password);

        foreach($result as $r){

            if($password === $r['password']){
                $_SESSION['username'] = $r['username'];
                
            }
        }
    }

    if(isset($_POST['logout'])){
        session_destroy();
        header("Refresh:0");
        exit();
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
=======
?>

