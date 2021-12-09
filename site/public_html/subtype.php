<?php
if (!isset($_COOKIE['username'])) {
    header("location: index");
}
include "selectall.php";
if ($subexp != "0000-00-00") {
    header("location: index");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
  .logo{
    width: 20%;
    position: relative;
    margin-top: 0;
  }
  
    </style>

</head>
<body onload='showPrice()'>


<section class="vh-100 ">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black align-self-center">

        <div class="px-5 ms-xl-4" style="position: absolute; margin-top: 0%;">
          <img src="b-logo.png" onclick = "location.href='index'" class="logo"/>
          
        </div>

        <div class="d-flex  px-5 ms-xl-4 mt-4 pt-5 pt-xl-5 mt-xl-n10">

          <form  action="setsub" style="width: 23rem;" method="post">

            <?php
            include 'select.php';
            if ($acctype == 'u') {
               echo " <h3 class='fw-normal mb-3 pb-1' style='letter-spacing: 1px;'>Свързване на сензор</h3>
               <div class='form-outline mb-0'>
              <p>Тук би трябвало да се правят връзките между сензорите и базите от данни.
              При избор на такъв вид акаунт абонаментът е безсрочен и безплатен.</p>
            </div>";
            } else {
                echo "
                <h3 class='fw-normal mb-3 pb-1' style='letter-spacing: 1px;'>Избор на абонаментен план</h3>
                <div class='form-outline mb-0'> 
                <select id='sub' name='sub' class='form-control form-control-lg' onchange='showPrice()'>
                    <option value='freeweek'>1 безплатна седмица</option>
                    <option value='1week'>1 Седмица</option>
                    <option value='1month'>1 Месец</option>
                    <option value='1year'>1 Година</option>
                    
                 </select>
                 <label class='form-label' for='sub'>Изберете абонаментен план</label>
                 </div>
                 <br>
                 <div class='form-outline mb-0'>
              <p id='price'>
              </p>
            </div>
            <div class='form-outline mb-0'> 
            <select id='type' name='type' class='form-control form-control-lg fa'  style='display:none;'>
                <option value='Visa'>&#xf1f0; &nbsp;Visa</option>
                <option value='MasterCard'>&#xf1f1; &nbsp; MasterCard</option>
                <option value='PayPal'>&#xf1f4; &nbsp; PayPal</option>
                
             </select>
             <label class='form-label' for='sub'>Изберете метод на плащане</label>
             </div>";
            }



            ?>
            
            

            <div class="pt-1 mb-3">
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

  <script>
function showPrice() {
  var x = document.getElementById("sub").value;
  if (x === "freeweek"){
    document.getElementById("price").innerHTML = "Цена: Безплатно!";
    document.getElementById("type").style.display = "none";
  } else if (x === "1week" ){
    document.getElementById("price").innerHTML = "Цена: 2.99 лв.";
    document.getElementById("type").style.display = "block";
  } else if (x === "1month" ){
    document.getElementById("price").innerHTML = "Цена: 9.99 лв.";
    document.getElementById("type").style.display = "block";
  } else {
    document.getElementById("price").innerHTML = "Цена: 24.99 лв.";
    document.getElementById("type").style.display = "block";
  }
}
</script>

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