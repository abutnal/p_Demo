<?php
session_start();
session_destroy($_SEESION['user_id']);
session_unset();
header("Location:index.php");
die();
?>