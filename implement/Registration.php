<?php
session_start();
if (!($_SERVER["REQUEST_METHOD"] == "POST")) {
    header('Location: ./../index.php');
  }

$file = './../data.txt';
$allData = [
    [
        'username' => 'Admin',
        'email' => 'admin@crew.com',
        'password' => 'password',
        'role' => 'admin'
    ]
];


if (file_exists($file)) {
    $fileData = unserialize(file_get_contents($file));
    // echo nl2br($data);    
}

if (isset($_POST['submit'])) {
    if(($_POST['username'] == ' ') || !(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) || ($_POST['email'] == ' ') || ($_POST['password'] == ' ')){
        
        $_SESSION['msg'] = 'Your name, email, password are require!';
        header('Location: ./../registration.php');
    }
    $formData = [
        "username" => $_POST["username"],
        "email" => $_POST["email"],
        "password" => $_POST["password"],
        "role" => 'user'
    ];

    if ($fileData) {
        if (in_array($formData, $fileData)) {
            $_SESSION['msg'] = 'User already exist!';
            
            header('Location: ./../index.php'); 
        } else {
            array_push($fileData, $formData);
            $data = serialize($fileData);
            file_put_contents($file, $data, LOCK_EX);
            $_SESSION['msg'] = 'User successfully create!';
            $_SESSION['username'] = $formData['username'];
            //$_SESSION['email'] = $formData['email'];
            $_SESSION['role'] = $formData['role'];
            header('Location: ./../index.php'); 
            
        }
    } else {
        array_push($allData, $formData);
        $data = serialize($allData);
        file_put_contents($file, $data, LOCK_EX);
        $_SESSION['msg'] = '1st User successfully create!';
        $_SESSION['username'] = $formData['username'];
        //$_SESSION['email'] = $formData['email'];
        $_SESSION['role'] = $formData['role'];
        header('Location: ./../index.php'); 

    }
    //file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
}
