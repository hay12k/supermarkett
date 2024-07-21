<?php include "./controller/controller.php"; ?>
<?php
if (isset($_SESSION['login']) && isset($_SESSION['id'])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
</head>

<body>
    <!-- starts popup of the add  -->
    <div class="modal fade" id="categoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="categoryModalLabel">Add Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="category.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Category Name</label>
                            <input type="Text" name="name" class="form-control" placeholder="Enter category name">
                        </div>
                        <div class="form-group">
                            <label for="">Category Description</label>
                            <input type="Text" name="description" class="form-control"
                                placeholder="Enter category name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add_cat" class="btn btn-primary">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ends popup of the add  -->

    <!-- starts popup of the Edit  -->
    <div class="modal fade" id="categoryEditModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="categoryEditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="categoryEditModalLabel">Edit Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="category.php" method="post">
                    <div class="modal-body modal-lg">
                        <input type="hidden" name="editCat_id" id="editCat_id">
                        <div class="category_edit_btn">
                            <div class="form-group">
                                <label for="">Category Name</label>
                                <input type="Text" name="name" id="edit_name" class="form-control" placeholder="Enter category name">
                            </div>
                            <div class="form-group">
                                <label for="">Category Description</label>
                                <input type="Text" name="Description" id="edit_Description" class="form-control"
                                    placeholder="Enter category name">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="edit_cat" class="btn btn-primary">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ends popup of the Edit  -->

    <nav class="sidebar">
        <?php include "./include/sidebar.php"; ?>
    </nav>

    <div class="main">
        <div class="topbar">
            <?php include "./include/header.php"; ?>
        </div>
        <div class="title-main">
            <div class="text">Category List</div>
        </div>
        <div class="recentOrders aral">
            <div class="cardHeader">
                <h2>Manage category</h2>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
                    Add Category
                </button>

            </div>
            <?php
                if (isset($_GET['errmsg'])) { ?>
            <h1 class="error">
                <?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg'] = ""; ?></h1>
            <?php } ?>
            <?php
                if (isset($_GET['success'])) { ?>
            <h1 class="success">
                <?php echo $_SESSION['success']; ?></h1>
            <?php } ?>

            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Category Name</td>
                        <td>UserName</td>
                        <td>Description</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $result = $con->query("SELECT c.id as id, u.username as username ,c.name as category_name, c.description as description FROM category c INNER JOIN users u ON c.userID=u.id");
                        while ($row = mysqli_fetch_array($result)) {
                            $test_id = $row['id'];?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['category_name']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><a href="#" data-id='<?php echo $row['id']; ?>' class="edit edit_Btn"><i class='bx bxs-edit '></i> </a>
                            <a href="category.php?delcat=<?php echo $row['id']; ?>" class="delete"><i
                                    class='bx bx-trash'></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('.edit_Btn').click(function(e) {
            e.preventDefault();
            $('#categoryEditModal').modal('show');
            $tr = $(this).closest('tr');
            var category_id =$tr.children("td").map(function(){
                return $(this).text();
            }).get();
            // console.log(category_id);
            $('#editCat_id').val(category_id[0]);
            $('#edit_name').val(category_id[1]);
            $('#edit_Description').val(category_id[3]);
        });
    });
    </script>
</body>

</html>
<?php
} else {
    header("location: login.php");
    exit();
}