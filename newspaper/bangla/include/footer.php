<!-- Footer Start -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <?php
                    $sql = "select * from contact_us";
                    $res = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($res); ?>


                    <h3 class="title">Get in Touch</h3>
                    <div class="contact-info">
                        <p><i class="fa fa-map-marker"></i><?php echo $row['contact_address']; ?></p>
                        <p><i class="fa fa-envelope"></i><?php echo $row['contact_email']; ?></p>
                        <p><i class="fa fa-phone"></i><?php echo $row['phone_number']; ?></p>

                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h3 class="title">Useful Links</h3>
                    <?php
                    $sql3 = "select * from contact_logo where url !=''";
                    $res3 = mysqli_query($con, $sql3);
                    // $row3 = mysqli_fetch_assoc($res3);
                    ?>



                    <div class="social">
                        <?php
                        while ($row4 = mysqli_fetch_assoc($res3)) { ?>



                            <ul>
                                <li><a href="<?php echo $row4['url'] ?>"><i class="<?php echo $row4['contact_logo_icon'] ?>"></i>&nbsp;&nbsp;&nbsp <?php echo $row4['contact_title']; ?></a></li>
                            </ul>

                        <?php
                        }
                        ?>


                    </div>

                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h3 class="title">Quick Links</h3>
                    <ul>
                        <li><a href="#">Lorem ipsum</a></li>
                        <li><a href="#">Pellentesque</a></li>
                        <li><a href="#">Aenean vulputate</a></li>
                        <li><a href="#">Vestibulum sit amet</a></li>
                        <li><a href="#">Nam dignissim</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h3 class="title">Newsletter</h3>
                    <div class="newsletter">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed porta dui. Class aptent taciti sociosqu
                        </p>
                        <form>
                            <input class="form-control" type="email" placeholder="Your email here">
                            <button class="btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Footer Menu Start -->

<?php

$query = "SELECT * from header_footer_policy where header=0 ";
$res = mysqli_query($con, $query);

?>
<div class="footer-menu">
    <div class="container">
        <div class="f-menu">
            <?php
            while ($home_rows12 = mysqli_fetch_assoc($res)) { ?>
                <a href="policy.php?hf=<?php echo $home_rows12['hf_id']; ?>"><?php echo $home_rows12['hf_title']; ?></a>
            <?php
            }
            ?>

            <a href="contact.php" class="">Contact Us</a>
        </div>
    </div>
</div>
<!-- Footer Menu End -->

<!-- Footer Bottom Start -->
<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6 copyright">
                <p>Copyright &copy; <a href="https://skillhutch.com">SkillHutch</a>. All Rights Reserved</p>
            </div>

            <div class="col-md-6 template-by">
                <p>Developed By <a href="https://skillhutch.com">SkillHutch</a></p>
            </div>
        </div>
    </div>
</div>
<!-- Footer Bottom End -->

<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>