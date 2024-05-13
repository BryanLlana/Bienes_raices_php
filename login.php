<?php
require './includes/config/database.php';
$database = connectDatabase();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = mysqli_real_escape_string($database, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
  $password = mysqli_real_escape_string($database, $_POST['password']);

  if (!$email || !$password) {
    $errors[] = 'Todos los campos son obligatorios';
  }

  if (empty($errors)) {
    $queryGetUser = "SELECT * FROM users WHERE email = '{$email}'";
    $resultGetUser = mysqli_query($database, $queryGetUser);
    
    if ($resultGetUser->num_rows) {
      $user = mysqli_fetch_assoc($resultGetUser);
      $isAuthenticated = password_verify($password, $user['password']);

      if ($isAuthenticated) {
        session_start();
        $_SESSION['user'] = $user['email'];
        $_SESSION['isAuthenticated'] = true;
        
        header('Location: /admin');
      } else {
        $errors[] = 'El password es incorrecto';
      }
    } else {
      $errors[] = 'El usuario no existe';
    }
  }
}

require './includes/helpers/index.php';
renderTemplate('header');
?>

<main class="container section content-center">
  <h1>Iniciar sesión</h1>

  <?php foreach($errors as $error) { ?>
    <div class="alert error">
      <?php echo $error ?>
    </div>
  <?php } ?>

  <form method="post" class="form">
    <fieldset>
      <legend>Email y password</legend>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Ejm: correo@correo.com">

      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Ejm: *********">
    </fieldset>

    <input type="submit" value="Iniciar sesión" class="btn-green">
  </form>
</main>

<?php 
renderTemplate('footer');
?>