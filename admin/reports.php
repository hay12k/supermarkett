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
    <title> Reports </title>
</head>

<style>
select {
    /* background: #dddddd70 !important; */
    margin-bottom: 15px !important;
    width: 94% !important;
}

.reports {
    display: none;
}

.search {
    width: 93%;
    border: none;
    outline: none;
    border-radius: 7px;
    padding: 10px 0px;
    border: 1px solid #DDD;
}
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
            <div class="text">Reports</div>
        </div>


        <div class="details" style="display: flex !important;">
            <div class="recentOrders" style="flex-basis: 100% !important">
                <div class="row">
                    <div class="col-12">
                        <?php  
                            if(isset($_GET['error'])){?>
                             <h1 class="error"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></h1>
                        <?php } ?>
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-4" style="margin-bottom: 13px;">
                                    <div class="form-group">
                                        <label for="">Report</label>
                                        <select name="report_type" id="report" class="form-select"
                                            aria-label=".form-select-lg example" required>
                                            <option value=""> -- Select One -- </option>
                                            <option value="one"> Products Report </option>
                                            <option value="two"> Sales Report </option>
                                            <option value="three"> Invoices Report </option>
                                            <option value="four"> Profit Report </option>
                                            <option value="five"> Loss Report </option>
                                            <!-- <option value="4"> Users </option> -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4" style="margin-bottom: 13px;">
                                    <div class="form-group">
                                        <label for="">From</label>
                                        <input type="date" name="from_data" class="form-control"
                                            placeholder="Enter Product Expire" required>
                                    </div>
                                </div>
                                <div class="col-4" style="margin-bottom: 13px;">
                                    <div class="form-group">
                                        <label for="">To</label>
                                        <input type="date" name="to_data" class="form-control"
                                            placeholder="Enter Product Expire" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="search" class="btn btn-primary btn-lg">Filter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php }else{
     header("location: ./authantication/login.php");
     exit();
}?>