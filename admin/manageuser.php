<?php include "./controller/controller.php"; ?>
<?php
 if(isset($_SESSION['login']) && $_SESSION['role'] == "admin"){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>

<body>

    <!-- starts popup of the add  -->
    <div class="modal fade" id="categoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="categoryModalLabel">Add Users</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="manageuser.php" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">User Name</label>
                                    <input type="Text" name="username" class="form-control"
                                        placeholder="Enter UserName">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Enter User Email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Enter password">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" class="form-select" aria-label=".form-select-lg example">
                                        <option selected>-- Select One --</option>
                                        <option value="Active">Active</option>
                                        <option value="InActive">InActive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="ro">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Role</label>
                                    <select name="role" class="form-select" aria-label=".form-select-lg example">
                                        <option selected>-- Select One --</option>
                                        <option value="admin">admin</option>
                                        <option value="Employee">Employee</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col">
                                <div class="form-group">
                                    <label for="">Product Image </label>
                                    <input type="file" name="image" class="form-control" accept=".jpg, .jpeg, .png">
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add_user" class="btn btn-primary">Add User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <nav class="sidebar">
        <?php include "./include/sidebar.php"; ?>
    </nav>
    <div class="main">
        <div class="topbar">
            <?php include "./include/header.php"; ?>
        </div>
        <div class="title-main">
            <div class="text">Users</div>
        </div>
        <div class="recentOrders aral">
            <div class="cardHeader">
                <h2>Manage Users</h2>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
                    Add Users
                </button>
            </div>
            <?php  
            if(isset($_GET['error'])){?>
            <h1 class="error">
                <?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></h1>
            <?php } ?>
            <?php  
            if(isset($_GET['success'])){?>
            <h1 class="success">
                <?php echo $_SESSION['success']; ?></h1>
            <?php } ?>

            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Username</td>
                        <td>Email</td>
                        <!-- <td>Image</td> -->
                        <td>Role</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $resualt = $con->query("select * from users");
                    while($row=mysqli_fetch_array($resualt)){?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <!-- <td><img src="./assets/image/profile/<?php //echo $row['image'] ?>" alt=""></td> -->
                        <td><?php echo $row['role'] ?></td>
                        <td><span class="status delivered"><?php echo $row['status'] ?></span></td>
                        <td><a href="#"  class="edit"><i class='bx bxs-edit editBtn' id="editBtn"></i></a> <a
                                href="manageuser.php?deluser=<?php echo $row['id'] ?>" class="delete"><i
                                    class='bx bx-trash'></i></a></td>
                    </tr> <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- start popup of the edit  -->
    <div class="modal fade" id="editManageUsersModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="categoryModalLabel">Edit ManageUSers</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="manageuser.php" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="modal-body">
                    <input type="hidden" name="editUser_id" id="editUser_id">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">User Name</label>
                                    <input type="Text" name="username" id="edit_username" class="form-control"
                                        placeholder="Enter UserName">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" id="edit_email" class="form-control"
                                        placeholder="Enter User Email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" id="edit_password" class="form-control"
                                        placeholder="Enter password">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" id="edit_status" class="form-select" aria-label=".form-select-lg example">
                                        <option selected>-- Select One --</option>
                                        <option value="Active">Active</option>
                                        <option value="inActive">InActive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="ro">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Role</label>
                                    <select name="role" id="edit_role" class="form-select" aria-label=".form-select-lg example">
                                        <option selected>-- Select One --</option>
                                        <option value="admin">Admin</option>
                                        <option value="Employee">Employee</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col">
                                <div class="form-group">
                                    <label for="">Product Image </label>
                                    <input type="file" name="image" id="edit_image" class="form-control" accept=".jpg, .jpeg, .png">
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="editUsers" class="btn btn-primary">Edit Users</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end popup of the edit  -->

</body>
<script>
$(document).ready(function() {
    $('.editBtn').click(function(e) {
        e.preventDefault();
        $('#editManageUsersModel').modal('show');
        $tr = $(this).closest('tr');
        var manageUser_id = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        // console.log(category_id);
        $('#editUser_id').val(manageUser_id[0]);
        $('#edit_username').val(manageUser_id[1]);
        $('#edit_email').val(manageUser_id[2]);
        $('#edit_role').val(manageUser_id[3]);
        $('#edit_status').val(manageUser_id[4]);
        $('#edit_password').val(manageUser_id[3]);
    });
});
</script>

</html>
<?php }else{
    header("location: ./authantication/login.php");
    exit();
}