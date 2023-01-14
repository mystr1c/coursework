<?php

include 'db.php';
$index = $_GET['index'];
$task = $_POST['task'];
$bd = 'tasks'.$index;
$teacher = $_COOKIE['user'];

$link = mysqli_connect("localhost", "root", "root", "coursework");

// Create task
if (isset($_POST['add'])) {
    $sql = ("INSERT INTO `$bd` (teacher,task) VALUES(?,?)");
    $query = $pdo->prepare($sql);
    $query->execute([$teacher,$task]);

    if ($query && $r) {
        header("Location: ". $_SERVER['HTTP_REFERER']);
    }
}

// List tasks

$sql = $pdo->prepare("SELECT * FROM `$bd`");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);