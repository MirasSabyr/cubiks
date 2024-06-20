<?php
require_once('db.php');

$login = $_POST['login'];
$pass = $_POST['password'];

if (empty($login) || empty($pass)){
    echo "заполните все поля";
} else {
    $sql = "SELECT * FROM `regist_users` WHERE login = '$login' AND pass = '$pass'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            exit ("Добро пожаловать ") . $row['login'];
        }
    }else{
        exit ("Нет такого пользователя");
    }
}