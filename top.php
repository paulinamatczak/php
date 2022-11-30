<?php session_start();?>
<html>
    <head>
        <meta charset="utf-8">
        <Title> Top zdjęcia miesiąca</Title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
    <ul>
  <li><a href="index.php" class="active"><img src="logo.png" alt="logo" width="60px" height="60px" padding-bottom="0px"></a></li>  
  <li><a href="top.php" style="padding-top:35px;">Kategorie</a></li>
  <?php 
  if(!empty($_SESSION['user']))
  {
    echo '<li><a href="profil.php" style="padding-top:35px;"> Konto </a>'; 
    
  }
  else {
    echo '<li><a href="logowanie.php" style="padding-top:35px;"> Logowanie </a>';
  }
 ?>
</ul>

<div id="dodawanie"> 

    <div id="Wybor">
        <form method='POST'>
                    <center> 
                    <select name="kategoria">
                        <option value="ludzie">Ludzie</option>
                        <option value="zwierzeta">Zwierzęta</option>
                        <option value="natura">Natura</option>
                        <option value="sztuka">Sztuka</option>
                        <option value="inne">Inne</option>
                    </select> 
                    <input type="submit" name="submit" value="Pokaż">
                    </center>
        </form>
        <div id="kategorie">

        <?php
         
        if(!empty($_POST['kategoria'])) {
                $kategoria = $_POST['kategoria'];
           echo "<center> <h2>".$kategoria."</h2> </center>";  
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "galeria";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            $conn -> query ('SET NAMES utf8');
            $conn -> query ('SET CHARACTER_SET utf8_unicode_ci');
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }


            
            $sql = "SELECT * FROM `zdjecia` WHERE `kategoria` = '$kategoria'";
    
             $result = $conn->query($sql);
            if ($result->num_rows > 0) { 
                while($row = $result->fetch_assoc()) {
               $nazwa= $row["nazwa"];
               $autor= $row["autor"];
               $kategoria= $row["kategoria"];
              echo "<div id='galeria'>";
               echo "<img src='zdjecia/$nazwa' alt='zdjecie' width='100px' height='100px'>";
               echo "<div id='opis'>";
               echo "<b> Nazwa: </b>". $nazwa."<br>";
               echo "<b> Autor: </b>".$autor."<br>";
               echo "<b> Kategoria: </b>".$kategoria."<br>";
            }

            }
           

        }
        
        else
        {
         

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "galeria";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            $conn -> query ('SET NAMES utf8');
            $conn -> query ('SET CHARACTER_SET utf8_unicode_ci');
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }


            
            $sql = "SELECT * FROM `zdjecia` WHERE `kategoria` = 'ludzie'";
    
             $result = $conn->query($sql);
            if ($result->num_rows > 0) { 
                while($row = $result->fetch_assoc()) {
               $nazwa= $row["nazwa"];
               $autor= $row["autor"];
               $kategoria= $row["kategoria"];
              echo "<div id='galeria'>";
               echo "<img src='zdjecia/$nazwa' alt='zdjecie' width='100px' height='100px'>";
               echo "<div id='opis'>";
               echo "<b> Nazwa: </b>". $nazwa."<br>";
               echo "<b> Autor: </b>".$autor."<br>";
               echo "<b> Kategoria: </b>".$kategoria."<br>";
               echo "</div>";
              echo "</div>";
                }
            }

        }
 ?>
 </div>

    </div>

</div>







    </body>



</html>