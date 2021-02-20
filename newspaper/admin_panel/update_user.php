<?php

include('../database.php');
// if (isset($_GET['id'])) {
$id = $_GET['tid'];
$sql = "select * FROM user WHERE user.user_id='$id'";

$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);
session_start();

//check if session exists?
if (isset($_SESSION['login_user'])) {

    //}
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
                    <!-- <div class="container"> -->
                    <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-8">
                            <div class="content" style="background-color: #f7f7f7;">

                                <div class="center" style="width: 90%; align-items:center; padding:10px;margin:20px ;">
                                    <center style="font-size:30px">Add User</center>
                                    <hr>
                                    <form action="update_user_connect.php" method="post" id="loginform">
                                        <input type="hidden" name="user_id" value="<?php echo $id; ?>" required>
                                        <h6>Username <span class="rf">*</span></h6>
                                        <input name="username" id="userNameTextBox" class="form-control" placeholder="Username" type="text" value="<?php echo $row["username"] ?>">
                                        <span id="userNamSpan"></span>
                                        <br>
                                        <h6>Email <span class="rf">*</span></h6>
                                        <input name="email" id="emailNameTextBox" class="form-control" placeholder="Email" type="email" value="<?php echo $row["email"] ?>">
                                        <span id="emailNamSpan"></span>
                                        <br>
                                        <h6>Password <span class="rf">*</span></h6>
                                        <input id="passwordTextBox" name="password" class="form-control" placeholder="Password" type="password" value="<?php echo $row["password"] ?>">
                                        <td><span id="passwordSpan"></span></td>
                                        <br>
                                        <h6>Role <span class="rf">*</span></h6>
                                        <select id="roleTextBox" name="role" class="form-control" placeholder="" type="author">

                                            <option value="Author"><?php echo $row["type"] ?></option>

                                        </select>
                                        <br>
                                        <h6>Status <span class="rf">*</span></h6>
                                        <select id="statusTextBox" name="status" class="form-control" placeholder="" type="status">
                                            <option value="<?php echo $row["status"] ?>"><?php echo $row["status"] ?></option>
                                            <?php
                                            $u_status = $row['status'];
                                            if ($u_status == 'Active') {

                                            ?>
                                                <option value="Banned">Ban</option>
                                                <br>

                                            <?php
                                            } else {
                                            ?>
                                                <option value="Active">Active</option>
                                            <?php

                                            }

                                            ?>



                                        </select>
                                        <br>
                                        <input class="btn btn-success" data-toggle="tooltip" data-placement="bottom" id="submitButton" title="" value="Add User" name="update" type="submit">
                                        <span id="messageSpan"></span>




                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                        </div>
                    </div>
                    <!-- </div> -->
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