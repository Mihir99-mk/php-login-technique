<?php

session_start();
    unset($_SESSION['IS_LOGIN']);
echo "clearing ....";

header('location: index.php');
// die();

?>
