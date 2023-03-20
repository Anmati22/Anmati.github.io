<?php
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную

    if (isset($_POST['password'])) {  $password = $_POST['password'];if ($password ==''){ unset($password); } }
        
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    if (isset($_POST['nickname'])) { $nickname=$_POST['nickname']; if ($nickname =='') { unset($nickname);} }
    // аналогично имя пользователя
 if (empty($login) or empty($password) or empty($nickname)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт

    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
     
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $nickname = stripslashes($nickname);
    $nickname = htmlspecialchars($nickname);
 //удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
    $nickname = trim($nickname);
 // подключаемся к базе
    include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
 // проверка на существование пользователя с таким же логином
    $resultname = mysqli_query($db, "SELECT id FROM users WHERE mail='$login'");
    $myrowname = mysqli_fetch_array($resultname);
    
    if (!empty($myrowname['id'])) {
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
}
    $result = mysqli_query($db,"SELECT id FROM users WHERE nickname='$nickname'");
    $myrow = mysqli_fetch_array($result);
    if (!empty($myrow['id'])) {
    exit ("Извините, введённое вами имя уже используется. Введите другое имя.");
    }
 // если такого нет, то сохраняем данные
     $passhash = password_hash($password, PASSWORD_DEFAULT);
    $resultsave = mysqli_query ($db,"INSERT INTO users (mail,password,nickname) VALUES('$login','$passhash','$nickname')");
    // Проверяем, есть ли ошибки
     
    if ($resultsave=='TRUE')
    {
     $result = mysqli_query($db,"SELECT * FROM users WHERE mail='$login'"); //извлекаем из базы все данные о пользователе с введенным логином
    $myrow = mysqli_fetch_array($result);
session_start();
         $_SESSION['mail']=$myrow['mail']; 
    $_SESSION['id']= $myrow['id'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
    $_SESSION['nickname'] = $myrow['nickname'];
    header ('Location: game.php');
    }
 else {
    session_start();
    echo $passhash;
    echo "   Похоже что-то нужно менять, скрипт не сработал";
    }

    ?>