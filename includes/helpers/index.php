<?php
define('TEMPLATES_URL', __DIR__ . '/../templates');
define('FUNCTIONS_URL', __DIR__ . '/index.php');

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

function sanitize($html) {
  $sanitize = htmlspecialchars($html);
  return $sanitize;
}