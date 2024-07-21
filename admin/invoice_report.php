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
    <title> Invoice Reports </title>
</head>

</style>

<body>
    <nav class="sidebar">
        <?php include "./include/sidebar.php"; ?>
    </nav>
    <div class="main">
        <div class="topbar">
            <?php include "./include/header.php"; ?>
        </div>
        <div class="title-main">
            <div class="text">Invoice Report</div>
        </div>
        

        
            <div class="recentOrders aral" style="flex-basis: 100% !important">

            
            <table id="example" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <td>NO</td>
                            <td>Products Name</td>
                            <td>UserName</td>
                            <td>Customer Name</td>
                            <td>Quantity</td>
                            <td>Sales Price</td>
                            <td>Discount</td>
                            <td>Paid</td>
                            <td>Resto</td>
                            <td>Creation Data</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $from_data= $_SESSION['from_data'];
                        $to_data= $_SESSION['to_data'];
                        $result = $con->query("SELECT s.id as id,p.name as p_name,u.username AS username ,s.quantity as quantity, 
                        p.sales_price as sales_price, s.discount as discount, s.paid as paid, s.status as status, s.Resto as Resto, 
                        c.c_name, s.CreationData FROM sales s INNER JOIN products p ON s.product_id=p.id INNER 
                        JOIN users u ON s.userID=u.id INNER JOIN customers c ON s.customer_name=c.id WHERE s.CreationData 
                        BETWEEN ' $from_data' AND ' $to_data' AND s.status != 1");
                            while($row=mysqli_fetch_array($result)){ ?>
                            <tr>
                                <td><?php echo $row['id'] ;?></td>
                                <td><?php echo $row['p_name'] ;?></td>
                                <td><?php echo $row['username'] ;?></td>
                                <td><?php echo $row['c_name'] ;?></td>
                                <td><?php echo $row['quantity'] ;?></td>
                                <td>$<?php echo $row['sales_price'] ;?></td>
                                <td>$<?php echo $row['discount'] ;?></td>
                                <td>$<?php echo $row['paid'] ;?></td>
                                <td>$<?php echo $row['Resto'] ;?></td>
                                <td><?php echo $row['CreationData'] ;?></td>
                            </tr> 
                            <?php 
                            } 
                        ?>
                    </tbody>
                </table>



            </div>
    </div>



</body>

</html>
<?php }else{
    header("location: ./authantication/login.php");
    exit();
}