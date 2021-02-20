<?php

include('../database.php');

$query = "select DISTINCT categories.categories_id,categories_name from categories where categories.featured=1";



// $query = "select DISTINCT course.title,course.id course_id from course,schedule,course_schedule where course.id=course_schedule.course_id and schedule.id=course_schedule.schedule_id" ;
$res = mysqli_query($con, $query);
//$result = mysql_query($query);
session_start();

//check if session exists?
if (isset($_SESSION['author'])) {

?>
  <!DOCTYPE html>
  <html>

  <head>
    <?php
    include 'head.php';
    ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
          <div>
            <table class="table table-bordered">
              <tr>
                <th colspan="6">
                  <h2 style="text-align: center;">Featured Categories</h2>
                </th>
              </tr>
              <th> Serial </th>
              <th> featured </th>
              <!-- <th> Schedule </th> -->
              <!-- <th> Specialist</th>
        <th> Action</th> -->



              </tr>

              <?php
              $serial = 1;
              while ($rows = mysqli_fetch_array($res)) {
              ?>
                <tr>
                  <td><?php echo $serial++; ?></td>


                  <td><?php echo $rows['categories_name']; ?></td>





                  <td><a href="update_feature_categories.php?tid=<?php echo $rows['categories_id']; ?>"> Change</a>
                  </td>

                </tr>
              <?php



              }
              ?>











            </table>
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

<?php
} else {
  header("location: user_login.php");
}
?>