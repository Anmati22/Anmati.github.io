
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-RU-Compatible" content = "ie=edge">
  <title> Регистрация </title>
  <link rel = "stylesheet" href = "css/registate.css">                  
<script>
  $(".user").focusin(function(){
  $(".inputUserIcon").css("color", "#e74c3c");
}).focusout(function(){
  $(".inputUserIcon").css("color", "white");
});

$(".pass").focusin(function(){
  $(".inputPassIcon").css("color", "#e74c3c");
}).focusout(function(){
  $(".inputPassIcon").css("color", "white");
});
 let formData = {};
 
</script>
  
</head>

<form name = "n1" action = "save_user.php" action = "game.php" method = "post">
   <!--**** save_user.php - это адрес обработчика.  То есть, после нажатия на кнопку "Зарегистрироваться", данные из полей  отправятся на страничку save_user.php методом "post" ***** -->
  <script>
        window.addEventListener("load",function(){
            document.getElementById("b").addEventListener("click",function(){
                var inp1 = document.getElementById("inp1"), inp2 = document.getElementById("inp2");
                if(inp1.value!=inp2.value){
                    inp2.value = "";
                    document.getElementById("res").innerHTML = "Пароль не совпадает с проверкой! Пожалуйста, убедитесь в правильности ввода данных в проверочное поле";
                }
            });
        })
    </script>
  <h2>
    <span class="entypo-login"><i class="fa fa-sign-in"></i></span> Регистрация
  </h2>
  <button class="submit" type = "submit" name = "submit" id = "b" ><span class="entypo-lock"><i class="fa fa-lock"></i></span></button>
  <span class="entypo-user inputUserIcon">
     <i class="fa fa-user"></i>
   </span>
  <input type="email" name = "login" size = "7" maxlength = "35" required = "required" placeholder="Ваш email"/>
  <span class="entypo-key inputPassIcon">
     <i class="fa fa-key"></i>
   </span>
  <input type="password" name = "password" id = "inp1" size = "4" maxlength = "20" required = "required" placeholder="Пароль"/>

<span class="entypo-key inputPassIcon1">
     <i class="fa fa-key"></i>
   </span>
  <input type="password" name = "passwordver" id = "inp2" size = "4" maxlength = "20" required = "required" placeholder="Введите пароль еще раз" />
  
  <span class="entypo-vcard inputNickIcon">
    <i class="fa fa-address-card" aria-hidden="true"></i>
   </span>
  <input type="text" name = "nickname" size = "4" maxlength = "20" required = "required" placeholder="Имя/nickname"/>
  <div class = "res" id="res"></div>
</form>
<form name = "mainpage" action = "index.html" method = "post">
<button class="mnpage" type = "submit" name = "submit" >Личный кабинет</button>
</html>
