<?php

include 'db.php';

$name = $_POST['name'];
$login = $_POST['login'];
$pass = $_POST['pass'];

$link = mysqli_connect("localhost", "root", "root", "coursework");


// Create teacher

if (isset($_POST['add'])) {
    $sql = ("INSERT INTO teachers (name,login,pass) VALUES(?,?,?)");
    $query = $pdo->prepare($sql);
    $query->execute([$name, $login, $pass]);

    if ($query && $r) {
        header("Location: ". $_SERVER['HTTP_REFERER']);
    }
}

// List teachers

$sql = $pdo->prepare("SELECT * FROM teachers");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);