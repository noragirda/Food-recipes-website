<?php
session_start();

session_destroy();

header('Location:recipes.php');
exit();
?>