<?php
@ob_start();
    session_start();
    if (isset($_GET['url'])) {
  $url = $_GET['url'];
    }
  if (!isset($_COOKIE['username'])) {
    $nopermission = "y";
    } else {
    include "selectall.php";
    if ($subexp < date("Y-m-d")) {
    $nopermission = "yy";
    }
    }



if (isset($_POST['type'])){
  $_SESSION['type'] = $_POST['type'];
} else {
  $_SESSION['type'] = "temperature";
}
if (isset($_POST['time'])){
  $_SESSION['time'] = $_POST['time'];
} else {
  $_SESSION['time'] = "today";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.logo{
  width: 100%;
}

.nav-item>a{
  font-size: 1.3em !important;
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
<div class='container-fluid bg-light' style='min-height: 87vh'>
<form action="" method="POST">
  <div class="row">
<div class='col-md-5'>
<label for="cars">Изберете показател:</label>
  <select id='type' name='type' class='form-control form-control-lg'>
    <option value="temperature" <?php echo (isset($_POST['type']) && $_POST['type'] == 'temperature') ? 'selected' : ''; ?>>Температура</option>
    <option value="humidity" <?php echo (isset($_POST['type']) && $_POST['type'] == 'humidity') ? 'selected' : ''; ?><?php if(isset($nopermission)){ echo "disabled";}?>>Влажност</option>
    <option value="pressure" <?php echo (isset($_POST['type']) && $_POST['type'] == 'pressure') ? 'selected' : ''; ?><?php if(isset($nopermission)){ echo "disabled";}?>>Атмосферно налягане</option>
    <option value="gas" <?php echo (isset($_POST['type']) && $_POST['type'] == 'gas') ? 'selected' : ''; ?><?php if(!isset($_COOKIE['username'])){ echo "disabled";}?>>Газове</option>
    <option value="altitude" <?php echo (isset($_POST['type']) && $_POST['type'] == 'altitude') ? 'selected' : ''; ?><?php if(isset($nopermission)){ echo "disabled";}?>>Надморска височина</option>
  </select>
  </div>
  <div class='col-md-5'>
  <label for="cars">Изберете продължителност на графиката:</label>
  <select id='time' name='time' class='form-control form-control-lg'>
    <option value="today" <?php echo (isset($_POST['time']) && $_POST['time'] == 'today') ? 'selected' : ''; ?>>Днес</option>
    <option value="week" <?php echo (isset($_POST['time']) && $_POST['time'] == 'week') ? 'selected' : ''; ?><?php if(isset($nopermission)){ echo "disabled";}?>>Текущата седмица</option>
    <option value="month" <?php echo (isset($_POST['time']) && $_POST['time'] == 'month') ? 'selected' : ''; ?><?php if(isset($nopermission)){ echo "disabled";}?>>Текущия месец</option>
  </select>
  </div>
  <div class="col-mb-2 col d-flex align-items-end mt-3">
      <button class="btn btn-info btn-lg btn-block " type="submit">Готово</button>
  </div>
  </div>
</form>
<div class="d-flex justify-content-center">
<canvas id="myChart1" style="width:100%;max-width:800px;"></canvas>
</div>
<?php 
if(isset($nopermission)){
    if ($nopermission === "y"){
        echo "<br><h6 class='text-center'>За преглед на пълната информация е необходимо да влезете в профила си!<h6>";
    } else if ($nopermission === "yy"){
        echo "<br><h6 class='text-center'>За преглед на пълната информация е необходимо да заплатите абонамент!<h6>";
    }
    
}
?>
</div>
<?php
  include "info.php";
  ?>

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
<script>
new Chart("myChart1", {
  type: "scatter",
  data: {
    datasets: [{
      pointRadius: 5,
      pointBackgroundColor: "red",
      data: <?php echo json_encode($dataPoints); ?>
    }]
  },
  options: {
    title: {display: true, text: <?php echo json_encode($title); ?>},
    legend: {display: false},
    scales: {
      xAxes: [{ticks: {min: <?php echo json_encode($min); ?>, max: <?php echo json_encode($max); ?>}}],
      yAxes: [{ticks: {min: <?php echo json_encode($ymin); ?>, max: <?php echo json_encode($ymax); ?>}}],
    }
  }
});
</script>

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