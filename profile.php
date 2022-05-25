<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>

<?php
//Checking if the login cookie is set
// if (!isset($_COOKIE["email"])) {
//     header("Location: ./");
// } else
//     $email = $_COOKIE['email'];

// $query = "SELECT * FROM admins WHERE email= '{$email}' ";
// $select_admin_query = mysqli_query($connection, $query);

// while ($row = mysqli_fetch_array($select_admin_query)) {
//     $user_firstname = $row['user_firstname'];
//     $user_lastname = $row['user_lastname'];
//     $password = $row['password'];
// }
?>

<!-- Query For updating information of an existing admin -->
<?php
if (isset($_POST['update_admin'])) {
    $email = $_COOKIE['email'];
    $new_password = $_POST['password'];

    if ($new_password != $password) {
        $hash = "$2a$10$";
        $string = "iamacomputersciencestudent";
        $hashString = $hash . $string;
        $new_password = crypt($new_password, $hashString);
        $new_password = md5($email . $new_password);

        $query = "UPDATE admins SET ";
        $query .= "password = '{$new_password}' ";
        $query .= "WHERE email = '{$email}' ";

        $update_admin_query = mysqli_query($connection, $query);

        header("Location: profile.php");

        if (!$update_admin_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
    } else {
        header("Location: profile.php");
    }
}
?>


<!--start wrapper-->
<div class="wrapper">
    <!--start top header-->
    <?php include "includes/admin_navigation.php" ?>

    <!--start content-->
    <main class="page-content">

        <div class="profile-cover bg-dark"></div>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="mb-0">My Account</h5>
                        <hr>
                        <div class="card shadow-none border">
                            <div class="card-header">
                                <h6 class="mb-0">ADMIN INFORMATION</h6>
                            </div>
                            <div class="card-body">

                                <form class="row g-3" method="post" enctype="multipart/form-data">
                                    <div class="col-6">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" value="<?php echo $user_firstname; ?>" disabled>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control" value="<?php echo $user_lastname; ?>" disabled>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Password</label>
                                        <div class="input-group mb-3">
                                            <input type="password" id="myInput" name="password" class="form-control" value="<?php echo $password;?>">
                                            <span class="input-group-text" id="basic-addon1"><i id="hide-pass-icon" class="lni lni-eye" style="color: black;" onclick="showPassword()"></i></span>

                                        </div>
                                    </div>
                                    <div class="text-start">
                                        <button id="save-changes-btn" type="submit" class="btn btn-primary px-4" name="update_admin" onclick="changeText()">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--end page main-->


    <!--start overlay-->
    <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->

    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->


    <!-- Show or hide password input -->
    <script type="text/javascript">
        function showPassword() {
            var x = document.getElementById("myInput");
            var y = document.getElementById("hide-pass-icon");

            if (x.type === "password" && y.className == "lni lni-eye") {
                x.type = "text";
                y.className = "bx bx-hide";
            } else {
                x.type = "password";
                y.className = "lni lni-eye";
            }
        }
    </script>

    <script type="text/javascript">
        function changeText() {
            var x = document.getElementById("save-changes-btn");
            if (x.innerText == "Save Changes") {
                x.innerText = "Saving..";
            } else {
                x.innerText = "Save Changes";
            }
        }
    </script>

</div>
<!--end wrapper-->


<?php include "includes/footer.php"; ?>