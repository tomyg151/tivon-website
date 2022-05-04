<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>HWPC Tivon</title>
  
  </head>
  <div class="container-lg"></div>
    <header class="bg-danger">
      <div class="row justify-content-center">
        <div class="col-1 py-2 text-center">
          <img src="images/facebook.png" class="img-fluid" alt="facebook-icon">
        </div>
        <div class="col-1 py-2 text-center">
          <img src="images/instagram.png" class="img-fluid" alt="instagram-icon">
        </div>
        <div class="col-1 py-2 text-center">
          <img src="images/shopping-cart.png" class="img-fluid" alt="shop-icon">
        </div>
        <div class="col-1 py-2 text-center">
          <a class="btn btn-success" data-bs-toggle="modal" href="#ModalToggle" role="button">Login</a>
        </div>
        <div class="col-6 py-2 text-center">
          <div class="display-6 text-center text-primary fw-bolder"> כדורמים קרית טבעון</div>
        </div>
        <div class="col-2 py-2 text-center">
          <img src="images/סמל קריית טבעון בכדור מים.png" class="img-fluid" alt="symbol">
        </div>
      </div>
      
    </header>
  </div>
  <body>
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
            <button type="sumbit" name="login" class="btn btn-outline-light mt-3">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">

    </script>
  </body>
</html>