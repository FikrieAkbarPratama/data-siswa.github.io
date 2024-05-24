<?php 
session_start();
session_destroy();
unset($_SESSION['dataSiswa']);
header("Location: index.php");
?>