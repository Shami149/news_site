<?php
include "config.php";
if (isset($_FILES['fileToUpload'])) {
    session_start();
$title = mysqli_real_escape_string($conn, $_POST['post_title']);
$postdesc = mysqli_real_escape_string($conn, $_POST['postdesc']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
$date = date("d M, Y");
$author = $_SESSION['user_id'];
    $errors = array();
    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_temp = $_FILES['fileToUpload']['tmp_name'];
    $exe = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $ext = explode(".", $file_name);
    $arr = array("png", "jpg", "jpeg");
    $name = rand(100000,900000);
    if(in_array($exe, $arr)) {
        $mypic = $name.".".$exe;
        $sql = "INSERT INTO post (title, description, category, post_date,author,post_img) VALUES ('{$title}','{$postdesc}',{$category},'{$date}',{$author},'{$mypic}');";
         $sql1 = "UPDATE category SET post = post + 1 WHERE category_id={$category}";
         $q = mysqli_query($conn, $sql);
         $f = mysqli_query($conn, $sql1);
          if ($q && $f) {
          move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "./upload/".$mypic) or die();
          header("location:{$hostname}/admin/post.php");
      }else{
          echo '<div class="error">Error Occured</div>';
      }
      }
  }
?>
