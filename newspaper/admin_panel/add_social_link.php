<?php
session_start();
include('../database.php');

//check if session exists?
if (isset($_SESSION['login_user'])) {

?>


  <!DOCTYPE html>
  <html>

  <head>
    <?php
    include 'head.php';

    ?>

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
                  <h1>Social Media Link</h1><br>
                </div>
                <div class="panel-body">



                  <!-- <div class="form-group">
                <label for="specialist">Specialist</label>
                <input
                  type="text"
                  class="form-control"
                  id="specialist"
                  name="specialist"
                />
              </div> -->



                  <?php
                  $query4 = "select * from contact_logo";
                  $res4 = mysqli_query($con, $query4);
                  ?>
                  <?php while ($rows4 = mysqli_fetch_array($res4)) { ?>
                    <form method="get" action="update_social_link.php">
                      <div class="row">
                        <input type="hidden" name="sid" value="<?php echo $rows4['contact_logo_id'] ?>" required>

                        <div class="col-md-3">
                          <label for="male"><b><?php echo $rows4['contact_title'] ?></b></label></div><br><br><br>
                        <div class="col-md-6">
                          <input type="url" name="social_url" size="50%" id="male" value="<?php echo $rows4['url']; ?>"><br><br>

                        </div>
                        <div class="col-md-3">
                          <a href="<?php echo $rows4['url']; ?>" class="btn btn-success" role="button" aria-pressed="true">Preview</a>

                          <button name="update" class="btn btn-primary">Update</button>

                        </div>
                      </div>


                    </form>
                  <?php
                  }
                  ?>


                  <div class="text-center">

                  </div>



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
<?php
} else {
  header("location: admin_login.php");
}
?>