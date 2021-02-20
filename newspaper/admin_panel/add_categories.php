
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'head.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css" /> -->
    


</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <?php
    include 'top_menu.php';
    ?>
    </nav>
    <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
          <?php
          include 'sidenav.php';
          ?>
      </div>
      <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid">
          <div style="margin-left:70px; margin-top:40px; border:1px solid black;">
             <div class="panel panel-primary" style="margin:100px;">
               <form action="add_categories_connect.php" method="POST">
                 <!-- <div class="form-group">
                  <div class="panel-heading text-center">
                  <h1>Add Categories</h1>
                  </div> -->
                  
                  <div class="panel-body">
                  <h4>ADD CATEGORIES</h4>
                  <input type="text" class="form-control" id="categories_name" name="categories_name" required>
                  </div><br>
                  <div class="panel-body">
                  <h4>ADD CATEGORIES(BANGLA)</h4>
                  <input type="text" class="form-control" id="bcategories_name" name="bcategories_name">
                  </div>
                  <button style="margin-top:10px;" type="submit" class="btn btn-primary">Submit</button>
                </form>
                 </div>
                </div>
                </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
          <div class="container-fluid">
              <?php
              include 'footer.php';
              ?>
          </div>
        </footer>
      </div>
    </div>
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="js/scripts.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script
      src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="assets/demo/datatables-demo.js"></script>
  </body>
</html>






