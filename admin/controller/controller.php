<?php
session_start();
include("controller/connection.php");



// insert category
if (isset($_POST['add_cat'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $add_cat = "INSERT INTO category(name,userID ,description) VALUES('$name','" . $_SESSION['id'] . "','$description')";
    if ($rs = mysqli_query($con, $add_cat)) {
        $_SESSION['success'] = "Success insert to category";
        header("location: ./category.php?success");
        exit();
    } else {
        $_SESSION['errmsg'] = "error";
        header("location: ./category.php");
        exit();
    }
}
// Update category
if (isset($_POST['edit_cat'])) {
    $id = $_POST['editCat_id'];
    $name = $_POST['name'];
    $description = $_POST['Description'];
    $rs = $con->query("UPDATE category SET name='$name' , description = '$description' WHERE id='$id'");
    if ($rs) {
        $_SESSION['success'] = "Success Update to category";
        header("location: ./category.php?success");
        exit();
    } else {
        $_SESSION['errmsg'] = "error";
        header("location: ./category.php?error");
        exit();
    }
}

// Delete category
if (isset($_GET['delcat'])) {
    $id = $_GET['delcat'];
    $del = "DELETE FROM category where id='$id'";
    if ($rs = mysqli_query($con, $del)) {
        $_SESSION['success'] = "Success Delete to category";
        header("location: ./category.php?success");
        exit();
    } else {
        $_SESSION['errmsg'] = "error";
        header("location: ./category.php");
        exit();
    }
}


// 
// 

// Insert Users
if (isset($_POST['add_user'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $status = $_POST['status'];
    $role = $_POST['role'];

    $add_user = "INSERT INTO users(username,email,password,status,role) VALUES('$username','$email','$password','$status','$role')";
    if ($rs = mysqli_query($con, $add_user)) {
        $_SESSION['success'] = "Success Insert to user";
        header("location: ./manageuser.php?success");
        exit();
    } else {
        $_SESSION['errmsg'] = "error";
        header("location: ./manageuser.php");
        exit();
    }
}

// Update User
if (isset($_POST['editUsers'])) {
    $id = $_POST['editUser_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $role = $_POST['role'];
    $rs = $con->query("UPDATE users SET username='$username' , email='$email' ,  status='$status' , password='$password' ,role = '$role' WHERE id='$id'");
    if ($rs) {
        $_SESSION['success'] = "Success Update to user";
        header("location: ./manageuser.php?success");
        exit();
    } else {
        $_SESSION['errmsg'] = "error";
        header("location: ./manageuser.php?error");
        exit();
    }
}
// Delete Users
if (isset($_GET['deluser'])) {
    $id = $_GET['deluser'];
    $del = "DELETE FROM users where id='$id'";
    if ($rs = mysqli_query($con, $del)) {
        $_SESSION['success'] = "Success Delete to product";
        header("location: ./manageuser.php?success");
        exit();
    } else {
        $_SESSION['errmsg'] = "error";
        header("location: ./prodect.php");
        exit();
    }
}

// 
// 


// Insert Product
if (isset($_POST['add_pro'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $qty = $_POST['qty'];
    $c_price = $_POST['c_price'];
    $s_price = $_POST['s_price'];
    $p_expire = $_POST['p_expire'];
    $description = $_POST['description'];
    $newImageName = " ";
    $add_pro = "INSERT INTO products(name,category_id,userID,quantity,cost_price,sales_price,ExpirDate,description) VALUES('$name','$category','" . $_SESSION['id'] . "','$qty','$c_price','$s_price','$p_expire','$description')";
    if ($rs = mysqli_query($con, $add_pro)) {
        $_SESSION['success'] = "Success Insert to product";
        header("location: prodect.php?success");
        exit();
    } else {
        $_SESSION['errmsg'] = "error";
        header("location: prodect.php?error");
        exit();
    }
}



// Update Product
if (isset($_POST['editProduct'])) {
    // $id =$_POST['product_id'];
    $product_id = $_POST['product_id'];
    $category_edit = $_POST['category_edit'];
    $name_edit = $_POST['name_edit'];
    $qty_edit = $_POST['qty_edit'];
    $c_price_edit = $_POST['c_price_edit'];
    $s_price_edit = $_POST['s_price_edit'];
    $p_expire_edit = $_POST['p_expire_edit'];
    $description_edit = $_POST['description_edit'];
    // $rs=$con->query("UPDATE prodect SET name='$name' , description = '$description' WHERE id='$id'");

    $rs = $con->query("UPDATE `products` SET `name`='$name_edit',`category_id`='$category_edit',
            `iamge`=' ',`quantity`='$qty_edit',`cost_price`='$c_price_edit',`sales_price`='$s_price_edit',`ExpirDate`='$p_expire_edit',
            `description`='$description_edit' WHERE id='$product_id'
        ");
    if ($rs) {
        $_SESSION['success'] = "Success Update prodect.";
        header("location: ./prodect.php?success");
        exit();
    } else {
        $_SESSION['errmsg'] = "error";
        header("location: ./prodect.php?error");
        exit();
    }
}



// Delete Product
if (isset($_GET['delpro'])) {
    $id = $_GET['delpro'];
    $del = "DELETE FROM products where id='$id'";
    if ($rs = mysqli_query($con, $del)) {
        $_SESSION['success'] = "Success Delete to product";
        header("location: ./prodect.php?success");
        exit();
    } else {
        $_SESSION['errmsg'] = "error";
        header("location: ./prodect.php");
        exit();
    }
}



// 
// 


// Insert Sales
if (isset($_POST['add_sales'])) {
    $p_name = $_POST['product_name'];
    $name = $_POST['category'];
    $paid = $_POST['paid'];
    $qty = $_POST['qty'];
    $discount = $_POST['discount'];
    // $paid = $_POST['paid'];
    $status = $_POST['status'];
    $c_name = $_POST['c_name'];
    $add_sel = " INSERT INTO `sales`(`product_id`, `userID`, `quantity`,  
            `discount`, `paid`, `status`, `customer_name`,`Resto`) 
            VALUES 
            ('$p_name','" . $_SESSION['id'] . "', '$qty', '$discount','$paid' ,'$status', '$c_name', '0')
        ";
    if ($rs = mysqli_query($con, $add_sel)) {
        $update = "UPDATE `products` SET `quantity` = `quantity` - $qty 
                WHERE id = '$p_name' ";
        mysqli_query($con, $update);
        $_SESSION['success'] = "Success Add Sales";
        header("location: sales.php?success");
        exit();
    } else {
        $_SESSION['errmsg'] = "error";
        header("location: sales.php?error");
        exit();
    }
}


// Update invoice
if (isset($_POST['edit_in'])) {
    $id = $_POST['invoice_id'];
    $product_Edit = $_POST['product_Edit'];
    $categoryEdit = $_POST['categoryEdit'];


    $invoice_id = $_POST['invoice_id'];
    $qtyEdit = $_POST['qtyEdit'];
    $discountEdit = $_POST['discountEdit'];
    $RestoEdit = $_POST['RestoEdit'];
    $c_nameEdit = $_POST['c_nameEdit'];
    $statusEdit = $_POST['statusEdit'];

    $rs = $con->query("UPDATE `sales` SET `product_id`='$product_Edit',`quantity`='$qtyEdit',
            `discount`='$discountEdit',`status`='$statusEdit',`customer_name`='$c_nameEdit' WHERE id = '$id'");
    if ($rs) {
        $update = "UPDATE `sales` SET `paid` = `paid` + '$RestoEdit' , `Resto` = `Resto` - '$RestoEdit'
            WHERE id = '$id'";
        mysqli_query($con, $update);
        $_SESSION['success'] = "Success Update Invoice";
        header("location: ./invoice.php?success");
        exit();
    } else {
        $_SESSION['errmsg'] = "error";
        header("location: ./invoice.php?error");
        exit();
    }
}








// Delete Sales

// Insert Invoice
// if(isset($_POST['add_inv'])){
//     $c_name = $_POST['c_name'];
//     $phone = $_POST['phone'];
//     $p_name = $_POST['p_name'];
//     $qty = $_POST['qty'];
//     $discount = $_POST['discount'];
//     $price = $_POST['price'];
//     $paid = $_POST['paid'];
//     $status = $_POST['status'];
//     $add_inv= "INSERT INTO invoice(c_name,phone,p_name,quantity,price,discount,paid,status) VALUES('$c_name','$phone','$p_name','$qty','$price','$discount','$paid','$status')";
//     if($rs = mysqli_query($con, $add_inv)){
//         echo "success";
//         header("location: invoice.php");
//         exit();
//     }else{
//         echo "error";
//         header("location: invoice.php");
//         exit();
//     }
// }


if (isset($_POST['add_invoice'])) {
    $p_name = $_POST['product_name'];
    $name = $_POST['product_name'];
    $qty = $_POST['qty'];
    $discount = $_POST['discount'];
    $paid = $_POST['paid'];
    $balance = $_POST['Resto'];
    $c_name = $_POST['c_name'];
    $status = $_POST['status'];
    // $add_sel= "INSERT INTO sales(name,quantity,sales_price,discount, paid,status) VALUES('$p_name','$qty','$s_price','$discount','$paid','$status')";
    $add_sel = " INSERT INTO `sales`(`product_id`,`userID`, `quantity`,
            `discount`, `paid`, `status`, `Resto`, `customer_name`) 
            VALUES 
            ('$p_name','" . $_SESSION['id'] . "', '$qty',  '$discount', '$paid', '$status', '$balance',
             '$c_name')
        ";
    if ($rs = mysqli_query($con, $add_sel)) {
        $update = "UPDATE `products` SET `quantity` = `quantity` - $qty 
                WHERE id = '$p_name' ";
        mysqli_query($con, $update);
        $_SESSION['success'] = "Success insert Invoice";
        header("location: invoice.php?success");
        exit();
    } else {
        $_SESSION['errmsg'] = "error";
        header("location: invoice.php?error");
        exit();
    }
}





// Update Invoice

// Delete Invoice






//Insert Customers
if (isset($_POST['add_cus'])) {
    $c_name = $_POST['c_name'];
    // $c_name = $_POST['c_email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $add_cus = "INSERT INTO customers(c_name,userID,phone,address,decription) VALUES('$c_name','" . $_SESSION['id'] . "','$phone','$address','$description')";
    if ($rs = mysqli_query($con, $add_cus)) {
        echo "success";
        header("location: customers.php");
        exit();
    } else {
        echo "error";
        header("location: customers.php");
        exit();
    }
}
// Delete Customers wx ba ka dhiman  
if (isset($_POST['edit_cus'])) {
    $id = $_POST['editCus_id'];
    $name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $phone = $_POST['phone'];
    $description = $_POST['description'];
    if ($_FILES["image"]["error"] === 4) {
        echo "Image Does Not Exist";
    } else {
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];
        $validImageExtention = ['jpg', 'jpeg', 'png'];
        $imageExtenstion = explode('.', $fileName);
        $imageExtenstion = strtolower(end($imageExtenstion));
        if (!in_array($imageExtenstion, $validImageExtention)) {
            echo "Invalid Image Extension";
        } else if ($fileSize > 1000000) {
            echo "Image Size Is Too Large";
        } else {
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtenstion;
            move_uploaded_file($tmpName, './assets/img/customers/' . $newImageName);
        }
        $rs = $con->query("UPDATE category SET name='$name' , description = '$description' WHERE id='$id'");
        if ($rs) {
            $_SESSION['success'] = "Success Update to category";
            header("location: ./category.php?success");
            exit();
        } else {
            $_SESSION['errmsg'] = "error";
            header("location: ./category.php?error");
            exit();
        }
    }
}

// Delete Customers


//  
// 

// Update Customer
if (isset($_POST['edit_cust'])) {
    $id = $_POST['editCus_id'];
    $edit_c_name = $_POST['edit_c_name'];
    $edit_phone = $_POST['edit_phone'];
    $edit_address = $_POST['edit_address'];
    $edit_description = $_POST['edit_description'];
    // $rs=$con->query("UPDATE customers SET c_name='$edit_c_name' , phone = '$edit_phone', 
    //     address = '$edit_address', description = '$edit_description' WHERE id='$id'");

    $rs = $con->query("UPDATE `customers` SET `c_name`='$edit_c_name',`phone`='$edit_phone',
            `address`='$edit_address',`decription`='$edit_description' WHERE id='$id'");

    if ($rs) {
        $_SESSION['success'] = "Success Update Customer.";
        header("location: customers.php?success");
        exit();
    } else {
        $_SESSION['errmsg'] = "error";
        header("location: customers.php?error");
        exit();
    }
}




// Delete Customer
if (isset($_GET['delete_costumer'])) {
    $id = $_GET['delete_costumer'];
    $del = "DELETE FROM customers where id='$id'";
    if ($rs = mysqli_query($con, $del)) {
        $_SESSION['success'] = "Success Delete Customer.";
        header("location: ./customers.php?success");
        exit();
    } else {
        $_SESSION['errmsg'] = "error";
        header("location: ./customers.php");
        exit();
    }
}





// Reports 
if (isset($_POST['search'])) {
    $report_type = $_POST['report_type'];
    $_SESSION['from_data'] = $_POST['from_data'];
    $_SESSION['to_data'] = $_POST['to_data'];
    if(strtotime($_POST['from_data']) < strtotime($_POST['to_data'])){
        if ($report_type == "one") {
            header("location: products_report.php");
        } else if ($report_type == "two") {
            header("location: sales_report.php");
        } else if ($report_type == "three") {
            header("location: invoice_report.php");
        }else if ($report_type == "four") {
            header("location: profit_report.php");
        }
    }else{
        $_SESSION['errmsg']= "From Data is greater than TO Data. Please Change";
        header("location: reports.php?error");
    }
}

//    Change 


