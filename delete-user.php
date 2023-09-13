<?php
include "config.php";
$id = $_GET['id'];
$sql = " DELETE FROM `user` WHERE user_id = {$id} ";
 if(mysqli_query($conn, $sql)) {
    header("location:{$hostname}/admin/users.php");
}else{
    die("query failed");
}
?>