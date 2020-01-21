<?php
require 'rec_stf_server.php';
session_start();
$sql="DELETE FROM ".$_GET['table']." WHERE id=".$_SESSION['id'];
$conn->query($sql);
echo "<script>window.history.go(-1);</script>";
?>