<?php
session_start();
if (!($_SERVER["REQUEST_METHOD"] == "POST")) {
    header('Location: ./../index.php');
  }

$file = './../data.txt';

$fileData = unserialize(file_get_contents($file));
if (isset($_POST['submit'])) {
    if(($_POST['email'] == ' ') || !(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) || ($_POST['password'] == ' ')){
        $_SESSION['msg'] = 'your email and password are require!';
        header('Location: ./../login.php');
    }
    $result = array_filter(
        $fileData,
        function ($value) {
            return (in_array($_POST["email"], $value) && in_array($_POST["password"], $value));
        });
    $key = array_keys($result);
    if (count($result) > 0) {
        $_SESSION["username"] = $result[$key[0]]["username"];
        //$_SESSION['email'] = $result[$key[0]]['email'];
        $_SESSION["role"] = $result[$key[0]]["role"];
        if ($result[$key[0]]['role'] == 'admin') {
            header('Location: ./../role-management.php'); 
        }else{
            $_SESSION['msg'] = 'Your email is not matched!';
            header('Location: ./../index.php'); 
        }
    }
}