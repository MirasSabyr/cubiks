
<?php
require_once ('db.php');

$login = $_POST['login'];
$pass = $_POST['password'];
$repeatpass = $_POST['repeatpass'];
$email = $_POST['e-mail'];

if(empty($login) || empty($pass) || empty($repeatpass) || empty($email)){
    echo "Заполните все поля";
} else{
    if($pass != $repeatpass){
        echo "Пароли не совподают";
    } else{
        $sql = "INSERT INTO `regist_users`(login, pass, email) VALUES('$login', '$pass', '$email')";
        if ($conn->query($sql)===TRUE){
            echo "Успешная регистрация";
        } 
        else{
            echo "Ошибка: " . $conn -> error;
        }
    }
}
