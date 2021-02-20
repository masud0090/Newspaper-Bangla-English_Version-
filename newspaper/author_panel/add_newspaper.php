<?php
session_start();
include('../database.php');

//check if session exists?
if (isset($_SESSION['author'])) {
         
?>


  <!DOCTYPE html>
  <html>

  <head>
    <?php
    include 'head.php';

    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
      $(document).ready(function() {
        $('#category').on('change', function() {
          var categoryID = $(this).val();
          if (categoryID) {
            $.ajax({
              type: 'POST',
              url: 'ajaxData.php',
              data: 'categories_id=' + categoryID,
              success: function(html) {
                $('#sub_category').html(html);

              }
            });
          } else {
            $('#sub_category').html('<option value="0">Select Category first</option>');

          }
        });


      });
    </script>
   <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
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
                  <h1>Add News Details</h1>
                </div>
                <div class="panel-body">
                  <form action="add_newspaper_connect.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="picture">ADD PICTURE</label>
                      <input type="file" class="form-control" id="picture" name="picture" />
                    </div>
                    <div class="form-group">
                      <label for="name">ADD Headline</label>
                      <input type="text" class="form-control" id="name" name="name" />
                    </div>
                    <div class="form-group">
                      <label for="name">ADD Headline (Bangla)</label>
                      <input type="text" class="form-control" id="bname" name="bname" />
                    </div>

                    <!-- <div class="form-group">
                <label for="specialist">Specialist</label>
                <input
                  type="text"
                  class="form-control"
                  id="specialist"
                  name="specialist"
                />
              </div> -->
              <div class="form-group">
                    <label for="name1">Add Newsdetails</label>
                    <textarea name="news_info" id="editor">
                  <p></p>
                        </textarea>
                      <br> 
                    
                    </div>
                  


                    <div class="form-group">
                    <label for="name2">Add Newsdetails (Bangla)</label>
                    <textarea name="bnews" id="editor2">
                  
                        </textarea>
                      <br> 
                    
                    </div>


                <div class="form-group">
                  <label for="name">ENTER CATEGORIES</label>
                  <?php
                  $query3 = "select * from categories where status=1 ";
                  $res3 = mysqli_query($con, $query3);
                  ?>

                  <!-- category dropdown -->
                  <select id="category" class="form-control" name="categories_id" required>
                    <option value="">Select Category</option>
                    <?php
                    if ($res3->num_rows > 0) {
                      while ($row3 = $res3->fetch_assoc()) {
                        echo '<option value="' . $row3['categories_id'] . '">' . $row3['categories_name'] . '</option>';
                      }
                    } else {
                      echo '<option value="0">Category not available</option>';
                    }
                    ?>
                  </select>
                </div><br>
                <select id="sub_category" name="sub" class="form-control" height="15px">
                  <div class="form-group">

                    <label for="name">ENTER SUB Category</label>
                    <!-- State dropdown -->

                    <option value="">Select Category first</option>
                </select>
              </div><br>













              <div class="form-group">
                <label for="date">NEWSDATE</label>
                <input type="date" class="form-control" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" />
              </div>


              <div class="form-group">

                <!-- <div id="wrapper">
                    <label for="yes_no_radio">DO YOU WANT TO ADD FEATURED?</label>
                    <p>
                      <input type="radio" name="yes_no" value="1"> Yes</input>
                    </p>
                    <p>
                      <input type="radio" name="yes_no" value="0" checked> No</input>
                    </p>



                  </div><br> -->

                <!-- <div class="form-group">
                    <label for="date">FEATURED DATE</label>
                    <input type="date" class="form-control" id="fdate" name="fdate" value="<?php echo date('Y-m-d'); ?>" />
                  </div> -->









                <input type="submit" name="submit" value="Submit" class="btn btn-primary" />
                <input type="submit" name="drafts" value="Drafts" class="btn btn-primary" />
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






    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
     <script>
        ClassicEditor
            .create( document.querySelector( '#editor2' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

    <!-- <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      crossorigin="anonymous"
    ></script> -->
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