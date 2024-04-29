<?php 
function connectDatabase() : mysqli {
  $db = mysqli_connect("localhost", "root", "root", "bienesraices");

  if (!$db) {
    echo "Error connection database";
    exit;
  }

  return $db;
}