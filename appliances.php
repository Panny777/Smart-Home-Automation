<?php
// Header File
include("includes/header.php");
include("includes/navigation.php");
?>

<?php
if (isset($_POST['bulb1On']))      // If press ON
{
    $query = "UPDATE users SET bulb1_status = 1";
    $update_status_query = mysqli_query($connection, $query);

    if (!$update_status_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
}

if (isset($_POST['bulb1Off']))    // If press OFF
{
    $query = "UPDATE users SET bulb1_status = 0";
    $update_status_query = mysqli_query($connection, $query);

    if (!$update_status_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
}
?>


<!--start content-->
<main class="page-content">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4">
        <div class="col-lg-6">
            <div class="card radius-10 border-0 border-start border-tiffany border-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <?php
                            $query = "SELECT bulb1_status from users";
                            $result = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $led_status = (int) $row["bulb1_status"];
                                if ($led_status == 1) {
                                    $led_status = "On";
                                } else {
                                    $led_status = "Off";
                                }
                            }
                            ?>
                            <p class="mb-1 text-black">Bulb 1</p>
                            <div style="display: flex;">
                                <p class="mb-1 text-black" style="font-weight: bold;">Status:&nbsp;</p>
                                <p class="mb-1 text-black"><?php echo $led_status; ?></p>
                            </div>
                            <div class="custom-control custom-switch">
                                <form action="" method="POST">
                                    <button class="btn btn-primary" name="bulb1On">On</button>
                                    <button class="btn btn-danger" name="bulb1Off">Off</button>
                                </form>
                            </div>
                        </div>
                        <div class="ms-auto widget-icon bg-tiffany text-white">
                            <i class="bi bi-lightbulb"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card radius-10 border-0 border-start border-success border-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <?php
                            $query = "SELECT * from users";
                            $result = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $led_status = (int) $row["bulb1_status"];
                                if ($led_status == 1) {
                                    $led_status = "On";
                                } else {
                                    $led_status = "Off";
                                }
                            }
                            ?>
                            <p class="mb-1 text-black">Bulb 2</p>
                            <div style="display: flex;">
                                <p class="mb-1 text-black" style="font-weight: bold;">Status:&nbsp;</p>
                                <p class="mb-1 text-black"><?php echo $led_status; ?></p>
                            </div>
                            <div class="custom-control custom-switch">
                                <form action="" method="POST">
                                    <button class="btn btn-primary" name="ON">On</button>
                                    <button class="btn btn-danger" name="OFF">Off</button>
                                </form>
                            </div>
                        </div>
                        <div class="ms-auto widget-icon bg-success text-white">
                            <i class="bi bi-lightbulb"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card radius-10 border-0 border-start border-pink border-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <a href="users.php">
                                <?php
                                // $query = "SELECT DISTINCT visitor_ip FROM visitors";
                                // $select_all_visits = mysqli_query($connection, $query);
                                // $visitors_counts = mysqli_num_rows($select_all_visits);
                                ?>

                                <p class="mb-1 text-black">Fan</p>
                                <p class="mb-1 text-black">Status</p>
                                <h4 class="mb-0 text-pink"><?php echo "<div class='huge'>{''}</div>"; ?></h4>
                            </a>
                        </div>
                        <div class="ms-auto widget-icon bg-pink text-white">
                            <i class="bx bx-gas-pump"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card radius-10 border-0 border-start border-purple border-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <?php
                            // $date = date('Y-m-d', time());
                            // $query = "SELECT DISTINCT visitor_ip FROM visitors WHERE visiting_date = '{$date}'";
                            // $select_all_visits = mysqli_query($connection, $query);
                            // $visitors_counts = mysqli_num_rows($select_all_visits);
                            // 
                            ?>

                            <p class="mb-1 text-black">Water Pump</p>
                            <h4 class="mb-0 text-purple"><?php echo "<div class='huge'>{''}</div>"; ?></h4>
                        </div>
                        <div class="ms-auto widget-icon bg-purple text-white">
                            <i class="bx bx-gas-pump"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card radius-10 border-0 border-start border-orange border-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <a href="messages.php">
                                <?php
                                // $query = "SELECT * FROM messages";
                                // $select_all_messages = mysqli_query($connection, $query);
                                // $messages_counts = mysqli_num_rows($select_all_messages);
                                ?>
                                <p class="mb-1 text-black">Messages</p>
                                <h4 class="mb-0 text-pink"><?php echo "<div class='huge'>{''}</div>"; ?></h4>
                            </a>
                        </div>
                        <div class="ms-auto widget-icon bg-orange text-white">
                            <i class="bi bi-person-plus-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-6 col-xl-6 col-xxl-4 d-flex">
            <div class="card radius-10 bg-transparent shadow-none w-100">
                <div class="card-body p-0">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h6 class="mb-0">Post By Category</h6>
                            </div>
                            <div class="row row-cols-1 row-cols-md-2 mt-3 g-3">
                                <div class="col">
                                    <div class="by-device-container">
                                        <canvas id="chart5"></canvas>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex align-items-center justify-content-between border-0">
                                                <i class="bi bi-github me-2 text-primary"></i> <span>Github -</span> <span> <?php echo '$github_post_counts'; ?> Posts</span>
                                            </li>
                                            <li class="list-group-item d-flex align-items-center justify-content-between border-0">
                                                <i class="bi bi-phone-fill me-2 text-primary-2"></i> <span>Latest - </span> <span><?php echo '$latest_post_counts'; ?> Posts</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--end row-->

</main>