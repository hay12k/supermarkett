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
    <title> Products Reports </title>
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
            <div class="text">Products Report</div>
        </div>



        <div class="recentOrders aral" style="flex-basis: 100% !important">

            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <td>NO</td>
                        <td>Products Name</td>
                        <td>UserName</td>
                        <td>Quantity</td>
                        <td>Cost Price</td>
                        <td>Sales Price</td>
                        <td>Expiry Date</td>
                        <td>creation Data</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $from_data= $_SESSION['from_data'];
                        $to_data= $_SESSION['to_data'];
                        $result = $con->query("SELECT p.id,p.name as p_name,u.username as username,p.quantity,p.cost_price,p.sales_price,p.description,p.ExpirDate,p.CreationData FROM products p INNER JOIN users u ON p.userID=u.id WHERE p.CreationData BETWEEN '$from_data' AND '$to_data' ");
                            while($row=mysqli_fetch_array($result)){
                              ?>
                            <tr>
                                <td><?php echo $row['id'] ;?></td>
                                <td><?php echo $row['p_name'] ;?></td>                        
                                <td><?php echo $row['username'] ;?></td>
                                <td><?php echo $row['quantity'] ;?></td>
                                <td>$<?php echo $row['cost_price'] ;?></td>
                                <td>$<?php echo $row['sales_price'] ;?></td>
                                <td><?php echo $row['ExpirDate'] ;?></td>
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
}?>