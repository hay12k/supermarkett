
<link rel="stylesheet" href="./assets/vendor/datatables/datatables/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="./assets/vendor/datatables/buttons/css/buttons.dataTables.min.css">


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
        <!-- <img src="../admin/assets/img/pro.jpeg" alt=""> -->
        <a href="./authantication/logout.php" class="btn btn-primary">logout</i>
</a>
    </div>
</div>
<!-- <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script> -->
<script src="./assets/vendor/jquery/js/jquery-3.5.1.js"></script>
<script src="./assets/vendor/datatables/datatables/js/jquery.dataTables.min.js"></script>
<script src="./assets/vendor/datatables/datatables/js/dataTables.bootstrap5.min.js"></script>

<script src="./assets/vendor/popper/js/popper.min.js" ></script>
<script src="./assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="./assets/vendor/datatables/buttons/js/dataTables.buttons.min.js"></script>
<script src="./assets/vendor/ajax/js/jszip.min.js"></script>
<script src="./assets/vendor/ajax/pdfmaker/js/pdfmake.min.js"></script>
<script src="./assets/vendor/ajax/pdfmaker/js/fonts.js"></script>
<script src="./assets/vendor/datatables/buttons/js/buttons.html5.min.js"></script>
<script src="./assets/vendor/datatables/buttons/js/buttons.print.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'print', 'pdf', 'excel'
        ]
    });
});
</script>

<script src="./assets/js/script.js"></script>



