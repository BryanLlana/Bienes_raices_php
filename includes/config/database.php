<?php 
function connectDatabase() : mysqli {
  $db = new mysqli("localhost", "root", "root", "bienesraices");

  if (!$db) {
    echo "Error connection database";
    exit;
  }

  return $db;
}