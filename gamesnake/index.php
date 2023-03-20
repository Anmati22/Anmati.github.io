<?php
    //  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
    session_start();
    ?>
    <html>
    <head>
    <title>Авторизация</title>
     <link rel = "stylesheet" href = "css/registate.css">
    </head>
    <body>
   <form action = "testreg.php" method = "post">
   <!--**** testreg.php - это адрес обработчика.  То есть, после нажатия на кнопку "Зарегистрироваться", данные из полей  отправятся на страничку save_user.php методом "post" ***** -->
  <h2>
    <span class="entypo-login"><i class="fa fa-sign-in"></i></span> Авторизация
  </h2>
  <span class="entypo-user inputUserIcon">
     <i class="fa fa-user"></i>
   </span>
  <input type="email" name = "login" size = "7" maxlength = "35" required = "required" placeholder="Почта"/>
  <span class="entypo-key inputPassIcon">
     <i class="fa fa-key"></i>
   </span>
  <input type="password" name = "password" size = "4" maxlength = "20" required = "required" placeholder="Пароль"/>

    <p>
    <input class = "input" type="submit" name="submit" value="Войти">

    <!--**** Кнопочка (type="submit") отправляет данные на страничку testreg.php ***** --> 
<br>
 <!--**** ссылка на регистрацию, ведь как-то же должны гости туда попадать ***** --> 
<a class = "Registrate" href = "reg.php">Для регистрации перейдите по этой ссылке</a>
    </p>
</form>
    <!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** --> 

    
    <br>
   
    </body>
    <footer>
    </footer>

   
    </html>