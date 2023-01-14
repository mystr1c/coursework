<?php

include 'db.php';
$index = $_GET['index'];
$bd = 'tasks'.$index;
$link = mysqli_connect("localhost", "root", "root", "coursework");


// List tasks

$sql = $pdo->prepare("SELECT * FROM `$bd`");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);