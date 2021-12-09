<?php
@ob_start();
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
  .logo{
    width: 20%;
    position: relative;
    margin-top: 0;
  }
  
    </style>

</head>
<body>

<section class="vh-100 ">
  <div class="container-fluid">
    <div class="row">
    <?php

if(isset($_SESSION['msg']) && isset($_SESSION['col'])) {
    if ($_SESSION['col'] === "red"){
        echo "<div class='col-sm-6 position-absolute bg-danger text-white w-100 p-3 text-center'>$_SESSION[msg]</div>";
    } else if ($_SESSION['col'] === "green"){
        echo "<div class='col-sm-6 position-absolute bg-success text-white w-100 p-3 text-center'>$_SESSION[msg]</div>";
    }
    unset($_SESSION['msg']);
    unset($_SESSION['col']);
}
?>
      <div class="col-sm-6 text-black align-self-center">

        <div class="px-5 ms-xl-4" style="position: absolute; margin-top: 0%;">
          <img src="b-logo.png"  onclick = "location.href = 'index'" class="logo"/>
        </div>

        <div class="d-flex  px-5 ms-xl-4 mt-5 pt-5 pt-xl-5 mt-xl-n10">

          <form  action="sendrequest" style="width: 23rem;" method="post">

            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Забравена парола</h3>

            <div class="form-outline mb-4">
              <input type="text" name='email' id='email' class="form-control form-control-lg" required/>
              <label class="form-label" for="email">Въведете имейл</label>
            </div>

            <div class="pt-1 mb-4">
              <button class="btn btn-info btn-lg btn-block" type="submit">Готово</button>
            </div>



          </form>

        </div>

      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="jason.jpg" alt="Login image" class="w-100 vh-100" style="object-fit: cover;">
      </div>
    </div>
  </div>
</section>
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