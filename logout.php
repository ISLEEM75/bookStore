<?php
/**
 * Created by PhpStorm.
 * User: islee
 * Date: 1/10/2019
 * Time: 11:13 PM
 */
session_start();
$_SESSION["id"] = null;
header("location:index.php");
?>