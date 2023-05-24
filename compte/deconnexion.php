<?php 
require '../header.php';
unset($_SESSION['email']);
session_destroy();
header('Location: http://localhost/Blog/Blog/src/pages/index.php');

?>