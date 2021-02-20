<?php
include('../database.php');


?>
<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
  <div class="sb-sidenav-menu">
    <div class="nav">
      <div class="sb-sidenav-menu-heading">Core</div>
      <a class="nav-link" href="index.php">
        <div class="sb-nav-link-icon">
          <i class="fas fa-tachometer-alt"></i>
        </div>
        Dashboard
      </a>
      <div class="sb-sidenav-menu-heading">Interface</div>

      <a class="nav-link " href="add_newspaper.php">
        <div class="sb-nav-link-icon">
          <i class="fas fa-book-open"></i>
        </div>
        Add News
        <div class="sb-sidenav-collapse-arrow">
          <!-- <i class="fas fa-angle-down"></i> -->
        </div>
      </a>

      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
        <div class="sb-nav-link-icon">
          <i class="fas fa-book-open"></i>
        </div>
        News
        <div class="sb-sidenav-collapse-arrow">
          <i class="fas fa-angle-down"></i>
        </div>
      </a>




      <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
            <a class="nav-link" href="add_newspaper_display.php">All News</a>
            <!-- <a class="nav-link" href="add_newspaper.php">Add News</a> -->
            <a class="nav-link" href="approved_news_display.php">Show Approved News</a>
            <a class="nav-link" href="pending_news_display.php">Show Pending News</a>
            <a class="nav-link" href="drafts_display.php">Show Drafts</a>

          </a>
          <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
            <nav class="sb-sidenav-menu-nested nav">
              <a class="nav-link" href="login.html">Login</a>
              <a class="nav-link" href="register.html">Register</a>
              <a class="nav-link" href="password.html">Forgot Password</a>
            </nav>
          </div>




        </nav>
      </div>






























    </div>
  </div>
  <div class="sb-sidenav-footer">
    <?php
    if (isset($_SESSION['author'])) { ?>
      <div class="small"><?php echo "Logged as " . $_SESSION['author']; ?></div>
    <?php
    }
    ?>
  </div>
</nav>