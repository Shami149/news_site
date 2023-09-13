<?php
include "config.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $q = "SELECT * FROM `post` WHERE post_id = $id";
    $run = mysqli_query($conn, $q);
    $exec = mysqli_fetch_assoc($run);
    unlink ("upload/". $exec['post_img']);
    $sql = "DELETE FROM `post` WHERE post_id=$id";
    $result = mysqli_query($conn,$sql,);
    if ($result) {
        header("location:{$hostname}/admin/post.php");
    }else{
        die(mysqli_error($conn));
    }
}
?>