<?php
  // logic for the login to the website takes parmeters to the db and than confirms it
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

  //logic to discconect from the website.
  if(isset($_POST['logout'])){
      session_destroy();
      header("Refresh:0");
      exit();
  }
  //logic to delete player from db with the player id.
  if(isset($_POST['deletePlayer'])){
    deletePlayer($conn,$_POST['HatNum']);
    unset($_POST);
}
  //logic to delete team from db with the team id.
  if(isset($_POST['deleteTeam'])){
    deleteTeam($conn,$_POST['tId']);
    unset($_POST);
  }
   //logic to delete kid from db with the kid id.
   if(isset($_POST['deleteKid'])){
    deleteKid($conn,$_POST['kId']);
    unset($_POST);
  }

     //logic to add kid to db.
     if(isset($_POST['addKid'])){
      date_default_timezone_set('Asia/Jerusalem');
      $jdate = date('d-m-y');
      addKid($conn,$_POST['NameK'],$_POST['tId'],$jdate);
      unset($_POST);
    }

  //uploading image and details for player from user input to db.
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

  //uploading image and details to team from user input to db.
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

  //uploading image to gallery from user input to db.
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
  //deleting image from gallery to db.
  if(isset($_POST['deleteImg'])){
    $filename = 'gallery/'.$_POST['imgName'];
    if (unlink($filename)) {
      echo 'The file ' . $filename . ' was deleted successfully!';
    } else {
      echo 'There was a error deleting the file ' . $filename;
    }
        
  }

   //logic to register history of and user change
   if(isset($_POST['History'])){
    addUserHistory($conn,$_POST['userName'],$_POST['Hdate'],$_POST['History']);
    unset($_POST);
  }
   //logic to submit new coach to DB
   if(isset($_POST['addCoach'])){
    addCoach($conn,$_POST['CName']);
    unset($_POST);
  }
    //logic to add coach to team
    if(isset($_POST['addCtT'])){
      addCoachToTeam($conn,$_POST['CName'],$_POST['tId']);
      unset($_POST);
    }

    //logic to delete coach from db
    if(isset($_POST['deleteCoach'])){
      deleteCoach($conn,$_POST['Cname'],$_POST['tId']);
      unset($_POST);
    }

    //logic to add new equipment db
    if(isset($_POST['addSupply'])){
      addSupply($conn,$_POST['id'],$_POST['name'],$_POST['total']);
      unset($_POST);
    }

    //logic to update existing equipment db
    if(isset($_POST['updateSupply'])){
      updateSupply($conn,$_POST['id'],$_POST['total'],$_POST['taken']);
      unset($_POST);
    }
    //logic to delete existing equipment db
    if(isset($_POST['deleteS'])){
      deleteSupply($conn,$_POST['id']);
      unset($_POST);
    }
          
        
  
 

?>
  <!--login modal to sign in to the website  -->
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


  <!--adding new team  modal -->
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

  <!-- adding new proffesinal player to qirayt tivobn wc modal-->
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
  <!-- adding new photo to gallery modal-->
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

    <!-- adding new u18 player to a existing team  modal-->
      <div class="modal fade" id="ModalToggleKid" aria-hidden="true" aria-labelledby="ModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"style="background-color:rgb(29,0,51);" > <h2 style="color:rgb(178, 45, 35);">Player U18 and Girls Senior Details:</h2>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body" style="background-color:rgb(29,0,51);">
            <form name="form" method="post" action="team.php">&nbsp;
            <input type="text" name="NameK" placeholder="Full Name" class="form-control">&nbsp;
            <input type="text" name="tId" placeholder="Team ID" class="form-control">&nbsp;
            <button type="submit" name="addKid" value = "addKid" class="btn btn-outline-light mt-3">Add</button>
            </form>
            </div>
        </div>
      </div>
  </div>

  <!-- deleting proffsinal player from db with player id modal-->
  <div class="modal fade" id="ModalDeletePlayer" aria-hidden="true" aria-labelledby="ModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"style="background-color:rgb(29,0,51);" > <h2 style="color:rgb(178, 45, 35);">Delete Player:</h2>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body" style="background-color:rgb(29,0,51);">
            <form name="form" method="post" action="player.php">&nbsp;
            <input type="text" name="HatNum" placeholder="Hat number" class="form-control">&nbsp;
            <button type="submit" name="deletePlayer" value ="deletePlayer" class="btn btn-outline-danger mt-3">Delete</button>
            </form>
            </div>
        </div>
      </div>
  </div>

    <!-- deleting team from db with team id modal-->
    <div class="modal fade" id="ModalDeleteTeam" aria-hidden="true" aria-labelledby="ModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"style="background-color:rgb(29,0,51);" > <h2 style="color:rgb(178, 45, 35);">Delete Team:</h2>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body" style="background-color:rgb(29,0,51);">
            <form name="form" method="post" action="team.php">&nbsp;
            <input type="text" name="tId" placeholder="Team number" class="form-control">&nbsp;
            <button type="submit" name="deleteTeam" value ="deleteTeam" class="btn btn-outline-danger mt-3">Delete</button>
            </form>
            </div>
        </div>
      </div>
  </div>

    <!-- deleting kid from db with kid id modal-->
    <div class="modal fade" id="ModalDeleteKid" aria-hidden="true" aria-labelledby="ModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"style="background-color:rgb(29,0,51);" > <h2 style="color:rgb(178, 45, 35);">Delete U18 Player:</h2>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body" style="background-color:rgb(29,0,51);">
            <form name="form" method="post" action="team.php">&nbsp;
            <input type="text" name="kId" placeholder="ID" class="form-control">&nbsp;
            <button type="submit" name="deleteKid" value ="deleteKid" class="btn btn-outline-danger mt-3">Delete</button>
            </form>
            </div>
        </div>
      </div>
  </div>

     <!-- deleting img from gallery folder with img name modal-->
     <div class="modal fade" id="ModalDeleteImg" aria-hidden="true" aria-labelledby="ModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"style="background-color:rgb(29,0,51);" > <h2 style="color:rgb(178, 45, 35);">Delete Photo:</h2>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body" style="background-color:rgb(29,0,51);">
            <form name="form" method="post" action="gallery.php">&nbsp;
            <input type="text" name="imgName" placeholder="name.png/jpeg/jpg.." class="form-control">&nbsp;
            <button type="submit" name="deleteImg" value ="deleteImg" class="btn btn-outline-danger mt-3">Delete</button>
            </form>
            </div>
        </div>
      </div>
  </div>

   <!-- adding new coach modal-->
   <div class="modal fade" id="ModalToggleCoach" aria-hidden="true" aria-labelledby="ModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"style="background-color:rgb(29,0,51);" > <h2 style="color:rgb(178, 45, 35);">Coach Details:</h2>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body" style="background-color:rgb(29,0,51);">
            <form name="form" method="post" action="index.php" >&nbsp;
            <input type="text" name="CName" placeholder="Full Name" class="form-control">&nbsp;
            <input type="submit" name="addCoach" value="העלאה" class="btn btn-danger my-3"/>
            </form>
            </div>
        </div>
      </div>
  </div>

     <!-- adding coach to team modal-->
     <div class="modal fade" id="ModalToggleCtT" aria-hidden="true" aria-labelledby="ModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"style="background-color:rgb(29,0,51);" > <h2 style="color:rgb(178, 45, 35);">Coach to Team:</h2>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body" style="background-color:rgb(29,0,51);">
            <form name="form" method="post" action="index.php" >&nbsp;
            <input type="text" name="CName" placeholder="Coach Name" class="form-control">&nbsp;
            <input type="text" name="tId" placeholder="Team ID" class="form-control">&nbsp;
            <input type="submit" name="addCtT" value="העלאה" class="btn btn-danger my-3"/>
            </form>
            </div>
        </div>
      </div>
  </div>

      <!-- deleting coach modal-->
      <div class="modal fade" id="ModalDeleteCoach" aria-hidden="true" aria-labelledby="ModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"style="background-color:rgb(29,0,51);" > <h2 style="color:rgb(178, 45, 35);">Delete Coach:</h2>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body" style="background-color:rgb(29,0,51);">
            <form name="form" method="post" action="team.php">&nbsp;
            <input type="text" name="Cname" placeholder="Full Name" class="form-control">&nbsp;
            <input type="text" name="tId" placeholder="Team ID" class="form-control">&nbsp;
            <button type="submit" name="deleteCoach" value ="deleteCoach" class="btn btn-outline-danger mt-3">Delete</button>
            </form>
            </div>
        </div>
      </div>
  </div>

  <!-- adding new equipment modal-->
  <div class="modal fade" id="ModalToggleNsupply" aria-hidden="true" aria-labelledby="ModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header"style="background-color:rgb(29,0,51);" > <h2 style="color:rgb(178, 45, 35);">New equipment:</h2>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" ></button>
        </div>
        <div class="modal-body" style="background-color:rgb(29,0,51);">
        <form name="form" method="post" action="reportSupply.php">&nbsp;
        <input type="text" name="id" placeholder="Cataluge Name" class="form-control">&nbsp;
        <input type="text" name="name" placeholder="Name" class="form-control">&nbsp;
        <input type="text" name="total" placeholder="Total" class="form-control">&nbsp;
        <button type="submit" name="addSupply" value ="addSupply" class="btn btn-outline-danger mt-3">Add</button>
        </form>
        </div>
      </div>
    </div>
  </div>

<!-- Updating equipment modal-->
<div class="modal fade" id="ModalToggleUsupply" aria-hidden="true" aria-labelledby="ModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header"style="background-color:rgb(29,0,51);" > <h2 style="color:rgb(178, 45, 35);">Update equipment:</h2>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" ></button>
        </div>
        <div class="modal-body" style="background-color:rgb(29,0,51);">
        <form name="form" method="post" action="reportSupply.php">&nbsp;
        <input type="text" name="id" placeholder="Cataluge Name" class="form-control">&nbsp;
        <input type="text" name="total" placeholder="Total" class="form-control">&nbsp;
        <input type="text" name="taken" placeholder="In Use" class="form-control">&nbsp;
        <button type="submit" name="updateSupply" value ="updateSupply" class="btn btn-outline-success mt-3">Update</button>
        <button type="submit" name="deleteS" value ="deleteS" class="btn btn-outline-danger mt-3">Delete</button>
        </form>
        </div>
      </div>
    </div>
  </div>


  



