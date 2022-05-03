<?php

$text = $_POST['user_name'];
$phone = $_POST['user_phone'];
$email = $_POST['user_email'];
$message = $_POST['user_message'];
echo "Скрипт сработал! <br>". $text . "<br>". $phone . "<br>". $email . "<br>". $message;
?>