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
            <a class="nav-link" href="add_newspaper.php">Add News</a>
            <a class="nav-link" href="add_newspaper_display.php">Show Author News</a>
            <a class="nav-link" href="my_news_display.php">My News</a>

          </a>
          <a class="nav-link" href="slider.php">Add Slider</a>
          <a class="nav-link" href="slider_display.php">Show Slider</a>
          <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
            <nav class="sb-sidenav-menu-nested nav">
              <a class="nav-link" href="login.html">Login</a>
              <a class="nav-link" href="register.html">Register</a>
              <a class="nav-link" href="password.html">Forgot Password</a>
            </nav>
          </div>


          <!-- <a
                    class="nav-link collapsed"
                    href="#"
                    data-toggle="collapse"
                    data-target="#pagesCollapseError"
                    aria-expanded="false"
                    aria-controls="pagesCollapseError"
                  > -->
          <!-- Error
                    <div class="sb-sidenav-collapse-arrow">
                      <i class="fas fa-angle-down"></i>
                    </div>
                  </a> -->
          <!-- <div
                    class="collapse"
                    id="pagesCollapseError"
                    aria-labelledby="headingOne"
                    data-parent="#sidenavAccordionPages"
                  >
                    <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="401.html">401 Page</a>
                      <a class="nav-link" href="404.html">404 Page</a>
                      <a class="nav-link" href="500.html">500 Page</a>
                    </nav>
                  </div> -->

        </nav>
      </div>

      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutss" aria-expanded="false" aria-controls="collapseLayoutss">
        <div class="sb-nav-link-icon">
          <i class="fas fa-columns"></i>
        </div>
        Categories
        <div class="sb-sidenav-collapse-arrow">
          <i class="fas fa-angle-down"></i>
        </div>
      </a>
      <div class="collapse" id="collapseLayoutss" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav">
          <a class="nav-link" href="add_categories.php">Add Categories</a>
          <a class="nav-link" href="show_categories_dispaly.php">Show Categories</a>
          <a class="nav-link" href="add_featured.php">Add Featured Categories</a>
          <a class="nav-link" href="featured_categories_display.php">Show Featured Categories</a>
        </nav>
      </div>





      <!--  -->


      <!--  -->

      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsss" aria-expanded="false" aria-controls="collapseLayoutsss">
        <div class="sb-nav-link-icon">
          <i class="fas fa-columns"></i>
        </div>
        Pages
        <div class="sb-sidenav-collapse-arrow">
          <i class="fas fa-angle-down"></i>
        </div>
      </a>

      <div class="collapse" id="collapseLayoutsss" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav">
          <?php
          $query5 = "SELECT * FROM header_footer_policy";
          $res5 = mysqli_query($con, $query5);

          while ($rows5 = mysqli_fetch_array($res5)) { ?>
            <a class="nav-link" href="header_footer_form.php?hf=<?php echo $rows5['hf_id'] ?>"><?php echo $rows5['hf_title'] ?></a>


          <?php
          }
          ?>
          <!-- <a class="nav-link" href="header_footer_form.php"
                    >Privacy</a
                  >
                  <a class="nav-link" href="header_footer_form.php"
                    >Terms</a
                  >
                  <a class="nav-link" href="header_footer_form.php"
                    >Cookies</a
                  >
                  
                  <a class="nav-link" href="header_footer_form.php"
                    >Accessibility help</a
                  >
                  <a class="nav-link" href="header_footer_form.php"
                    > Advertise with us</a
                  > -->
        </nav>
      </div>
      <div>

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagess" aria-expanded="false" aria-controls="collapsePagess">
          <div class="sb-nav-link-icon">
            <i class="fas fa-book-open"></i>
          </div>
          Users
          <div class="sb-sidenav-collapse-arrow">
            <i class="fas fa-angle-down"></i>
          </div>
        </a>
        <div class="collapse" id="collapsePagess" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
          <div class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
              <a class="nav-link" href="add_user.php">Add User</a>
              <a class="nav-link" href="add_user_display.php">Show Users</a>

            </a>
          </div>
        </div>


        <div>

          <a class="nav-link" href="add_social_link.php">
            <div class="sb-nav-link-icon">
              <i class="fas fa-tachometer-alt"></i>
            </div>
            Social Link
          </a>

        </div>



















      </div>

    </div>
  </div>
  <div class="sb-sidenav-footer">
    <?php
    if (isset($_SESSION['login_user'])) { ?>
      <div class="small"><?php echo "Logged as " . $_SESSION['login_user']; ?></div>
    <?php
    }
    ?>
  </div>
</nav>