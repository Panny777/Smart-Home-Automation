<?php
// Header File
include("includes/header.php");
?>

<?php
//Checking if the login cookie is set
if (!isset($_COOKIE["user_email"])) {
  header("Location: login.php");
} else {
  $user_email = $_COOKIE["user_email"];
  $query = "SELECT * FROM users WHERE user_email = '{$user_email}' ";
  $select_user_query = mysqli_query($connection, $query);

  if (!$select_user_query) {
    die("QUERY FAILED" . mysqli_error($connection));
  }

  while ($row = mysqli_fetch_array($select_user_query)) {
    $username = $row['username'];
    $bulb1_status = (int) $row["bulb1_status"];
    $bulb2_status = (int) $row["bulb2_status"];
  }
}


// Including Navigation Menu
include("includes/navigation.php");
?>


<?php
// Updating values for water valve
if (isset($_POST['waterValveOn']))      // If press ON
{
  $query = "UPDATE users SET waterValve_status = 1 WHERE user_email = '{$user_email}'";
  $update_waterValve_query = mysqli_query($connection, $query);

  if (!$update_waterValve_query) {
    die("QUERY FAILED" . mysqli_error($connection));
  }
}


if (isset($_POST['waterValveOff']))    // If press OFF
{
  $query = "UPDATE users SET waterValve_status = 0 WHERE user_email = '{$user_email}'";
  $update_waterValve_query = mysqli_query($connection, $query);

  if (!$update_waterValve_query) {
    die("QUERY FAILED" . mysqli_error($connection));
  }
}
?>


<!--start content-->
<main class="page-content">
  <div class="card">
    <div class="card-body">
      <div class="d-flex align-items-center">
        <h5 class="mb-4">Applicances</h5>
      </div>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4">
        <div class="col-lg-6">
          <div class="card radius-10 border-0 border-start border-pink border-3">
            <div class="card-body">
              <a href="appliances.php?source=bulbs">
                <div class="d-flex align-items-center">
                  <div class="">
                    <?php
                    ?>
                    <p class="mb-1 text-black">Bulbs</p>
                    <div style="display: flex;">
                      <!-- <p class="mb-1 text-black" style="font-weight: bold;">Speed:&nbsp;</p> -->
                      <p class="mb-1 text-black" id=""></p>
                    </div>
                  </div>
                  <div class="ms-auto widget-icon bg-tiffany text-white">
                    <i class="bi bi-lightbulb"></i>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card radius-10 border-0 border-start border-pink border-3">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="">

                  <?php
                  // $query = "SELECT * from users";
                  // $result = mysqli_query($connection, $query);

                  // while ($row = mysqli_fetch_assoc($result)) {
                  //   $bulb2_status = (int) $row["waterValve_status"];
                  //   if ($bulb2_status == 1) {
                  //     $bulb2_status = "On";
                  //   } else {
                  //     $bulb2_status = "Off";
                  //   }
                  // }
                  ?>
                  <p class="mb-1 text-black">Fan</p>
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
                  $query = "SELECT * from users";
                  $result = mysqli_query($connection, $query);

                  while ($row = mysqli_fetch_assoc($result)) {
                    $waterValve_status = (int) $row["waterValve_status"];
                    if ($waterValve_status == 1) {
                      $waterValve_status = "On";
                    } else {
                      $waterValve_status = "Off";
                    }
                  }
                  ?>

                  <p class="mb-1 text-black">Water Pump</p>
                  <div style="display: flex;">
                    <p class="mb-1 text-black" style="font-weight: bold;">Status:&nbsp;</p>
                    <p class="mb-1 text-black"><?php echo $waterValve_status; ?></p>
                  </div>
                  <div class="custom-control custom-switch">
                    <form action="" method="POST">
                      <button class="btn btn-primary" name="waterValveOn">On</button>
                      <button class="btn btn-danger" name="waterValveOff">Off</button>
                    </form>
                  </div>
                </div>
                <div class="ms-auto widget-icon bg-purple text-white">
                  <i class="bx bx-gas-pump"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>


<!-- Getting the Fan Speed -->
<script>
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

<?php
// Footer File
include("includes/footer.php");
?>