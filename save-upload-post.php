<?php
include "config.php";
if(empty($_FILES['new-image'])){
    $post_id =mysqli_real_escape_string($conn,$_POST['post_id']);
    $file_name = $_POST['old-image'];
}else{
    $errors = array();
    $post_id =mysqli_real_escape_string($conn,$_POST['post_id']);
    $file_name = $_FILES['new-image']['name'];
    $file_size = $_FILES['new-image']['size'];
    $file_type = $_FILES['new-image']['type'];
    $file_temp = $_FILES['new-image']['tmp_name'];
    $exe = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $ext = explode(".", $file_name);
    $arr = array("png", "jpg", "jpeg");
    $name = rand(100000,900000);
    $mypic = $name.".".$exe;

    if(empty($errors) == true){
        move_uploaded_file($file_temp, "upload/".$file_name);
    }else{
        print_r($errors);
        die();
    }

     $sql = "UPDATE post SET title ='{$_POST["post_title"]}',description='{$_POST["postdesc"]}',category ={$_POST["category"]},post_img='$file_name' WHERE post_id= $post_id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location:{$hostname}/admin/post.php");
    }else{
        echo "query failled";
    }
}
?>