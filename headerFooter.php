<header style="background-color:rgba(255,0,0,0.5)">
            <div class="row justify-content-center ">
                  <!-- <a href="#"> -->
                     <div class="col-1 py-2 text-center">
                        <!-- <img src="shopingLogo.jpg" class="img-fluid" alt="shoping logo"> -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                           <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                     </div>
                  </a>
                <div class="col-1 py-2 text-center">
                  <a href="https://www.instagram.com/accounts/login/?next=/waterpolo_tivon/">
                     <!-- <img src="instagramLogo.jpg" class="img-fluid" alt="insta logo" > -->
                     <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                     </svg>
                  </a> 
               </div>
               <div class="col-1 py-2 text-center">
                  <a href="https://www.facebook.com/kiryattivonwaterpolo/"> 
                     <!-- <img src="facbookLogo.jpg" class="img-fluid" alt="facbook logo" > -->
                     <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                     </svg>
                  </a>
               </div>
               <div class="col-1 py-2 text-center">
                  <?php if(empty($_SESSION['username'])){?>
                     <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalToggle">
                     Login
                     </button>
                  <?php }?>
                  <?php if (!empty($_SESSION['username'])){?>
                     <form method="POST">
                        <button class="btn btn-primary" value="logout" name="logout">Log out</button>
                     </form>
                  <?php } ?>
               </div>
               <div class="col text-center mt-3">
                  <h1 class="display-6 text-center fw-bolder" style="color:rgb(25, 33, 133);">כדורמים קרית טבעון</h1>
               </div>
               <div class="col-1 pb-3 me-5 my-2 text-center ">
                  <a href="index.php">
                     <img src="images/TivonLogo.PNG" alt="tivon logo" style="width: 140%; height: 120%;" >
                  </a>   
               </div>
            </div>
   </header>
   <body>
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

  
   </body>


