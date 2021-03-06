<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?=base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?=base_url()?>assets/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Admin Login</div>
      <div class="card-body">

        <form action="" method="POST">

          <?php if($this->session->flashdata("error")){ ?>
            <p class="alert alert-danger"> <?=$this->session->flashdata("error")?> </p>
          <?php } ?>

          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="txtUsername" name="txtUsername" class="form-control" required="required" autofocus="autofocus">
              <label for="inputEmail">Username</label>
            </div>
          </div>

          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="tname=" name="txtPassword"  class="form-control" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>

          <input class="btn btn-primary btn-block" type="submit" name="btnLogin" value="Login"> 
         
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
