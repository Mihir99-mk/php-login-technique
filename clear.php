<?php

session_start();
$views = $_SESSION['fname'];

unset($_SESSION['fname']);
session_destroy();
echo "clearing ....";

header('location: send.php');


?>
