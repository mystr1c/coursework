<?php

include 'db.php';
$index = $_GET['index'];
$bd = 'tasks'.$index;
$login = $_GET['login'];
$get_id = $_GET['id'];
$mark = $_POST['mark'];
$link = mysqli_connect("localhost", "root", "root", "coursework");

//Update
if (isset($_POST['edit'])) {
    $sql = ("UPDATE `$bd` SET `$login`=? WHERE id=?");
    $query = $pdo->prepare($sql);
    $query->execute([$mark,$get_id]);
    if ($query) {
        header("Location: ". $_SERVER['HTTP_REFERER']);
    }
}

// List tasks

$sql = $pdo->prepare("SELECT * FROM `$bd`");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);