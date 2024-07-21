<?php include "./controller/controller.php"; ?>
<?php
 if(isset($_SESSION['login']) && isset($_SESSION['id'])){


    $c_id = $_POST['id'];

    $sql = "SELECT * from products WHERE category_id = $c_id AND quantity >= 1 AND ExpirDate > CURDATE()";

    $result = mysqli_query($con, $sql);

    $out = "<option value=''> -- Select One --  </option>";

    while($row = mysqli_fetch_assoc($result)){
        $out .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }

    echo $out;
 }
?>