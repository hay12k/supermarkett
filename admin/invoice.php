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
    <title>invoice</title>
</head>

<body>
    <!-- starts popup of the add Invoice -->
    <div class="modal fade" id="salesModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="salesModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="salesModalLabel">Add invoice</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="invoice.php" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="modal-body">
                        <!-- Line 1 -->
                        <div class="row">
                            <div class="col-6" style="margin-bottom: 13px;">
                                <div class="form-group">
                                    <label for="">Select Category First</label>
                                    <select name="category" class="form-select p_category"
                                        aria-label=".form-select-lg example" id="p_category" required>
                                        <option selected value="" selected disabled>
                                            -- Select One --
                                        </option>
                                        <?php
                                        $result = $con->query("SELECT * FROM category");
                                        while($row=mysqli_fetch_array($result)){;
                                            ?>
                                        <option value="<?php echo $row['id'] ;?>"><?php echo $row['name'] ;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6" style="margin-bottom: 13px;">
                                <div class="form-group">
                                    <label for="">Select Product</label>
                                    <select name="product_name" class="form-select" id="select_product"
                                        aria-label=".form-select-lg example" required>
                                        <option selected value="">-- Select One --</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <!-- Line 2 -->
                        <div class="row" style="margin-bottom: 13px;">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Quantity</label>
                                    <input type="number" name="qty" class="form-control" placeholder="Enter Quantity" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group" style="margin-bottom: 13px;">
                                    <label for="">Discount</label>
                                    <input type="text" name="discount" class="form-control" placeholder="Enter Discount" required>
                                </div>
                            </div>
                        </div>


                        <!-- Line 3 -->
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <!-- <input type="text" name="description" class="form-control" placeholder="Enter Price"> -->
                                    <select name="status" class="form-select" id="status" required>
                                        <!-- <option value=""> --Select One-- </option> -->
                                        <option value="2" selected> invoice </option>
                                        <option value="3"> Pending </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group" style="margin-bottom: 13px;">
                                    <label for="">Paid</label>
                                    <input type="text" name="paid" class="form-control" placeholder="Paid" required>
                                </div>
                            </div>
                        </div>


                        <!-- Line 4 -->


                        <div class="row">
                            <div class="col-6">
                                <div class="form-group" style="margin-bottom: 13px;">
                                    <label for="">Resto</label>
                                    <input type="text" name="Resto" class="form-control" placeholder="Resto" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group" style="margin-bottom: 13px;">
                                    <label for="">Customer Name</label>
                                    <select name="c_name" class="form-select c_name"
                                        aria-label=".form-select-lg example" id="c_name" required>
                                        <option selected value="" selected disabled>
                                            -- Select One --
                                        </option>
                                        <?php
                                        $result = $con->query("SELECT * FROM customers");
                                        while($row=mysqli_fetch_array($result)){;
                                            ?>
                                        <option value="<?php echo $row['id'] ;?>"><?php echo $row['c_name'] ;?></option>
                                        <?php } ?>
                                    </select>


                                    <!-- <input type="text" name="c_name" class="form-control" placeholder="Enter Customer Name" required> -->
                                </div>
                            </div>
                        </div>


    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add_invoice" class="btn btn-primary">Add Invoice</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ends popup of the add Invoice -->


    <!-- starts popup of the Edit Invoice -->
    <div class="modal fade" id="EditInvoiceModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="salesModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="salesModalLabel">Edit invoice</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="sales.php" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="modal-body">
                        <!-- Line 1 -->
                        <div class="row">
                            
                            <div class="col-6" style="margin-bottom: 13px;">
                                <div class="form-group">
                                    <label for="">Select Category First</label>
                                    <select name="categoryEdit" class="form-select p_category"
                                        aria-label=".form-select-lg example" id="categoryEdit" required>
 
                                    </select>
                                </div>
                            </div>

                            <div class="col-6" style="margin-bottom: 13px;">
                                <div class="form-group">
                                    <label for="">Select Product</label>
                                    <select name="product_Edit" id="product_Edit" class="form-select" id="select_product"
                                        aria-label=".form-select-lg example" required>
                                        <!-- <option selected value="">-- Select One --</option> -->
                                    </select>
                                </div>
                            </div>

                        </div>

                        <!-- Line 2 -->
                        <div class="row" style="margin-bottom: 13px;">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Quantity</label>
                                    <input type="number" name="qtyEdit" class="form-control" placeholder="Enter Quantity" id="qtyEdit" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group" style="margin-bottom: 13px;">
                                    <label for="">Discount</label>
                                    <input type="text" name="discountEdit" id="discountEdit" class="form-control" placeholder="Enter Discount" required>
                                </div>
                            </div>
                        </div>


                        <!-- Line 3 -->
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <!-- <input type="text" name="description" class="form-control" placeholder="Enter Price"> -->
                                    <select name="statusEdit" class="form-select" id="statusEdit" required>
                                        <!-- <option value=""> --Select One-- </option> -->
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group" style="margin-bottom: 13px;">
                                    <label for="">Resto</label>
                                    <input type="text" name="RestoEdit" id="RestoEdit" class="form-control RestoEdit" placeholder="Resto" required>
                                </div>
                            </div>
                        </div>


                        <!-- Line 4 -->


                        <div class="row">
                            <div class="col-12">
                                <div class="form-group" style="margin-bottom: 13px;">
                                    <label for="">Customer Name</label>
                                    <select name="c_nameEdit" class="form-select c_name"
                                        aria-label=".form-select-lg example" id="c_nameEdit" required>


                                    </select>


                                    <!-- <input type="text" name="c_name" class="form-control" placeholder="Enter Customer Name" required> -->
                                </div>
                            </div>
                        </div>

                        <input type="hidden" id="invoice_id" name="invoice_id">


    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="edit_in" class="btn btn-primary" id="">Edit Invoice</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ends popup of the Edit Invoice -->

    <nav class="sidebar">
        <?php include "./include/sidebar.php"; ?>
    </nav>

    <div class="main">
        <div class="topbar">
            <?php include "./include/header.php"; ?>
        </div>
        <div class="title-main">
            <div class="text">Invoices</div>
        </div>
        <div class="recentOrders aral">
            <div class="cardHeader">
                <h2>Manage invoices</h2>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#salesModal">
                    Add invoice
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
                <?php 
                    } 
            ?>

            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <td>NO</td>
                        <td>Product Name</td>
                        <td>Customer Name</td>
                        <td>Quantity</td>
                        <td>price</td>
                        <td>Discount</td>
                        <td>Paid</td>
                        <td>Resto</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $count = 0;
                    ?>
                    <?php
                    // $result = $con->query("SELECT * FROM sales");
                    $result = $con->query("SELECT s.id as id,p.name as product_id,u.username AS username ,s.quantity as quantity, p.sales_price as sales_price, s.discount as discount, s.paid as paid, s.status as status, s.Resto as Resto, c.c_name FROM sales s INNER JOIN products p ON s.product_id=p.id INNER JOIN users u ON s.userID=u.id INNER JOIN customers c ON s.customer_name=c.id WHERE s.status = 3 OR s.status = 2");
                    while($row=mysqli_fetch_array($result)){   
                    ?>
                    <tr>
                        <td><?php echo $row['id'] ;?></td>
                        <td><?php echo $row['product_id'] ;?></td>
                        <td><?php echo $row['c_name'] ;?></td>
                        <td><?php echo $row['quantity'] ;?></td>
                        <td><?php echo $row['sales_price'] ;?></td>
                        <td><?php echo $row['discount'] ;?></td>
                        <td><?php echo $row['paid'] ;?></td>
                        <td><?php echo $row['Resto'] ;?></td>
                        <td class="">
                            <?php
                                if($row['status'] == 2){
                                    echo'
                                        <span class="status return"> Invoice </span>
                                    ';
                                } else{
                                    echo'
                                        <span class="status pending"> Pending </span>
                                    ';
                                }
                            ?>
                        </td> 
                        <td>
                            <a href="#" class="edit editBTN edit_in" id="<?php echo $row['id'] ;?>">
                                <i class='bx bxs-edit' id="editBtn"></i>
                            </a> 
                            <!-- <a href="controller.php?delsal=
                            <?php echo $row['id'] ?>
                            " class="delete">
                                <i class='bx bx-trash'></i>
                            </a> -->
                        </td>
                    </tr> <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    
</body>
    <script>
    
    // fetch_products_by_category
    $('.p_category').change(function() {
        var category_id = $('.p_category').val();
        // alert(c_id);
        $.ajax({
            type: 'POST',
            url: 'fetch_products_by_category.php',
            data: {id: category_id},
            success: function(data) {
                $("#select_product").html(data);
                // console.log(data);
            }
        });    

    });
    // Fetch Edit
    $(document).ready(function() {
        $('.edit_in').click(function(e) {
            e.preventDefault();
            $('#EditInvoiceModal').modal('show');
            var s_id = $(this).attr("id");
            console.log(s_id);
            $.ajax({
                url: "fetch_sales.php",
                method: "POST",
                data: {s_id:s_id},
                dataType: "json",
                success: function(data){
                    console.log(data);

                    $('#product_Edit').append('<option selected value="'+data.product_id+'"> '+data.p_name+' </option>');
                    $('#categoryEdit').append('<option selected value="'+data.category_name+'"> '+data.category_name+' </option>');


                    $('#invoice_id').val(s_id);
                    $('#qtyEdit').val(data.quantity);
                    $('#priceEdit').val(data.sales_price);
                    $('#discountEdit').val(data.discount);
                    $('#paidEdit').val(data.paid);
                    $('#RestoEdit').val(data.Resto);
                    // $('#statusEdit').val(data.status);
                    // $('#c_nameEdit').val(data.customer_name);
                    $('#c_nameEdit').append('<option selected value="'+data.c_id+'"> '+data.c_name+' </option>');
                    $('#statusEdit').append('<option selected value="'+data.status+'"> '+(data.status == '2' ? 'Invoice </option> <option value="3"> Pending </option>' : 'Pending')+' </option> <option value="1"> Paid </option>');

                }
            });
           
        });
    });

    </script>
</html>
<?php 
    }else{
        header("location: ./authantication/login.php");
        exit();
    }