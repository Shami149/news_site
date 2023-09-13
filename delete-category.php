<?php
include "config.php";
$id = $_GET['id'];
$sql = " DELETE FROM `category` WHERE category_id = {$id} ";
 if(mysqli_query($conn, $sql)) {
    header("location:{$hostname}/admin/category.php");
}else{
    die("query failed");
}
?>