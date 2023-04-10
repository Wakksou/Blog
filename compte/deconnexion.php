<?php 
require '../header.php';
unset($_SESSION['email']);
session_destroy();
header('Location: http://localhost/blog/blog/index.php');

?>