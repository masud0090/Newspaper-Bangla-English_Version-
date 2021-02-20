<?php

include('../database.php');
// include("database_connection.php");

$query = "select * from news_details where news_details.slider=1";

// $query = "select * from news_details";
$res = mysqli_query($con, $query);
$arr_users = [];
//php object
if ($res->num_rows > 0) {
  $arr_users = $res->fetch_all(MYSQLI_ASSOC);
}

//$result = mysql_query($query);

session_start();

//check if session exists?
if (isset($_SESSION['login_user'])) {
  //           

?>
  <!DOCTYPE html>
  <html>

  <head>
    <?php
    include 'head.php';
    ?>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
    <!-- <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->

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



          <div style="margin:5%;">
            <table id="userTable" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th> SERIAL </th>

                  <th> NEWS HEADLINE </th>
                  <th>CHANGES</th>

                </tr>
              </thead>
              <tbody>

                <?php
                $serial = 1; ?>

                <?php if (!empty($arr_users)) { ?>
                  <?php foreach ($arr_users as $user) {
                  ?>
                    <tr>
                      <td><?php echo $serial++; ?></td>


                      <td><?php echo $user['news_headline']; ?> </td>
                      <!-- <td></td> -->
                      <!--  -->
                      <?php
                      if (count($arr_users) != 1) {
                      ?> <td><a class="btn btn-danger" href="update_slider_connect.php?tid=<?php echo $user['news_id']; ?>"> Remove</a></td>
                      <?php
                      } else {
                      ?> <td><a href="#" class="btn btn-secondary" disabled="true"> Can't Remove</a></td>
                      <?php
                      }
                      ?>

                    </tr>


                  <?php
                  }
                  ?>







                <?php
                }
                ?>





              </tbody>

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


    <script>
      function confirmation(delid) {
        if (confirm("Do you want to delete?")) {
          window.location.href = 'delete_newspaper.php?tid=' + delid + '';
          return true;
        }



      }
    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="admin_page/dist/assets/demo/chart-area-demo.js"></script>
    <script src="admin_page/dist/assets/demo/chart-bar-demo.js"></script> -->
    <!-- <script
      src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"
      crossorigin="anonymous"
    ></script> -->
    <script src="admin_page/dist/assets/demo/datatables-demo.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#userTable').DataTable();
      });
    </script>
  </body>

  </html>

<?php
} else {
  header("location: admin_login.php");
}
?>