<?php

include('../database.php');
session_start();

//check if session exists?
if (isset($_SESSION['login_user'])) {

?>


  <!DOCTYPE html>
  <html>

  <head>
    <?php
    include 'head.php';
    ?>

    <!-- <link rel="stylesheet" type="text/css" href="css/bootstraps.css" /> -->
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

            <div class="container ">
              <div style="padding:20px; margin-left:70px; margin-top:40px; border:1px solid black;">
                <div class="panel panel-primary">
                  <div class="panel-heading text-center">
                    <h1>Add Featured Categories</h1>
                  </div>
                  <div class="panel-body">
                    <form action="add_featured_connect.php" method="post" onSubmit="return checkduplicatecategories(this)">

                      <div class="form-group">
                        <label for="exampleFormControlSelect2">ENTER CATEGORIES*</label>
                        <select class="form-control" id="exampleFormControlSelect2" name="categories_id" required>
                          <?php
                          $query = "select * from categories  ";
                          $res = mysqli_query($con, $query);
                          ?>
                          <?php while ($rows = mysqli_fetch_array($res)) {
                          ?>
                            <option value="<?php echo $rows['categories_id']; ?>"> <?php echo $rows['categories_name']; ?></option>


                          <?php
                          }
                          ?>
                        </select><br>
                        <label for="exampleFormControlSelect2">ENTER CATEGORIES*</label>

                        <select class="form-control" id="exampleFormControlSelect2" name="categories_id2" required>
                          <?php
                          $query = "select * from categories  ";
                          $res = mysqli_query($con, $query);
                          ?>
                          <?php while ($rows = mysqli_fetch_array($res)) {
                          ?>
                            <option value="<?php echo $rows['categories_id']; ?>"> <?php echo $rows['categories_name']; ?></option>


                          <?php
                          }
                          ?>
                        </select><br>
                        <label for="exampleFormControlSelect2">ENTER CATEGORIES*</label>

                        <select class="form-control" id="exampleFormControlSelect2" name="categories_id3" required>
                          <?php
                          $query = "select * from categories  ";
                          $res = mysqli_query($con, $query);
                          ?>
                          <?php while ($rows = mysqli_fetch_array($res)) {
                          ?>
                            <option value="<?php echo $rows['categories_id']; ?>"> <?php echo $rows['categories_name']; ?></option>


                          <?php
                          }
                          ?>
                        </select><br>
                        <label for="exampleFormControlSelect2">ENTER CATEGORIES*</label>
                        <select class="form-control" id="exampleFormControlSelect2" name="categories_id4" required>
                          <?php
                          $query = "select * from categories  ";
                          $res = mysqli_query($con, $query);
                          ?>
                          <?php while ($rows = mysqli_fetch_array($res)) {
                          ?>
                            <option value="<?php echo $rows['categories_id']; ?>"> <?php echo $rows['categories_name']; ?></option>


                          <?php
                          }
                          ?>
                        </select>
                      </div>




                      <!-- <a class="btn btn-primary" href="#" role="button">submit</a> -->
                      <input type="submit" name="submit" onselect="myFunction()" class="btn btn-primary" />
                    </form>


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

    <!-- <script>
		function submit() {
		alert("");
		$stmt->close();
		$conn->close();
		}
		
		</script> -->











    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>


    <script>
      // Function to check Whether both passwords 
      // is same or not. 
      function checkduplicatecategories(form) {
        categories_id1 = form.categories_id1.value;
        categories_id2 = form.categories_id2.value;
        categories_id3 = form.categories_id3.value;
        categories_id4 = form.categories_id4.value;

        // If password not entered 
        if (categories_id1 == '')
          alert("duplicate categories name");

        // If confirm password not entered 
        else if (categories_id2 == '')
          alert("duplicate categories name");
        else if (categories_id3 == '')
          alert("duplicate categories name");
        else if (categories_id4 == '')
          alert("duplicate categories name");

        // If Not same return False.     
        else if (categories_id1 == categories_id2) {
          alert("\You choose  duplicate categories,please select different categories...")
          return false;
        } else if (categories_id1 == categories_id3) {
          alert("\You choose  duplicate categories,please select different categories...")
          return false;
        } else if (categories_id1 == categories_id4) {
          alert("\You choose  duplicate categories,please select different categories...")
          return false;
        } else if (categories_id2 == categories_id1) {
          alert("\You choose  duplicate categories,please select different categories...")
          return false;
        } else if (categories_id2 == categories_id3) {
          alert("\You choose  duplicate categories,please select different categories...")
          return false;
        } else if (categories_id2 == categories_id4) {
          alert("\You choose  duplicate categories,please select different categories...")
          return false;
        } else if (categories_id3 == categories_id1) {
          alert("\You choose  duplicate categories,please select different categories...")
          return false;
        } else if (categories_id3 == categories_id2) {
          alert("\You choose  duplicate categories,please select different categories...")
          return false;
        } else if (categories_id3 == categories_id4) {
          alert("\You choose  duplicate categories,please select different categories...")
          return false;
        } else if (categories_id4 == categories_id1) {
          alert("\You choose  duplicate categories,please select different categories...")
          return false;
        } else if (categories_id4 == categories_id2) {
          alert("\You choose  duplicate categories,please select different categories...")
          return false;
        } else if (categories_id4 == categories_id3) {
          alert("\You choose  duplicate categories,please select different categories...")
          return false;
        }

        // If same return True. 
        else {
          alert("Featured Successfully Sellected!")
          return true;
        }
      }
    </script>




  </body>

  </html>
<?php
} else {
  header("location: admin_login.php");
}
?>