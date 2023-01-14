<?php

include 'db.php';

$name = $_POST['name'];
$login = $_POST['login'];
$pass = $_POST['pass'];
$index = $_GET['index'];
$bd = 'tasks'.$index;

$link = mysqli_connect("localhost", "root", "root", "coursework");


// Create student

if (isset($_POST['add'])) {
    $sql = ("INSERT INTO ".$index." (name,login,pass) VALUES(?,?,?)");
    $query = $pdo->prepare($sql);
    $query->execute([$name, $login, $pass]);

    $sql = ("INSERT INTO students (name,login,pass) VALUES(?,?,?)");
    $query = $pdo->prepare($sql);
    $query->execute([$name, $login, $pass]);

    $sql = ("ALTER TABLE `$bd` ADD `$login` varchar(128) NOT NULL DEFAULT 'Не проверено'");
    $query = $pdo->prepare($sql);
    $query->execute();

    if ($query && $r) {
        header("Location: ". $_SERVER['HTTP_REFERER']);
    }
}

// List students

$sql = $pdo->prepare("SELECT * FROM ".$index."");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);