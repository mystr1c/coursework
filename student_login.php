<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css"
</head>
<body>
<form action="index.php">
    <button type="submit" class="btn btn-secondary" style="margin-left: 20px; margin-top: 20px">←</button></form>
<div class="container mt-4">
    <?php
    if ($_COOKIE['user'] == ''):
    ?>
    <div class="row">
        <div class="col">
            <h1>Вход</h1>
            <form action="/coursework/validation-form/auth_student.php" method="post">
                <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
                <input type="text" class="form-control" name="pass" id="login" placeholder="Введите пароль"><br>
                <button class="btn btn-success" type="submit">Авторизоваться</button>
            </form>
        </div>
        <?php else:
            header('Location: /coursework/student_main.php');
        endif;?>


    </div>
</div>
</body>
</html>