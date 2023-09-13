<?php include "header.php";
include "config.php";
$id = $_GET['id'];
$sql = "SELECT * FROM category WHERE category_id = '{$id}' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    echo $cat = mysqli_real_escape_string($conn, $_POST['cat_name']);
    $sql = "UPDATE category SET  category_name = '{$cat}' WHERE category_id = '{$id}' ";

    if (mysqli_query($conn, $sql)) {
        header("location:{$hostname}/admin/category.php");
        die("query failed");
    } else {
    }
}

?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="adin-heading"> Update Category</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <form method="POST">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name']; ?>" placeholder="" required>
                    </div>
                    <input type="submit" name="update" class="btn btn-primary" value="Update" required />
                </form>
            </div>
        </div>
    </div>
</div>
<?php

include "footer.php"; ?>