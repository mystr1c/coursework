<?php

include 'db.php';

$name = $_POST['name'];

$link = mysqli_connect("localhost", "root", "root", "coursework");


// Create group

if (isset($_POST['add'])) {
    $sql = ("INSERT INTO groups (name) VALUES(?)");
    $query = $pdo->prepare($sql);
    $query->execute([$name]);

    // create table for it
    $sql = ("CREATE TABLE ".$name."
		(id int not null primary key auto_increment, name varchar(128), login varchar(128), pass varchar(128))");
    $r = mysqli_query($link, $sql);

    $name = 'tasks'.$name;
    // create table for it
    $sql = ("CREATE TABLE `$name`
		(id int not null primary key auto_increment, teacher varchar(128),task varchar(128))");
    $r = mysqli_query($link, $sql);



    if ($query && $r) {
        header("Location: ". $_SERVER['HTTP_REFERER']);
    }
}

// List groups

$sql = $pdo->prepare("SELECT * FROM groups");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);