<?php
//Вставка рецептов
if (isset($_POST["image"]) && isset($_POST["Nazva"]) && isset($_POST["Author"]) && isset($_POST["Ingrid"]) && isset($_POST["Wayofcook"])) {
  $mysqli = new mysqli("localhost", "root", "root", "project");

  // Check connection
  if ($mysqli->connect_errno) {
    echo "Подключение: 0, в следстии следующей ошибки: " . $mysqli->connect_error;
    exit();
  } else
    printf("Подключение: 1, ваш рецепт добавлен.\n");

  $image = $mysqli->real_escape_string($_POST["image"]);
  $nazva = $mysqli->real_escape_string($_POST["Nazva"]);
  $author = $mysqli->real_escape_string($_POST["Author"]);
  $ingrid = $mysqli->real_escape_string($_POST["Ingrid"]);
  $way = $mysqli->real_escape_string($_POST["Wayofcook"]);
  $sql = "INSERT INTO recepies (photo,author,nazva,ingridients,wayofcooking) VALUES ('$image','$author','$nazva','$ingrid','$way')";
  if(empty($image)||empty($nazva)||empty($ingrid)||empty($way)||empty($image)&&empty($nazva)&&empty($ingrid)&&empty($way)){
    echo "Введите данные"; 
  }
  else{
  $mysqli->query($sql);
  }
  $mysqli->close();
}
//Регистрация
else if (isset($_POST["reglogin"]) && isset($_POST["regpassword"]) && isset($_POST["regpassword2"])) {
  $mysqli = new mysqli("localhost", "root", "root", "project");

  // Check connection
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
  } else
    printf("Все подключилось.\n");
  $login = $mysqli->real_escape_string($_POST["reglogin"]);
  $password = $mysqli->real_escape_string($_POST["regpassword"]);
  $passwordcheck = $mysqli->real_escape_string($_POST["regpassword2"]);
  $sql2 = " INSERT INTO users (logina,passworda,passwordcheck) VALUES ('$login','$password','$passwordcheck')";
  if($password==$passwordcheck){
    $mysqli->query($sql2);
    echo "Вы зарегистрированы";
  }
  else{
    echo "Попробуйте снова";
  }
  $mysqli->close();
}
//Авторизация
else if (isset($_POST["login"]) && isset($_POST["password"])) {
  $mysqli = new mysqli("localhost", "root", "root", "project");

  // Check connection
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
  } else
    printf("Все подключилось.\n");
    $logina = $mysqli->real_escape_string($_POST["login"]);
    $passworda = $mysqli->real_escape_string($_POST["password"]);
    $sql3="SELECT logina, passworda, isregister from users";
    $sql4="UPDATE users SET isregister=1 WHERE logina='$logina'";
    if(empty($logina)||empty($passworda)||empty($logina)&&empty($passworda)){
      echo "Попробуйте снова"; 
    }
    else if($result = $mysqli->query($sql3)){
      foreach($result as $row){
        if($logina==$row["logina"]&&$passworda==$row["passworda"]){
          echo "Вы вошли.\n";
          $mysqli->query($sql4);
        }
      }
    }
    $mysqli->close();
}
//отзывы
else if (isset($_POST["OtzivText"]) && isset($_POST["NazvaRecepie"])&& isset($_POST["OtzivLogin"])&& isset($_POST["Mark"])) {
  $mysqli = new mysqli("localhost", "root", "root", "project");

  // Check connection
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
  } else
    printf("Все подключилось.\n");
    $text = $mysqli->real_escape_string($_POST["OtzivText"]);
    $recepie = $mysqli->real_escape_string($_POST["NazvaRecepie"]);
    $logina = $mysqli->real_escape_string($_POST["OtzivLogin"]);
    $mark = $mysqli->real_escape_string($_POST["Mark"]);
    if(empty($text)||empty($recepie)||empty($mark)||empty($text)&&empty($recepie)&&empty($mark)){
      echo "Введите данные"; 
    }
    else{
    $sql = "INSERT INTO otziv (texta,reference,logino,rating) VALUES ('$text','$recepie','$logina','$mark')";
    }
    $mysqli->query($sql);
    $mysqli->close();
}
?>