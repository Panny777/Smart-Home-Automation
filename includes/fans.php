<?php
// Updating values for bulb 1
if (isset($_POST['fanBtn']))      // If press ON
{
    if ($fan_status == 1) {
        $query = "UPDATE users SET fan_status = 0 WHERE user_email = '{$user_email}'";
        $update_fan_status_query = mysqli_query($connection, $query);

        if (!$update_fan_status_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
    } else {
        $query = "UPDATE users SET fan_status = 1 WHERE user_email = '{$user_email}'";
        $update_fan_status_query = mysqli_query($connection, $query);

        if (!$update_fan_status_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
    }
    header('Location:' . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']);
    die;
}

if (isset($_POST['fanSpeed']))      // If press ON
{
    $fan_speed = $_POST['fanSpeed'];
    echo $fan_speed;
    
    $query = "UPDATE users SET fan_speed = '{$fan_speed}' WHERE user_email = '{$user_email}'";
    $update_fan_speed_query = mysqli_query($connection, $query);

    if (!$update_fan_speed_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

    header('Location:' . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']);
    die;
}
?>

<!--start content-->
<main class="page-content">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-4">Fan Control</h5>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4">
                <div class="col-lg-6">
                    <div class="card radius-10 border-0 border-start border-pink border-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">

                                    <?php
                                    $query = "SELECT fan_status from users WHERE user_email = '{$user_email}'";
                                    $result = mysqli_query($connection, $query);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $fan_status = (int) $row["fan_status"];
                                        if ($fan_status == 1) {
                                            $fan_status = "On";
                                        } else {
                                            $fan_status = "Off";
                                        }
                                    }
                                    ?>
                                    <p class="mb-1 text-black mb-4">Fan</p>
                                    <div style="display: flex;">
                                        <p class="mb-1 text-black" style="font-weight: bold;">Status:&nbsp;</p>
                                        <p class="mb-1 text-black"><?php echo $fan_status; ?></p>
                                    </div>
                                    <div class="custom-control custom-switch mb-4">
                                        <form action="" method="POST">
                                            <button id="fanBtn" class="btn btn-primary" name="fanBtn"><?php echo $fan_status; ?></button>
                                        </form>
                                    </div>
                                    <div style="display: flex;">
                                        <p class="mb-1 text-black" style="font-weight: bold;">Speed:&nbsp;</p>
                                        <p class="mb-1 text-black" id="fanSpeed"></p>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <form action="" method="POST">
                                            <input type="range" class="form-range" min="1" max="3" step="1" id="fanRange" name="fanSpeed">
                                            <!-- <input type="text" id="fanSpeed" value=""> -->
                                        </form>
                                    </div>
                                </div>
                                <div class="ms-auto widget-icon bg-tiffany text-white">
                                    <i class="bx bx-health"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    // Changing button feature for bulb1 button
    const fanBtn = document.getElementById("fanBtn");
    var fanBtnText = fanBtn.innerHTML;

    if (fanBtnText == "On") {
        fanBtn.innerHTML = "Turn Off";
        fanBtn.classList.remove('btn', 'btn-primary');
        fanBtn.classList.add('btn', 'btn-danger');
    } else {
        fanBtn.innerHTML = "Turn On";
        fanBtn.classList.remove('btn', 'btn-danger');
        fanBtn.classList.add('btn', 'btn-primary');
    }

    var slider = document.getElementById("fanRange");
    var output = document.getElementById("fanSpeed");
    output.innerHTML = slider.value;

    slider.oninput = function() {
        if (slider.value == 1) {
            output.innerHTML = "Low";
        } else if (slider.value == 2) {
            output.innerHTML = "Medium";
        } else if (slider.value == 3) {
            output.innerHTML = "High";
        }
    }
</script>