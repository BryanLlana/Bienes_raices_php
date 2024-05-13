<?php
  require './includes/config/database.php';
  $database = connectDatabase();

  $email = "correo@correo.com";
  $password = "123456";
  $passwordHash = password_hash($password, PASSWORD_BCRYPT);
  
  $queryInserUser = "INSERT INTO users(email, password) VALUES ('{$email}','{$passwordHash}')";
  $resultInserUser = mysqli_query($database, $queryInserUser);
?>