<?php include "header.php";
include "config.php";
if (isset($_POST['submit'])) {
    $id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $fistn = mysqli_real_escape_string($conn, $_POST['f_name']);
    $lasttn =  mysqli_real_escape_string($conn, $_POST['l_name']);
    $user =  mysqli_real_escape_string($conn, $_POST['username']);
    // $password =  mysqli_real_escape_string($conn, md5($_POST['password']));
    $role =  mysqli_real_escape_string($conn, $_POST['role']);
    $sql = "UPDATE user SET  first_name = '{$fistn}', last_name = '{$lasttn}', username = '{$user}', role =    
    '{$role}' WHERE user_id = '{$id}' ";
   
        if(mysqli_query($conn, $sql)){
            header("location:{$hostname}/admin/users.php");
        }else{
            die("query failed");
        }
    }

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                <?php
                include "config.php";
                $id = $_GET['id'];
                $sql = "SELECT * FROM user WHERE user_id = {$id} "; 
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0 ) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        
                    
              
                ?>
                  <form  action="" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="<?php echo $row['user_id'];?>" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name'];?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name'];?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $row['username'];?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                          <?php
                           if( $row['role'] == 0){
                            echo'"<option value="1" selected>normal User</option>
                            <option value="0">Admin</option>';
                          }else{
                            echo'"<option value="1">normal User</option>
                            <option value="0" selected>Admin</option>';
                          };
                              
                              ?>
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <?php
                    }
                }
                ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
