<?php
include('database.php');






?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <?php include('include/head.php'); ?>
</head>

<body>

    <?php include('include/nav.php'); ?>

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Contact</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Contact Start -->
    <div class="contact">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="contact-form">
                        <form action="mail_handler.php" method="post" name="form" class="form-box">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name" />
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email" />
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" placeholder="Subject" />
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="msg" placeholder="Message"></textarea>
                            </div>
                            <div><button class="btn" name="submit" type="submit">Send Message</button></div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info">
                        <?php
                        $sql = "select * from contact_us";
                        $res = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($res); ?>
                        <h3><?php echo $row['contact_title']; ?></h3>


                        <p>
                            <?php echo $row['contact_details']; ?>
                            <!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus. -->
                        </p>
                        <h4><i class="fa fa-map-marker"></i><?php echo $row['contact_address']; ?></h4>
                        <h4><i class="fa fa-envelope"></i><?php echo $row['contact_email']; ?></h4>
                        <h4><i class="fa fa-phone"></i><?php echo $row['phone_number']; ?></h4>
                        <div class="social">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Footer Start -->

    <?php include('include/footer.php'); ?>

    <!-- Footer Start -->




    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>






</body>

</html>