<?
session_start();
$_SESSION["toggle"]=$_GET["toggle"] === 'true' ? true: false;
header("location: login.php");
?>
