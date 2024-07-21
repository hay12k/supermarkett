<?php include "./controller/controller.php"; ?>
<?php
 if(isset($_SESSION['login']) && isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
</head>

<body>
    <!-- starts popup of the add  -->
    <div class="modal fade" id="customerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="categoryModalLabel">Add Customer</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="category.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Customer Name</label>
                            <input type="text" name="c_name" class="form-control" placeholder="Customer Name">
                        </div>


            
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="form-control"
                                placeholder="Phone">
                        </div>

                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Address">
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" name="description" class="form-control"
                                placeholder="Description">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add_cus" class="btn btn-primary">Add Customer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ends popup of the add  -->

    <!-- starts popup of the Edit  -->
    <div class="modal fade" id="EditCustomerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="categoryModalLabel">Edit Customer</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="customers.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="editCus_id" id="editCus_id" class="form-control">
                        <div class="form-group">
                            <label for="">Customer Name</label>
                            <input type="text" name="edit_c_name" id="edit_c_name" class="form-control" placeholder="Customer Name">
                        </div>
            
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" id="edit_phone" name="edit_phone" class="form-control"
                                placeholder="Phone">
                        </div>

                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" id="edit_address" name="edit_address" class="form-control" placeholder="Address">
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" id="edit_description" name="edit_description" class="form-control edit_description"
                                placeholder="Description">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="edit_cust" class="btn btn-primary">Edit Customer</button>
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
            <div class="text">Customers</div>
        </div>
        <div class="recentOrders aral">
            <div class="cardHeader">
                <h2>Manage Customers</h2>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#customerModal">
                    Add Customers
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
                        <td>customer Name</td>
                        <td>UserName</td>
                        <td>phone</td>
                        <td>Address</td>
                        <td>Description</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $con->query("SELECT c.id ,u.username as username,c.c_name,c.phone,c.address,c.decription FROM customers c INNER JOIN users u ON c.userID=u.id");
                    while($row=mysqli_fetch_array($result)){?>
                    <tr>
                        <td><?php echo $row['id'] ;?></td>
                        <td><?php echo $row['c_name'] ;?></td>
                        <td><?php echo $row['username'] ;?></td>
                        <td><?php echo $row['phone'] ;?></td>
                        <td><?php echo $row['address'] ;?></td>
                        <td><?php echo $row['decription'] ;?></td>
                        <td><a href="#" class="edit edit_Btn" id="editBtn"><i class='bx bxs-edit'></i></a> <a
                                href="customers.php?delete_costumer=<?php echo $row['id'] ?>" class="delete"><i
                                    class=' bx bx-trash'></i></a></td>
                    </tr><?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('.edit_Btn').click(function(e) {
            e.preventDefault();
            $('#EditCustomerModal').modal('show');
            $tr = $(this).closest('tr');
            var customer_id =$tr.children("td").map(function(){
                return $(this).text();
            }).get();
            // console.log(category_id);
            $('#editCus_id').val(customer_id[0]);
            $('#edit_c_name').val(customer_id[1]);
            $('#edit_phone').val(customer_id[2]);
            $('#edit_address').val(customer_id[3]);
            $('#edit_description').val(customer_id[4]);
            // console.log(customer_id[4]);
        });
    });
    </script>
</body>

</html>
<?php }else{
    header("location: login.php");
    exit();
}