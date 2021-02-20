<?php

include('../database.php');
// include("database_connection.php");

$query = "select DISTINCT news_details.news_id,news_details.news_headline,news_details.news_headline_ban, news_details.news_picture,news_details.date,news_details.status, user.username,categories.categories_id,categories.categories_name from news_details, categories , user where news_details.categories_id=categories.categories_id and news_details.user_id=user.user_id and news_details.status !='drafts'";

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



          <div style="margin:2%;">
            <table id="userTable" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th> Serial</th>
                  <th> Picture</th>
                  <th> News Headline </th>
                  <th> Bangla Headline </th>
                  <th>Categories</th>
                  <th>News Date</th>
                  <th>Status</th>
                  <th>Author</th>
                  <th>Action</th>
                  <th>Edit</th>
                  <th>Delete</th>

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

                      <td><img src="../img/<?php echo $user['news_picture']; ?>" width="50px" height="50px"></td>
                      <td><?php echo $user['news_headline']; ?> </td>
                      <td><?php echo $user['news_headline_ban']; ?> </td>
                      <!-- <td><?php echo substr($user['news_headline'], 0, 50); ?> </td> -->
                      <td><?php echo $user['categories_name']; ?></td>
                      <td><?php echo $user['date']; ?></td>
                      <td><?php echo $user['status']; ?></td>
                      <td><?php echo $user['username']; ?></td>
                      <td>

                        <?php
                        $u_status = $user['status'];
                        if ($u_status == 'published') {

                        ?>
                          <form>

                            <button type="button" class="btn btn-success btn-sm" disabled>Published</button>
                          </form>
                          <br>

                        <?php
                        } else {
                        ?>
                          <a class="btn btn-success btn-sm" href="publish_news.php?tid=<?php echo $user['news_id']; ?>"> Publish</a>
                        <?php

                        }

                        ?>




                      </td>

                      <td class="text-center">






                        <a class="btn btn-dark btn-sm" href="update_newspaper.php?tid=<?php echo $user['news_id']; ?>"> Edit</a><br></td>

                        <td class="text-center"> <a class="btn btn-danger btn-sm" href="#" onclick="confirmation(<?php echo $user['news_id']; ?>)"> Delete</a>





                      </td>







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