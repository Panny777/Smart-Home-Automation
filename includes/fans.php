<!--start content-->
<main class="page-content">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-4">Bulbs Control</h5>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4">
                <div class="col-lg-6">
                    <div class="card radius-10 border-0 border-start border-pink border-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">

                                    <?php
                                    $query = "SELECT bulb1_status from users WHERE user_email = '{$user_email}'";
                                    $result = mysqli_query($connection, $query);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $bulb1_status = (int) $row["bulb1_status"];
                                        if ($bulb1_status == 1) {
                                            $bulb1_status = "On";
                                        } else {
                                            $bulb1_status = "Off";
                                        }
                                    }
                                    ?>
                                    <p class="mb-1 text-black mb-4">Fan</p>
                                    <div style="display: flex;">
                                        <p class="mb-1 text-black" style="font-weight: bold;">Status:&nbsp;</p>
                                        <p class="mb-1 text-black"><?php echo $bulb1_status; ?></p>
                                    </div>
                                    <div class="custom-control custom-switch mb-4">
                                        <form action="" method="POST">
                                            <button id="fanBtn" class="btn btn-primary" name="fanBtn"><?php echo $bulb1_status; ?></button>
                                        </form>
                                    </div>
                                    <div style="display: flex;">
                                        <p class="mb-1 text-black" style="font-weight: bold;">Speed:&nbsp;</p>
                                        <p class="mb-1 text-black" id="fanSpeed"></p>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <form action="" method="POST">
                                            <input type="range" class="form-range" min="0" max="2" step="1" id="fanRange">
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
        if (slider.value == 0) {
            output.innerHTML = "Low";
        } else if (slider.value == 1) {
            output.innerHTML = "Medium";
        } else if (slider.value == 2) {
            output.innerHTML = "High";
        }
    }
</script>