<?php

session_start();

if ($_SESSION['usernameMy'] == null && $_SESSION['passwordMy'] == null) {
  header('Location: login.php');
}

$pozdrav = $_SESSION['usernameMy'];

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-beta.1.css" type="text/css">
  <title>Профил | Sportuvaj.mk</title>
  <link rel="icon" href="pic\icon.png"> </head>

<body>
  <nav class="navbar navbar-fixed-top navbar-expand-md bg-primary navbar-dark" id="hedero">
    <div class="container">
      <a class="navbar-brand" href="#"><i class="fa d-inline fa-lg fa-futbol-o"></i><b>&nbsp;sportuvaj.mk</b></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false"
        aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.html"><i class="fa d-inline fa-lg fa-home"></i>&nbsp;Почетна</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#ponuda"><i class="fa d-inline fa-lg fa-star-o"></i>&nbsp;Понуда</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#kontakt"><i class="fa d-inline fa-lg fa-envelope-open-o"></i>&nbsp;Контакт</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php"><i class="fa d-inline fa-lg fa-power-off"></i>&nbsp;Излез
              <br> </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-1 text-center">Welcome:&nbsp;</h1>
          <br>
          <h3 class="text-center"><?php echo $pozdrav; ?></h3>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>

</html>