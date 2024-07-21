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
    <title>Products</title>
</head>

<body>

    <!-- starts popup of the add  -->
    <div class="modal fade" id="categoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="categoryModalLabel">Add Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="prodect.php" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6" style="margin-bottom: 13px;">
                                <div class="form-group">
                                    <label for="">Product Category</label>
                                    <select name="category" class="form-select" aria-label=".form-select-lg example">
                                        <option selected value="">-- Select One --</option>
                                        <?php
                                        $result = $con->query("select * from category");
                                        while($row=mysqli_fetch_array($result)){;
                                            ?>
                                        <option value="<?php echo $row['id'] ;?>"><?php echo $row['name'] ;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6" style="margin-bottom: 13px;">
                                <div class="form-group">
                                    <label for="">Product Name</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Enter Product Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6" style="margin-bottom: 13px;">
                                <!-- Product Image -->
                                <!-- <div class="col">
                                <div class="form-group">
                                    <label for="">Product Image </label>
                                    <input type="file" name="image" class="form-control" accept=".jpg, .jpeg, .png">
                                </div>
                                </div> -->
                                <div class="form-group">
                                    <label for="">Quantity</label>
                                    <input type="number" name="qty" class="form-control" placeholder="Enter Quantity">
                                </div>
                            </div>
                            <div class="col-6" style="margin-bottom: 13px;">
                                <div class="row" style="margin-bottom: 13px;">
                                    <div class="form-group">
                                        <label for="">Cost Price</label>
                                        <input type="number" name="c_price" class="form-control"
                                            placeholder="Enter Price">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6" style="margin-bottom: 13px;">
                                <div class="row" style="margin-bottom: 13px;">
                                    <div class="form-group" style="margin-bottom: 13px;">
                                        <label for="">Sales Price</label>
                                        <input type="number" name="s_price" class="form-control"
                                            placeholder="Enter Discount">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6" style="margin-bottom: 13px;">
                                <div class="form-group">
                                    <label for="">Product Expire</label>
                                    <input type="date" name="p_expire" class="form-control"
                                        placeholder="Enter Product Expire">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" name="description" class="form-control" placeholder="Enter description">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add_pro" class="btn btn-primary">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ends popup of the add  -->

    <nav class="sidebar">
        <?php include "./include/sidebar.php"; ?>
    </nav>

    <div class="main">
        <div class="topbar">
            <?php include "./include/header.php"; ?>
        </div>
        <div class="title-main">
            <div class="text">Products</div>
        </div>
        <div class="recentOrders aral">
            <div class="cardHeader">
                <h2>Manage Products</h2>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
                    Add Product
                </button>
            </div>
            <?php  
            if(isset($_GET['error'])){?>
            <h1 class="error">
                <?php echo $_SESSION['errmsg']; ?></h1>
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
                        <td>Name</td>
                        <td>Category Name</td>
                        <td>UserName</td>
                        <!-- <td>Image</td> -->
                        <td>Quantity</td>
                        <td>Cost Price</td>
                        <td>Sale Price</td>
                        <td>Product Expire</td>
                        <td>Description</td>
                        <!-- <td>Status</td> -->
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $con->query("SELECT p.id,p.name as p_name,c.name as category_name,u.username as username,p.quantity,p.cost_price,p.sales_price,p.description,p.ExpirDate FROM products p INNER JOIN users u ON p.userID=u.id INNER JOIN category c ON p.category_id=c.id  WHERE p.quantity > 0 and p.ExpirDate > CURDATE()");
                    while($row=mysqli_fetch_array($result)){?>
                    <tr>
                        <td><?php echo $row['id'] ;?></td>
                        <td><?php echo $row['p_name'] ;?></td>
                        <td><?php echo $row['category_name'] ;?></td>
                        <td><?php echo $row['username'] ;?></td>
                        <!-- <td>
                            <img src="./assets/img/product/" style="width:30px; height: 30px;">
                        </td> -->
                        <td><?php echo $row['quantity'] ;?></td>
                        <td><?php echo $row['cost_price'] ;?></td>
                        <td><?php echo $row['sales_price'] ;?></td>
                        <td><?php echo $row['ExpirDate'] ;?></td>
                        <td><?php echo $row['description'] ;?></td>
                        <!-- <td><span class="status delivered">Delivered</span></td> -->
                        <td>
                            <a href="#" class="edit editBtn">
                                <i class='bx bxs-edit' id="editBtn"></i>
                            </a>
                            <a href="prodect.php?delpro=<?php echo $row['id'] ?>" class="delete">
                                <i class='bx bx-trash'></i>
                            </a>
                        </td>
                    </tr> <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- start popup of the edit  -->
    <div class="modal fade" id="editProductModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="categoryModalLabel">Edit Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="prodect.php" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="product_id" id="product_id">
                            <div class="col-6" style="margin-bottom: 13px;">
                                <div class="form-group">
                                    <label for="">Product Category</label>
                                    <select name="category_edit" class="form-select category_edit"
                                        aria-label=".form-select-lg example">
                                        <?php
                                        $result = $con->query("select * from category");
                                        while($row=mysqli_fetch_array($result)){;
                                            ?>
                                        <option value="<?php echo $row['id'] ;?>"><?php echo $row['name'] ;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6" style="margin-bottom: 13px;">
                                <div class="form-group">
                                    <label for="">Product Name</label>
                                    <input type="text" name="name_edit" class="form-control name_edit"
                                        placeholder="Enter Product Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6" style="margin-bottom: 13px;">
                                <!-- Product Image -->
                                <!-- <div class="col">
                                <div class="form-group">
                                    <label for="">Product Image </label>
                                    <input type="file" name="image" class="form-control" accept=".jpg, .jpeg, .png">
                                </div>
                                </div> -->
                                <div class="form-group">
                                    <label for="">Quantity</label>
                                    <input type="number" name="qty_edit" class="form-control qty_edit"
                                        placeholder="Enter Quantity">
                                </div>
                            </div>
                            <div class="col-6" style="margin-bottom: 13px;">
                                <div class="form-group">
                                    <label for="">Cost Price</label>
                                    <input type="number" name="c_price_edit" class="form-control c_price_edit"
                                        placeholder="Enter Price">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6" style="margin-bottom: 13px;">
                                <div class="form-group" style="margin-bottom: 13px;">
                                    <label for="">Sales Price</label>
                                    <input type="number" name="s_price_edit" class="form-control s_price_edit"
                                        placeholder="Enter Discount">
                                </div>
                            </div>
                            <div class="col-6" style="margin-bottom: 13px;">
                                <div class="form-group">
                                    <label for="">Product Expire</label>
                                    <input type="date" name="p_expire_edit" class="form-control p_expire_edit"
                                        placeholder="Enter Price">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" name="description_edit" class="form-control description_edit"
                                    placeholder="Enter Price">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="editProduct" class="btn btn-primary">Edit Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end popup of the edit  -->








    <script>
    $(document).ready(function() {
        $('.editBtn').click(function(e) {
            e.preventDefault();
            $('#editProductModel').modal('show');
            $tr = $(this).closest('tr');
            var product_id = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            // console.log(product_id);
            $('#product_id').val(product_id[0]);
            $('.name_edit').val(product_id[1]);
            // $('.category_edit').val(product_id[2]);


            var test = $(".category_edit").find(':selected').val();

            console.log($(".category_edit option:selected"));

            $('.category_edit').find($('<option selected>').val(product_id[2]).text(product_id[2]));
            $('.qty_edit').val(product_id[4]);
            $('.c_price_edit').val(product_id[5]);
            $('.s_price_edit').val(product_id[6]);
            $('.p_expire_edit').val(product_id[7]);
            $('.description_edit').val(product_id[8]);
            // console.log(product_id[2]);
        });
    });
    </script>



</body>


</html>
<?php }else{
    header("location: login.php");
    exit();
}