<?php
session_start();
include('../database.php');
$hf_id = $_GET['hf'];
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
            <div style="padding:20px; height:100%; margin-left:70px; margin-top:40px; border:1px solid black;">
              <div class="panel panel-primary">
                <div class="panel-heading text-center">
                  <?php
                  $query14 = "SELECT * FROM header_footer_policy where header_footer_policy.hf_id='$hf_id'";
                  $res14 = mysqli_query($con, $query14);
                  ?>
                  <?php while ($rows14 = mysqli_fetch_array($res14)) { ?>

                    <h1><?php echo $rows14['title_headline'] ?></h1><br>
                  <?php
                  }
                  ?>
                </div>
                <div class="panel-body">
                  <form action="header_footer_form_connect.php" method="post" enctype="multipart/form-data">


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

                    $query4 = "SELECT * FROM header_footer_policy where header_footer_policy.hf_id='$hf_id'";
                    $res4 = mysqli_query($con, $query4);
                    ?>
                    <?php while ($rows4 = mysqli_fetch_array($res4)) { ?>



                      <input type="hidden" name="hf_id" value="<?php echo $rows4['hf_id'] ?>" required>





                      <label for="description"><b>Content :</b></label>
                      <!-- <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script> -->
                      <script src="https://cdn.tiny.cloud/1/tiwwexx95p8jk38wqyantypmzurkd7prafgdo8pnqao58zve/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

                      <textarea type="text" class="form-control" id="news_info" style="font-size:120px !important;" name="description"> <?php echo $rows4['hf_description'] ?>
              </div>
              </textarea>
                      <script>
                        tinymce.init({
                          selector: 'textarea',
                          plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
                          toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
                          toolbar_mode: 'floating',
                          tinycomments_mode: 'embedded',
                          tinycomments_author: 'Author name',
                        });
                      </script><br>




                    <?php
                    }
                    ?>










                    <div class="text-center">
                      <input type="submit" name="submit" class="btn btn-primary" />
                    </div>
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
<?php
} else {
  header("location: admin_login.php");
}
?>