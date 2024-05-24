<?php 
session_start();

$id = $_GET['id'];
unset($_SESSION['dataSiswa'][$id]);
header("Location: index.php");
?>