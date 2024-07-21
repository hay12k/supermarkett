<?php include "connection.php";?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<!-- -----------CSS------------- -->
<link rel="stylesheet" href="./assets/css/style.css">
<!-- -----------BOXICONS------------- -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<i class='bx bx-menu toggle' onclick="toggleMenu();"></i>
<div class="search">
    <label>
        <input type="text" placeholder="Search Here">
        <i class='bx bx-search'></i>
    </label>
</div>
<div class="left">
    <div class="theme-Toggler">
        <span class="bx bx-sun icon sun active"></span>
        <span class="bx bx-moon icon moon"></span>
    </div>
    <div class="user">
        <img src="./assets/images/pro.jpeg" alt="">
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>

<script src="./assets/js/script.js"></script>