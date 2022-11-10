<?php

require_once 'config.php';
$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";

// make a database connection
$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$id = $_POST['id'];
$passw = $_POST['passw'];

// prepare statement for select
if(strpos($id,'com') !== false){
    $stmt = $pdo->prepare("SELECT * FROM LOGIN WHERE email=?");
    $t = 1;
} else{
    $stmt = $pdo->prepare("SELECT * FROM LOGIN WHERE uids=?");
    $t = 0;
}
$stmt->execute([$id]);
$data = $stmt->fetchAll();

if((count($data)!=0) and ($data[0][2]==$passw)){
    echo '<script>alert("Successful Login")
    window.location.href="profile.html";
    </script>';
}
else{
    echo '<script>alert("Invaild User ID or Email or Password!!")</script>';
}
?>
