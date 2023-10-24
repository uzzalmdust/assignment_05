<?php
session_start();
if (!($_SERVER["REQUEST_METHOD"] == "POST")) {
    header('Location: ./../index.php');
}

$fileData = unserialize(file_get_contents('./../data.txt'));
//echo $_SERVER['HTTP_REFERER'];
//die();

if (isset($_POST['submit'])) {
    if ($_POST['role'] == 'admin' || $_POST['role'] == 'user') {

        if (count($fileData) > 0) {
            $fileData[$_POST['key']]['role'] = $_POST['role'];    
            $data = serialize($fileData);
            file_put_contents('./../data.txt', $data, LOCK_EX);
            header('Location: ./../role-management.php');
        }
    }else{
        $_SESSION['msg'] = 'Select role require.';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    
}