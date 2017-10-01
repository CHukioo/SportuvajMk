<?php 

session_start();

if ($_SESSION['usernameMy'] == null && $_SESSION['passwordMy'] == null) {
  
}
else {
  header('Location: lprocess.php');
}

$gresenPass = $_GET['tocno'];
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-beta.1.css" type="text/css">
  <title>Логирај се | Sportuvaj.mk</title>
  <script src='https://www.google.com/recaptcha/api.js'></script>
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
        </ul>
        <a class="btn navbar-btn btn-primary ml-2 text-white"><i class="fa d-inline fa-lg fa-user-circle-o"></i>&nbsp;Најви се</a>
      </div>
    </div>
  </nav>
  <div class="py-5 text-white bg-dark">
    <div class="container">
    <?php  if ($gresenPass == 6) {
                  echo "<div class='alert alert-success'><strong>АКТИВИРАНО!</strong> Вашата емаил адреса е верификувана.</div>";
                }?>
      <div class="row">
        <div class="col-md-6">
          <div class="card text-white p-5 bg-primary">
            <div class="card-body">
            <?php
                if ($gresenPass == 1) {
                  echo "<div class='alert alert-danger'><strong>ГРЕШКА!</strong> Грешена лозинка или емаил.</div>";
                }
              ?>
              <h1 class="mb-4">Најава</h1>
              <form action="lprocess.php" method="POST">
                <div class="form-group"> <label>Е-маил адреса:</label>
                  <input type="email" class="form-control" placeholder="" required="" name="username"> </div>
                <div class="form-group"> <label>Лозинка<br></label>
                  <input type="password" class="form-control" placeholder="" required="" name="password"> </div>
                <button type="submit" class="btn btn-secondary">ВЛЕЗ</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card text-white p-5 bg-primary">
            <div class="card-body">
            <?php
                if ($_GET['tocno'] == 2) {
                  echo "<div class='alert alert-success'><strong>УСПЕШНА РЕГИСТРАЦИЈА!</strong> Верификационен емаил е испратен. Ве молим потврдетаја вашата емаил адреса</div>";
                }
                if ($_GET['tocno'] == 3) {
                  echo "<div class='alert alert-danger'><strong>ГРЕШКА!</strong> Неуспешна регистрација.</div>";
                }
                if ($_GET['tocno'] == 4) {
                  echo "<div class='alert alert-danger'><strong>ГРЕШКА!</strong> Емаилот веќе постои.</div>";
                }
                if ($_GET['tocno'] == 5) {
                  echo "<div class='alert alert-danger'><strong>ГРЕШКА!</strong> Грешен код за проверка.</div>";
                }
            ?>
              <h1 class="mb-4">Регистрација</h1>
              <form action="rprocess.php" method="POST">
                <div class="form-group"> <label>Име и Презиме</label>
                  <input type="text" class="form-control" placeholder="" required="" name="name"> </div>
                <div class="form-group"> <label>Е-маил адреса:</label>
                  <input type="email" class="form-control" placeholder="" required="" name="username"> </div>
                <div class="form-group"> <label>Лозинка<br></label>
                  <input type="password" class="form-control" placeholder="" required="" id="password1"> </div>
                  <div class="form-group"> <label>Потврди лозинка<br></label>
                <input type="password" class="form-control" placeholder="" required="" name="password" id="password2"> </div>
                <div class="g-recaptcha" data-sitekey="6LdDSw0UAAAAADZ1Xzc-uSingkpLSBtt0gBs9ORD" style="margin-bottom: 8px;"></div>
                <button type="submit" class="btn btn-secondary" id="kopcereg">РЕГИСТРАЦИЈА</button>
                <p id="validate-status"></p>
              </form>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 text-white bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <p class="lead">ДОБИВАЈТЕ ПОСЛЕДНИ НОВОСТИ</p>
          <form class="form-inline">
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Е-МАИЛ АДРЕСА"> </div>
            <button type="submit" class="btn ml-3 btn-dark">ПОТВРДИ</button>
          </form>
        </div>
        <div class="col-4 col-md-1 align-self-center">
          <a href="https://www.facebook.com" target="blank"><i class="fa fa-fw fa-facebook fa-3x text-white"></i></a>
        </div>
        <div class="col-4 col-md-1 align-self-center">
          <a href="https://twitter.com" target="blank"><i class="fa fa-fw fa-twitter fa-3x text-white"></i></a>
        </div>
        <div class="col-4 col-md-1 align-self-center">
          <a href="https://www.instagram.com" target="blank"><i class="fa fa-fw fa-instagram text-white fa-3x"></i></a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-3 text-center">
          <p>© Copyright 2017 sportuvaj.mk - Сите права задржани.</p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  <script>
          $(document).ready(function() {
            $("#password2").keyup(validate);
          });
          $(document).ready(function() {
            $("#password1").keyup(validate);
          });


          function validate() {
            var password1 = $("#password1").val();
            var password2 = $("#password2").val();

    
            
          if(password1 == password2) {
             //$("#validate-status").text("valid");    
             $("#password2").css("background-color", "white");    
              $('#kopcereg').attr('disabled', false);
          }
          else {
             // $("#validate-status").text("invalid"); 
              $("#password2").css("background-color", "#FFB1A3");
              $('#kopcereg').attr('disabled', true);
          }
        }
  </script>
</body>

</html>