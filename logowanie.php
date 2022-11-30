<?php session_start();?>
<html>
    <head>
        <meta charset="utf-8">
        <Title> Logowanie </Title>
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
      <br> 
<CENTER> <div id="proces">          
    <div id="rejestracja">
      <h3> Zarejestruj się </h3>
    <form method="POST">
          <input type="text" name="name" placeholder="Imię i nazwisko" required><br>
          <input type="email" name="email" placeholder="E-mail" required><br>
          <input type="text" name="username" placeholder="Nazwa użytkownika" required><br>
          <input type="password" name="password" placeholder="Hasło" required><br>
          <input type="password" name="password2" placeholder="Powtórz hasło" required><br><br>
          <input type="submit" name="submit" value="Zarejestruj"> 
  </form>
        
    </div>
<?php
              
              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "galeria";


              $conn = mysqli_connect($servername, $username, $password, $dbname)
              or die ("Odpowiedź: Błąd połączenia z serwerem");
              mysqli_select_db($conn, $dbname) or die("Trwa konserwacja bazy danych… Odśwież stronę za kilka sekund.");

              if(!empty($_POST['name'])&&($_POST['password']))
              {
              $user_fullname = mysqli_real_escape_string($conn, $_POST["name"]);
              $user_email = mysqli_real_escape_string($conn, $_POST["email"]);
              $user_password = mysqli_real_escape_string($conn, $_POST["password"]);
              $username = mysqli_real_escape_string($conn, $_POST["username"]);
              $password2 = mysqli_real_escape_string($conn, $_POST["password2"]);

              if ($user_password==$password2) 
              {
              $proba="SELECT username FROM user";  
              $result = $conn -> query ("$proba");
              while($row = $result->fetch_assoc()) {
              $usern = $row["username"];
              
              if($username==$usern){
                  echo 'Taki użytkownik już istnieje! Wybierz inną nazwę!';
              }
              else {
                  if (mysqli_query($conn, "INSERT INTO user (user_fullname, user_email, user_password, username) VALUES ('$user_fullname', '$user_email', '$user_password', '$username')")){
                                echo "Rejestracja przebiegła poprawnie";
                                } else{
                                echo "Nieoczekiwany błąd! Sprawdź poprawność podanych danych, lub spróbuj później";
                                }

              }}

            }
            else {
              echo "Podane hasła nie są jednakowe!";
            }
          }
            
          
              ?>







    <div id="logowanie">
      <h3> Zaloguj się </h3>
    <form method='POST'> 
    <input type="text" name="nazwa" placeholder="E-mail" /> 
    <br/> 
    <input type="password" name="haslo" placeholder="Hasło" /> <br>
    <br/>
    <input type="submit" name="submit" value="Zaloguj"> 
    
  </form>

                  <?php
                
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
                ;

                if(!empty($_POST['nazwa'])&&($_POST['haslo']))
                {
                $nazwa=$_POST['nazwa'];
                $haslo=$_POST['haslo'];
                    $proba="SELECT user_password FROM user WHERE username = '$nazwa'";  
                    $result = $conn -> query ("$proba");
                    while($row = $result->fetch_assoc()) {
                    $password = $row["user_password"];
                    
                    }
                    
                    if($password==$haslo)
                    {
                    $_SESSION['user'] = ($_POST['nazwa']);
                    $_SESSION['nazwa'] = $nazwa;
                    header("Location: profil.php");

                    }
                    else
                    {
                    echo "<center> <h3> Błędne haslo, lub takie konto nie istnieje </h3> </center>";
                    }

                }  
                    ?>
    </div>     </CENTER>       
             
        </div>
    </body>



</html>