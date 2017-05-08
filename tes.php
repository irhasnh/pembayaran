<?php
include'sideServer/class.php';
$user= new user();
$tampil=$user->tampilPerUsername('pilopa');

echo json_encode($tampil);

?>