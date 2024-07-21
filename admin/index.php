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
    <title>Dashboard</title>


</head>

<body>
    <nav class="sidebar">
        <?php include "./include/sidebar.php"; ?>
    </nav>
    <div class="main">
        <div class="topbar">
            <?php include "./include/header.php"; ?>
        </div>
        <div class="title-main">
            <div class="text">Dashboard</div>
        </div>
        <div class="cardBox">

            <div class="card">
                <div>
                    <?php
                        $result = mysqli_query($con, "select * from category");
                        if($row =mysqli_num_rows($result)){
                            echo '<div class="numbers">'.$row.'</div>';
                        }else{
                            echo '<div class="numbers">No Data</div>';
                        }
                    ?>
                    <div class="cardName">Total Category</div>
                </div>
                <div class="iconBox">
                    <i class='bx bxs-category-alt'></i>
                </div>
            </div>
            <div class="card">
                <div>

                    <?php
                        $result = mysqli_query($con, "select * from products");
                        if($row =mysqli_num_rows($result)){
                            echo '<div class="numbers">'.$row.'</div>';
                        }else{
                            echo '<div class="numbers">No Data</div>';
                        }
                    ?>

                    <div class="cardName">Products</div>
                </div>
                <div class="iconBox">
                    <i class='bx bxs-spreadsheet'></i>
                </div>
            </div>
            <div class="card">
                <div>

                    <?php
                        $result = mysqli_query($con, "select * from sales where status !=1");
                        if($row =mysqli_num_rows($result)){
                            echo '<div class="numbers">'.$row.'</div>';
                        }else{
                            echo '<div class="numbers">No Data</div>';
                        }
                    ?>

                    <div class="cardName">Total Invoice</div>
                </div>
                <div class="iconBox">
                    <i class='bx bx-receipt'></i>
                </div>
            </div>
            <div class="card">
                <div>
                    <?php
                        $result = $con->query("select * from customers");
                        if($row =mysqli_num_rows($result)){
                            echo '<div class="numbers">'.$row.'</div>';
                        }else{
                            echo '<div class="numbers">No Data</div>';
                        }
                    ?>
                    <div class="cardName">Total Customers</div>
                </div>
                <div class="iconBox">
                    <i class='bx bxs-group'></i>
                </div>
            </div>

            <div class="card">
                <div>
                    <?php
                    $result = $con->query("SELECT * FROM products WHERE TO_DAYS(NOW()) - TO_DAYS(ExpirDate) > 0 ");
                    if ($stmt =mysqli_num_rows($result)){
                        echo '<div class="numbers">'.$stmt.'</div>';
                        } else {
                            echo '<div class="numbers">No Data</div>';
                        }
                       
                        
                    ?>
                    <div class="cardName">Product Expiration</div>
                </div>
                <div class="iconBox">
                    <i class='bx bxs-spreadsheet'></i>
                </div>
            </div>
            <?php if($_SESSION['role'] == "admin"){?>
            <div class="card">
                <div>
                    <?php
                        $result = mysqli_query($con, "select sum(Resto) as Resto from sales where status != 1");
                        if($row =mysqli_num_rows($result)){
                            $total=[
                                'total' =>0,
                                'Resto' =>0,
                            ];
                            foreach($result as $index => $unit){
                                $total=[
                                    'Resto'=> $total['Resto'] + $unit['Resto'],
                                ];
                                $to= $total['Resto'];
                                function format_number($to){
                                    if($to > 1000000000000)
                                        return round(($to/1000000000000),2).'T';
                                    if($to > 1000000000)
                                        return round(($to/1000000000),2).'B';
                                    if($to > 1000000)
                                        return round(($to/1000000),2).'M';
                                    if($to > 1000)
                                        return round(($to/1000),2).'K';
                                    return number_format($to);
                                }
                            }
                            echo '<div class="numbers">$'.format_number($to).'</div>';
                        }else{
                            echo '<div class="numbers">No Data</div>';
                        }
                    ?>
                    <div class="cardName">Total Money Invoice</div>
                </div>
                <div class="iconBox">
                    <i class='bx bx-receipt'></i>
                </div>
            </div>

            <div class="card">
                <div>
                    <?php
                        $result = mysqli_query($con, "SELECT SUM(s.paid) as paid FROM sales s JOIN products p ON s.product_id=p.id");
                    
                        if($row =mysqli_num_rows($result)){
                            $total=[
                                'total' =>0,
                                'paid' =>0,
                            ];
                            foreach($result as $index => $unit){
                                $total=[
                                    'paid'=> $total['paid'] + $unit['paid'],
                                ];
                                $to=$total['paid'];
                            echo '<div class="numbers">$'.format_number($to) .'</div>';
                            }
                        }else{
                            echo '<div class="numbers">No Data</div>';
                        }
                    ?>
                    <div class="cardName">Income</div>
                </div>
                <div class="iconBox">
                    <i class='bx bx-trending-up'></i>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Recent Invoice</h2>
                    <a href="./invoice.php" class="btn"> View All</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>UserName</td>
                            <td>Price</td>
                            <td>Paid</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $result = $con->query("SELECT s.id as id, p.name as product_id,u.username AS username ,s.quantity as quantity, p.sales_price as sales_price, s.discount as discount, s.paid as paid, s.status as status, s.Resto as Resto, c.c_name FROM sales s INNER JOIN products p ON s.product_id=p.id INNER JOIN users u ON s.userID=u.id INNER JOIN customers c ON s.customer_name=c.id WHERE s.status = 3 OR s.status = 2 limit 9");
                    while($row=mysqli_fetch_array($result)){?>
                        <tr>
                            <td><?php echo $row['product_id'] ;?></td>
                            <td><?php echo $row['username'] ;?></td>
                            <td><?php echo $row['sales_price'] ;?></td>
                            <td><?php echo $row['paid'] ;?></td>
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

                        </tr>
                        <?php 
                    } ?>

                    </tbody>
                </table>
            </div>
            <div class="recentCustomers">
                <div class="cardHeader">
                    <h2>Recent Customer</h2>
                </div>
                <table>
                    <tbody>
                        <?php
                        $result = $con->query("select * from customers limit 7");
                        while($row=mysqli_fetch_array($result)){?>
                        <tr>
                            <td width="60px">
                                <div class="imgBox"><img src="./assets/img/pro.png" alt=""></div>
                            </td>
                            <td>
                                <h4><?php echo $row['c_name'] ?><br><span><?php echo $row['address'] ?></span></h4>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



</body>

</html>
<?php }else{
    header("location: ./authantication/login.php");
    exit();
}