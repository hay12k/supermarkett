<?php include "./controller/controller.php"; ?>
<?php
 if(isset($_SESSION['login']) && isset($_SESSION['id'])){

     
     if(isset($_POST['s_id'])){

        $s_id = $_POST['s_id'];
         
        // $sql = "SELECT * from sales WHERE id = $s_id";

        $sql = "SELECT s.id as id,cat.name as category_name,p.id as product_id,p.name as p_name,u.username AS username ,s.quantity as quantity, p.sales_price as sales_price, s.discount as discount, s.paid as paid, s.status as status, s.Resto as Resto, c.id as c_id,c.c_name as c_name FROM sales s INNER JOIN products p ON s.product_id=p.id INNER JOIN users u ON s.userID=u.id INNER JOIN customers c ON s.customer_name=c.id INNER JOIN category cat ON p.id=cat.id WHERE s.id = $s_id";

        $result = mysqli_query($con, $sql);

        $row = mysqli_fetch_array($result);

        echo json_encode($row);
    }

 }

?>