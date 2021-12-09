<?php
@ob_start();
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.logo{
  width: 100%;
}

.nav-item>a{
  font-size: 1.3em !important;
}

.icon{
    font-size: 75px;   
    background: lightblue;
    border-radius: 50%;
    width: 150px;
    height: 150px; 
}

  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" style="width:3.5%;" href="index"><img src="b-logo.png" class="logo"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse flex-row-reverse" id="navbarSupportedContent">

    <?php

    if(isset($_COOKIE['username'])) {
        echo"
      <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
        <li class='nav-item dropdown'>
          <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-expanded='false'>
            ".$_COOKIE['username']."
          </a>
          
          <ul class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdown'>
            <li><a class='dropdown-item' href='account'>Настройки</a></li>
            <li><hr class='dropdown-divider'></li>
            <li><a class='dropdown-item' href='logout'>Изход</a></li>


          </ul>
        </li>
        </ul>
        ";
    } else {
      echo"
      <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
        <li class='nav-item'>
          <a class='nav-link' href='login'>Вход</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='registration'>Регистрация</a>
      </li>
        </ul>";
    }
    ?>
      <form class='d-flex' action='results' method='POST'>
        <input class='form-control me-2' type='search' placeholder='Търсене' id='search' name='search' aria-label='Search'>
        <button class='btn btn-outline-dark ml-2' type='submit'>Търси</button>
      </form>

    </div>
  </div>
</nav>
<div class="conteiner-fluid bg-light" style="min-height: 87vh">
  <div class="bg-image d-flex justify-content-center align-items-center" style=" background-image: url('patrick-tomasso-j1dj50Td7CQ-unsplash.jpg'); background-size:cover; height: 40vh; background-position: 0 37%;">
    <img class="img-fluid img-fluid" src="breathe.png"/>
  </div>
  <div class="row mt-2 ml-1 mr-1 d-flex justify-content-center align-items-center">
      <h4>Breathe© предоставя информация за следните показатели:</h4>
  </div>
  <div class="row mt-2 ml-1 mr-1 d-flex justify-content-center align-items-center">
    <div class="col-md-4">
        <br>
        <div class="d-flex justify-content-center">
            <div class="icon d-flex justify-content-center  align-items-center">
        <i class="fa fa-thermometer-three-quarters fa-lg d-flex justify-content-center"></i>   
      </div>
      </div>
      <div class="text d-flex justify-content-center ">
        <p class="h6"><br>Температура</p>
      </div>
        
      
    </div>
    <div class="col-md-4">
        <br>
      <div class="d-flex justify-content-center">
            <div class="icon d-flex justify-content-center align-items-center">
        <i class="fa fa-tint fa-lg d-flex justify-content-center"></i>   
      </div>
      </div>
      <div class="text d-flex justify-content-center ">
        <p class="h6"><br>Влажност</p>
      </div>
    </div>
    <div class="col-md-4">
      <br>
        <div class="d-flex justify-content-center">
            <div class="icon d-flex justify-content-center align-items-center">
        <i class="fa fa-cloud-download fa-lg d-flex justify-content-center"></i>   
      </div>
      </div>
      <div class="text d-flex justify-content-center ">
        <p class="h6"><br>Атмосферно налягане</p>
    </div>
  </div>
  </div>
   <div class="row mt-2 ml-1 mr-1 d-flex justify-content-center align-items-center">
<div class="col-md-4">
      <br>
        <div class="d-flex justify-content-center">
            <div class="icon d-flex justify-content-center align-items-center">
        <img src="co2.png" alt="co2" style="width:75px"/>   
      </div>
      </div>
      <div class="text d-flex justify-content-center ">
        <p class="h6"><br>Газове</p>
    </div>
  </div>
    <div class="col-md-4">
      <br>
        <div class="d-flex justify-content-center">
            <div class="icon d-flex justify-content-center align-items-center">
        <img src="sea.png" alt="sea" style="width:75px"/>  
      </div>
      </div>
      <div class="text d-flex justify-content-center ">
        <p class="h6"><br>Надморска височина</p>
    </div>
  </div>
  </div>
  <div class="row mt-2 ml-1 mr-1 d-flex justify-content-center align-items-center">
      <br>
      <h6>За преглеждане на пълната информация е необходимо да се използва профил с платен абонамент! Във всички останали може да се види само основна информация!</h6>
  </div>
  </div>
<br>
<footer class="bg-dark text-center text-white">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fa fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fa fa-twitter"></i
      ></a>

      <!-- Google -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fa fa-google"></i
      ></a>

      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fa fa-instagram"></i
      ></a>

      <!-- Linkedin -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fa fa-linkedin"></i></a>

      <!-- Github -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/simeon-s/air-quality-monitoring" role="button"
        ><i class="fa fa-github"></i
      ></a>
    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © <?php echo date('Y'); ?> Copyright:
    Breathe
  </div>
  <!-- Copyright -->
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" 
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" 
crossorigin="anonymous"></script>

</body>
</html>