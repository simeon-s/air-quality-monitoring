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
if(isset($_SESSION['msg'])) {
  echo "<div class='col-sm-6 position-absolute bg-danger text-white w-100 p-3 text-center'>$_SESSION[msg]</div>";
  unset($_SESSION['msg']);
}
?>
      <div class="col-sm-6 text-black align-self-center">

        <div class="px-5 ms-xl-4" style="position: absolute; margin-top: 0%;">
          <img src="b-logo.png" onclick = "location.href = 'index'" class="logo"/>
          
        </div>

        <div class="d-flex  px-5 ms-xl-4 mt-4 pt-5 pt-xl-5 mt-xl-n10">

          <form  action="typechosen" style="width: 23rem;" method="post">

            <h3 class="fw-normal mb-0 pb-1" style="letter-spacing: 1px;">Регистрация</h3>
            
            <div class="form-outline mb-0">
              <input type="text" id="fullname" name="fullname" class="form-control form-control-lg" minlength="2" required/>
              <label class="form-label" for="fullname">Име</label>
            </div>

            <div class="form-outline mb-0">
              <input type="text" id="username" name="username" class="form-control form-control-lg" minlength="6" required/>
              <label class="form-label" for="username">Потребителско име</label>
            </div>

            <div class="form-outline mb-0">
              <input type="email" id="email" name="email" class="form-control form-control-lg" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required/>
              <label class="form-label" for="email">Email</label>
            </div>

            <div class="form-outline mb-0">
              <input type="password" id="password" name="password" onchange="setPattern()" class="form-control form-control-lg" placeholder='(a-z)+(A-Z)+(1-9)' pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,12}$" required/>
              <label class="form-label" for="password">Парола</label>
            </div>
            <div class="form-outline mb-0">
              <input type="password" id="passwordr" name="passwordr" oninvalid="this.setCustomValidity('Паролата не съвпада!')" oninput="this.setCustomValidity('')" class="form-control form-control-lg" placeholder='(a-z)+(A-Z)+(1-9)'  required/>
              <label class="form-label" for="passwordr">Повторете паролата</label>
            </div>
            
            <p style="color:red;" id="alert"></p>
           

            <div class="pt-1 mb-0">
              <button class="btn btn-info btn-lg btn-block" type="submit">Продължи</button>
            </div>

            <p>Вече имате акаунт? <a href="login" class="link-info">Вход</a></p>

          </form>

         

        </div>

      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="jason.jpg" alt="Login image" class="w-100 vh-100" style="object-fit: cover;">
      </div>
    </div>
  </div>
</section>

<script>
function setPattern() {
  var x = document.getElementById('password').value;
  document.getElementById('passwordr').pattern = x;
  var y = document.getElementById('passwordr').pattern;
 
}
</script>
<script>
  function validatePsw() {
    var x = document.getElementById('password').value;
    var y = document.getElementById('passwordr').value;
    if(x != y) {
      
      document.getElementById('alert').innerHTML = "Паролите не съвпадат!";
    }
  };
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