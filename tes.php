<?php
include'sideServer/class.php';
$mk= new mk();
$id=1;
$ambil=$mk->tampilPerId($id);
echo json_encode($ambil);

?>