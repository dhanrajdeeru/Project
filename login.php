<?php

require_once 'config.php';
session_start();
$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";

// make a database connection
$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$id = $_POST['id'];
$passw = $_POST['passw'];

// prepare statement for select
if(strpos($id,'com') !== false){
    $stmt = $pdo->prepare("SELECT * FROM LOGIN WHERE email=?");
} else{
    $stmt = $pdo->prepare("SELECT * FROM LOGIN WHERE uids=?");
}
$stmt->execute([$id]);
$data = $stmt->fetchAll();

if((count($data)!=0) and ($data[0][2]==$passw)){
    $_SESSION['user_id'] = $data[0][0];
    echo '<script>alert("Successful Login")
    window.location.href="profile.php";
    </script>';
}
else{
    echo '<script>alert("Invaild User ID or Email or Password!!")
    window.location.href="index.html";
    </script>';
}
?>
