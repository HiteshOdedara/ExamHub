<?php
include("../../main_conn.php");
include("teacher_sidebar.php");
?>
        <div class="container-fluid">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Update teacher Profile </h6>
                </div>
                <div class="card-body">
                    <?php
        if(isset($_POST['edit_btn'])){
            $id = $_POST['edit_id'];

            $query="select * from teacher_info where id='$id'";
            $query_run = mysqli_query($conn,$query);

            foreach($query_run as $row)
            {
                ?>

                    <div class="modal-body">
                        <div class="form-group">
                            <form method="POST" action="teacher_code.php">

                                <input type="hidden" name="edit_id" class="form-control" value="<?php echo $row['id']?>"
                                    placeholder="id">
                        </div>

                        <div class="form-group">
                            <label> Username </label>
                            <input type="text" name="edit_username" class="form-control"
                                value="<?php echo $row['teacher_name']?>" placeholder="Enter Username" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="edit_email" class="form-control checking_email"
                                value="<?php echo $row['teacher_email']?>" placeholder="Enter Email" required>
                            <small class="error_email" style="color: red;"></small>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="edit_password" class="form-control"
                                value="<?php echo $row['teacher_password']?>" placeholder="Enter Password" required>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="edit_cpassword" class="form-control"
                                placeholder="Confirm Password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="editbtn" class="btn btn-primary">Update</button>
                    </div>

                    <?php
            }
        }
        ?>

                    </form>
                </div>
            </div>
        </div>
    </div>

     <!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form action="../../logout.php" method="post">
                    <button type="submit" class="btn btn-primary" name="admin_logout">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- profile modal -->
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Update Your Profile?</h5>
            </div>
            
                <?php
            $name = $_SESSION['admin_name'];

            $query="select * from admin_info where admin_name='$name'";
            $query_run = mysqli_query($conn,$query);

            foreach($query_run as $row)
            {
                ?>

                <div class="modal-body">
                    <div class="form-group">
                        <form method="POST" action="../admin_info/admin_code.php">

                            <input type="hidden" name="edit_id" class="form-control" value="<?php echo $row['id']?>"
                                placeholder="id">
                    </div>

                    <div class="form-group">
                        <label> Username </label>
                        <input type="text" name="edit_username" class="form-control"
                            value="<?php echo $row['admin_name']?>" placeholder="Enter Username" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="edit_email" class="form-control checking_email"
                            value="<?php echo $row['admin_email']?>" placeholder="Enter Email" required>
                        <small class="error_email" style="color: red;"></small>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="edit_password" class="form-control"
                            value="<?php echo $row['admin_password']?>" placeholder="Enter Password" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="edit_cpassword" class="form-control" placeholder="Confirm Password"
                            required>
                    </div>
                </div>
                
            
    
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <div class="modal-footer">
                    <button type="submit" name="profile_editbtn" class="btn btn-primary">Update</button>
                </div>
                <?php
            }
    ?>
                </form>
        </div>
    </div>
</div>
</div>

    <?php
include ("../include/script.php");
include ("../include/footer.php");

?>