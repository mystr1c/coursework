<?php
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

    $mysql = new mysqli('localhost','root','root','coursework');

    $result = $mysql->query("SELECT * FROM `students` WHERE `login` = '$login' AND `pass` = '$pass'");
    $user = $result->fetch_assoc();
    if (empty($user)) {
        echo "Такой пользователь не найден. <a href='/coursework/student_login.php'><br>Вернуться</a>";

        exit();
    }

    setcookie('user', $user['name'], time() + 3600, "/");

    $mysql->close();

    header('Location: /coursework/student_login.php/');
?>