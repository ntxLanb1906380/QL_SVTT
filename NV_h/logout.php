<?php
session_start();
unset($_SESSION["idnv"]);
header("Location:login.php");
?>