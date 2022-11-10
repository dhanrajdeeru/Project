<?php
require_once 'config.php';
$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";
// make a database connection
$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
/*if ($pdo) {
    echo "Connected to the $dbname database successfully!";
}*/

// to check if email id is already registered
$chk = $pdo->prepare("SELECT * FROM userdata WHERE email=?");
$chk->execute([$_POST['id']]);
$data = $chk->fetchAll();

if(count($data)>0){
    echo '<script>alert("Email ID Already Exists!!");
    window.location.href="maimpage.html";
    </script>';
}
else{
// prepare statement for insert
$sql = "INSERT INTO userdata(email,fname,lname,age,gender,pno,roles,uids) VALUES (:email,:fname,:lname,:age,:gender,:pno,:roles,:uids)";
//$sql = "INSERT INTO userdata(email,fname,lname,age,gender,pno,roles) VALUES (:email,:fname,:lname,:age,:gender,:pno,:roles";

$stmt = $pdo->prepare($sql);

$uid='P0008';
$f_name = $_POST['fname'];
$l_name = $_POST['lname'];
$email = $_POST['id'];
$role = $_POST['roles'];
$ph = $_POST['ph'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$passw = $_POST['passw'];
$cpass = $_POST['cpass'];

// pass values to the statement
$stmt->bindValue(':uids', $uid);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':fname', $f_name);
$stmt->bindValue(':lname', $l_name);
$stmt->bindValue(':age', $age);
$stmt->bindValue(':gender', $gender);
$stmt->bindValue(':pno', $ph);
$stmt->bindValue(':roles', $role);

// execute the insert statement
$stmt->execute();

$stmt = $pdo->prepare("SELECT * FROM userdata WHERE email=?");
$stmt->execute([$email]);
$data = $stmt->fetchAll();
$lid = $data[0][0];

$sql = "INSERT INTO login(email,passwords,uids) VALUES (:email,:passwords,:uids)";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':uids', $lid);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':passwords',$passw);
$stmt->execute();
  echo '<script>alert("Registered successfully. Please go to Login page and Login.");
    window.location.href="maimpage.html";
    </script>';
}
?>
