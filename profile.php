<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";

$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$stmt1 = $pdo->prepare("SELECT * FROM userdata WHERE uids=?");
$stmt1->execute([$user_id]);
$data1 = $stmt1->fetchAll();

$stmt2 = $pdo->prepare("SELECT * FROM activity WHERE uids=?");
$stmt2->execute([$user_id]);
$data2 = $stmt2->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <div class="menu-bar">
        <h1 class="logo">PURPLE <span>TEAMING</span></h1>
        <ul>
          <li><a href="profile.html">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Know More About attack <i class="fas fa-caret-down"></i></a>
  
              <div class="dropdown-menu">
                  <ul>
                      <li>
                          <a href="#">Attack 1 <i class="fas fa-caret-right"></i></a>
                          <div class="dropdown-menu-1">
                              <ul>
                                  <li><a href="#">NAME1</a></li>
                                  <li><a href="#">NAME2</a></li>
                                  <li><a href="#">NAME3</a></li>
                                  <li><a href="#">NAME4</a></li>
                              </ul>
                          </div>
                      </li>
                       <li>
                          <a href="#">Attack 2 <i class="fas fa-caret-right"></i></a>
                          <div class="dropdown-menu-1">
                              <ul>
                                  <li><a href="#">NAME1</a></li>
                                  <li><a href="#">NAME2</a></li>
                                  <li><a href="#">NAME3</a></li>
                                  <li><a href="#">NAME4</a></li>
                              </ul>
                          </div>
                      </li>
                      <li><a href="#">FAQ</a></li>
                  </ul>
              </div>
          </li>
        </ul>
      </div>
    <div class="akas">
        <div class="header">
            <img src="download.jfif" alt="" srcset="">
            <input type='text'class='name'placeholder=<?php echo $data1[0][2],' ',$data1[0][3]; ?> required >
            <input type='text'class='id'placeholder=<?php echo $data1[0][0]; ?> required >
            <input type='text'class='emailid'placeholder=<?php echo $data1[0][1]; ?> required >
            <input type='text'class='emailid'placeholder=<?php echo $data1[0][7]; ?> required >
        </div>
    </div>
    <div class="box">
        <div class="box1">
            <div class="box11">
                <label for="No. of Attack">Number of Red team Activity :</label>
                <input type='text'class='emailid'placeholder=<?php echo $data2[0][3]; ?> required><br>
                <label for="successful Attack">Successful Attack :</label>
                <input type='text'class='emailid'placeholder=<?php echo $data2[0][8]; ?> required ><br>
                <label for="Unsucessful Attack">Unsucessful Attack :</label>
                <input type='text'class='emailid'placeholder=<?php echo $data2[0][10]; ?> required ><br>
                <label for="No. of Attack">Number of Blue team Activity :</label>
                <input type='text'class='emailid'placeholder=<?php echo $data2[0][4]; ?> required ><br>
                <label for="successful Attack">Successful Defend :</label>
                <input type='text'class='emailid'placeholder=<?php echo $data2[0][9]; ?> required ><br>
                <label for="Unsucessful Attack">Unsucessful Defend :</label>
                <input type='text'class='emailid'placeholder=<?php echo $data2[0][11]; ?> required ><br>
                <label for="Unsucessful Attack">Last Activity time :</label>
                <input type='text'class='emailid'placeholder=<?php echo $data2[0][2]; ?> required ><br>
            </div>
        </div>
        <div class="box1">
            <div class="box12">
                <div class="box121">
                    <button type='submit'class='submit-btn' onclick="window.location.href = 'attack1.html';">Attack</button>  
                    <h6>mention the detail of this part</h6></div>
                <div class="box122">
                    <button type='submit'class='submit-btn' onclick="window.location.href = 'defend1.html';">Defend</button>  
                    <h6>mention the detail of this part</h6>
                </div>
            </div>
        </div>
</body>
</html>
