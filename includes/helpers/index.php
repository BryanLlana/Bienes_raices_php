<?php
require __DIR__ . "/../app.php";

function renderTemplate(string $nameUrl, bool $isHomePage = false) {
  include TEMPLATES_URL . "/{$nameUrl}.php";
}