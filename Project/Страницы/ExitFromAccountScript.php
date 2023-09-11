<?php
$mysqli = new mysqli("localhost", "root", "root", "project");

// Check connection
if ($mysqli->connect_errno) {
  echo "Подключение: 0, в следстии следующей ошибки: " . $mysqli->connect_error;
  exit();
} else
  printf("Подключение: 1, вы вышли из аккаунта.\n");
    $sql2= "UPDATE users set isregister=0 WHERE isregister=1";
    $mysqli->query($sql2);
    $mysqli->close();
?>