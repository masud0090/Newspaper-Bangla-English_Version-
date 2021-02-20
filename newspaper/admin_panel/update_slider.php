<?php

session_start();
include('../database.php');
$did = $_GET['tid'];
$sql = "select * from categories where categories.categories_id='$did '";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);

//check if session exists?
//   if (isset($_SESSION['login_user'])) {

?>

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
        <div class="container">
          <div style="padding:20px; margin-left:70px; margin-top:40px; border:1px solid black;">
            <div class="panel panel-primary">
              <div class="panel-heading text-center">
                <h1>Add SLIDER NEWS</h1>
              </div>
              <div class="panel-body">
                <form action="update_slider_connect.php" method="post">
                  <div class="form-group">

                    <!--  -->
                    <input type="hidden" name="news_id" value="<?php echo $row['categories_id']; ?>">
                    <label for="exampleFormControlSelect2"> Headlin:</label>
                    <lebel><?php echo $row['news_headline']; ?></lebel><br>
                    <!-- <label for="exampleFormControlSelect2"> Course Schedule:</label> -->


                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect2">Enter Schedule </label>
                    <select class="form-control" id="exampleFormControlSelect2" name="categories_id2" required>
                      <?php
                      $query1 = "select * from news_details where news_details.featured=0 ";
                      $res2 = mysqli_query($con, $query1);
                      ?>
                      <?php while ($rows3 = mysqli_fetch_array($res2)) {
                      ?>
                        <option value="<?php echo $rows3['categories_id']; ?>"> <?php echo $rows3['categories_name']; ?></option>


                      <?php
                      }
                      ?>
                    </select>
                  </div>






                  <input type="submit" name="submit" value="Update" class="btn btn-primary" />



                </form>



              </div>



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
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>
<!-- <?php

      //   else{
      //     header("location: admin_login.php");

      //   }
      ?> -->