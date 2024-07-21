<?php include "./controller/controller.php"; ?>
<?php
 if(isset($_SESSION['login']) && isset($_SESSION['id'])){

   //  $result = $con->query("SELECT s.id as id, p.name as prductname,s.name as name, s.quantity as quantity, 
   //  s.sales_price as sales_price, s.discount as discount, s.paid as paid, s.status as status  
   //  FROM sales s JOIN products p ON s.product_id=p.id");


    // $result = $con->query("SELECT s.id as id, p.name as prductname,s.name as name, s.quantity as quantity, 
    // s.sales_price as sales_price, s.discount as discount, s.paid as paid, s.status as status  
    // FROM sales s JOIN products p ON s.product_id=p.id");

   // foreach($result as $row) {
   //    echo $row;
   // }

    echo $result;
 }
?>