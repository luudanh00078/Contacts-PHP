<?php
session_start();
//$_SESSION["user"] = null;
unset($_SESSION["username"]);
header("location:login.php");
