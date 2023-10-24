<?php
session_start();

if (!(isset($_SESSION["role"]))) {
    header('Location: ./../index.php');

}elseif( !($_SESSION["role"] == "admin")){
    header('Location: ./../index.php');
}

if(isset($_GET['key'])) {
    $fileData = unserialize(file_get_contents('./../data.txt'));
    $fileData[$_GET['key']]['role'] = ' ';
    $data = serialize($fileData);
    file_put_contents('./../data.txt', $data, LOCK_EX);
    header('Location: ./../role-management.php');
}