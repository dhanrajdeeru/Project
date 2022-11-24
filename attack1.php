<?php

?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="attack1.css" />
    <title>attack1</title>
  </head>
  <body>
    <div class="menu-bar">
      <h1 class="logo">PURPLE <span>TEAMING</span></h1>
      <ul>
        <li><a href="profile.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Know More About attack <i class="fas fa-caret-down"></i></a>

            <div class="dropdown-menu">
                <ul>
                    <li>
                        <a href="#">Attack<i class="fas fa-caret-right"></i></a>
                        <div class="dropdown-menu-1">
                            <ul>
                                <li><a href="sql.html">SQL Injection</a></li>
                                <li><a href="#">NAME2</a></li>
                                <li><a href="#">NAME3</a></li>
                                <li><a href="#">NAME4</a></li>
                            </ul>
                        </div>
                    </li>
                     <li>
                        <a href="#">Defend<i class="fas fa-caret-right"></i></a>
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
                    <li><a href="index.html">Logout</a></li>
                
              </div>
        </li>
      </ul>
    </div>
        <div class="container">
        <h1>Types of Attack </h1>
        <div class="group">
            <input type="checkbox" value="vulnerability scanning" class="checkbox" id="vulnerability scanning" />
            <label for="vulnerability scanning">Vulnerability scanning</label>

            &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input type="checkbox" value="exploitation for defense evasion" class="checkbox" id="exploitation for defense evasion" />
            <label for="exploitation for defense evasion">Exploitation for Defense Evasion</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input type="checkbox" value="sql injection" class="checkbox" id="sql injection" />
            <label for="sql injection">Sql injection</label>
        </div>
        <div class="group">
            <input type="checkbox" value="brute force password cracking" class="checkbox" id="brute force password cracking" />
            <label for="brute force password cracking">Brute force password cracking</label>

           &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input type="checkbox" value="account manipulation" class="checkbox" id="account manipulation" />
            <label for="account manipulation">Account Manipulation</label>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
    </div>
    <div class="print_value">
        <p id="valuelist"></p>
    </div>
    <script>
        var valuelist = document.getElementById('valuelist');
var text = '<span> you have selected: </span>';
var listArray=[];
let count = 0;

var checkboxes = document.querySelectorAll('.checkbox');

for(var checkboxe of checkboxes)
{
    checkboxe.addEventListener('click',function()
    {
        if(this.checked == true)
        {
            count=count++;
            document.cookie=count+'='+this.value;
            listArray.push(this.value);
            valuelist.innerHTML = text + listArray.join(' / ');

        } 
        else
        {
            listArray = listArray.filter(e => e !== this.value);
            valuelist.innerHTML = text + listArray.join(' / ');

        }
    })
}
    </script>
    <div class="button">  
        <button type='submit'class='submit-btn' onclick="window.location.href = 'attack2.html';">Attack</button>  <!-- login button----->
    </div>
    <div class="hero">
      &nbsp;
    </div>
</body>
</html>
