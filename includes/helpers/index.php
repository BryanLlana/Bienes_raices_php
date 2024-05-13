<?php
require __DIR__ . "/../app.php";

function renderTemplate(string $nameUrl, bool $isHomePage = false) {
  include TEMPLATES_URL . "/{$nameUrl}.php";
}

function isAuthenticated(): bool {
  session_start();
  $isAuthenticated = $_SESSION['isAuthenticated'];
  if ($isAuthenticated) {
    return true;
  }
  return false;
}