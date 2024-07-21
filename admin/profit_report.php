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
    <title> Profit Reports </title>
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
            <div class="text">Profit Report</div>
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