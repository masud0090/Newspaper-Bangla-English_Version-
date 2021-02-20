<?php include('../database.php'); ?>
<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="row">
  <div class="col-xl-3 col-md-6">
    <?php
    $query11 = "select u.user_id, n.news_id , COUNT(n.news_id) count_name FROM news_details n, user u where  n.status='pending'";
    $res11 = mysqli_query($con, $query11);
    $rows11 = mysqli_fetch_assoc($res11);
    ?>
    <div class="card bg-primary text-white mb-4">
      <span>
        <h4 class="count" style="text-align: center; font-size:50px"><?php echo "(" . $rows11['count_name'] . ")"; ?></h4>
      </span> <br>
      <p class="count" style="text-align: center; font-size:20px"> Pending News</p>
      <div class="card-footer d-flex align-items-center justify-content-between">
        <!-- <a class="small text-white stretched-link" href="#">View Details</a>
        <div class="small text-white">
          <i class="fas fa-angle-right"></i>
        </div> -->
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <?php
    $query12 = "select c.categories_id, COUNT(c.categories_id) count_name FROM categories c  ";
    $res12 = mysqli_query($con, $query12);
    $rows13 = mysqli_fetch_assoc($res12);
    ?>
    <div class="card bg-warning text-white mb-4">
      <span>
        <h4 class="count" style="text-align: center; font-size:50px"><?php echo "(" . $rows13['count_name'] . ")"; ?></h4>
      </span> <br>
      <p class="count" style="text-align: center; font-size:20px"> Total Categories</p>
      <div class="card-footer d-flex align-items-center justify-content-between">
        <!-- <a class="small text-white stretched-link" href="#">View Details</a>
        <div class="small text-white">
          <i class="fas fa-angle-right"></i>
        </div> -->
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <?php
    $query12 = "select u.user_id, COUNT(u.user_id) count_name FROM user u where u.status= 'Active' ";
    $res12 = mysqli_query($con, $query12);
    $rows13 = mysqli_fetch_assoc($res12);
    ?>
    <div class="card bg-success text-white mb-4">
      <span>
        <h4 class="count" style="text-align: center; font-size:50px"><?php echo "(" . $rows13['count_name'] . ")"; ?></h4>
      </span> <br>
      <p class="count" style="text-align: center; font-size:20px"> Total Author</p>
      <div class="card-footer d-flex align-items-center justify-content-between">
        <!-- <a class="small text-white stretched-link" href="#">View Details</a>
        <div class="small text-white">
          <i class="fas fa-angle-right"></i>
        </div> -->
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <?php
    $query12 = "select n.news_id, COUNT(n.news_id) count_name FROM news_details n where n.slider=1 ";
    $res12 = mysqli_query($con, $query12);
    $rows13 = mysqli_fetch_assoc($res12);
    ?>

    <div class="card bg-danger text-white mb-4">

      <span>
        <h4 class="count" style="text-align: center; font-size:50px"><?php echo "(" . $rows13['count_name'] . ")"; ?></h4>
      </span> <br>
      <p class="count" style="text-align: center; font-size:20px"> Total Slider</p>
      <div class="card-footer d-flex align-items-center justify-content-between">
        <!-- <a class="small text-white stretched-link" href="#">View Details</a> -->
        <!-- <div class="small text-white">
          <i class="fas fa-angle-right"></i>
        </div> -->
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xl-6">

  </div>

</div>
<div class="card mb-4">
  <div class="card-header">
    <i class="fas fa-table mr-1"></i>
    RECENT NEWS
  </div>
  <div class="card-body">


    <?php
    $sql4 = "select news_details.categories_id, news_details.news_id,news_details.news_headline,news_details.date, categories.categories_name from news_details , categories where news_details.categories_id=categories.categories_id and news_details.status='Published' order by date DESC limit 20";
    $res2 = mysqli_query($con, $sql4); ?>
    <?php $serial = 1; ?>

    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Serial</th>
            <th>News Title</th>
            <th>Categories</th>
            <th>Published Date</th>

          </tr>
        </thead>

        <tbody>
          <?php
          while ($home_rows12 = mysqli_fetch_assoc($res2)) { ?>
            <tr>

              <td><?php echo $serial++; ?></td>
              <td><?php echo $home_rows12['news_headline']; ?></td>
              <td><?php echo $home_rows12['categories_name']; ?></td>
              <td><?php echo $home_rows12['date']; ?></td>


            </tr>
          <?php
          }
          ?>






        </tbody>
      </table>
    </div>
  </div>
</div>