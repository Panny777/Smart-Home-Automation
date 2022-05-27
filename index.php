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
    $waterValveBtn = (int) $row["waterValve_status"];
    $waterPumpBtn = (int) $row["waterPump_status"];
  }
}


// Including Navigation Menu
include("includes/navigation.php");
?>


<?php
// Updating values for water valve
if (isset($_POST['waterValveBtn'])) {
  if ($waterValveBtn == 1) {
    $query = "UPDATE users SET waterValve_status = 0 WHERE user_email = '{$user_email}'";
    $update_waterValve_query = mysqli_query($connection, $query);

    if (!$update_waterValve_query) {
      die("QUERY FAILED" . mysqli_error($connection));
    }
  } else {
    $query = "UPDATE users SET waterValve_status = 1 WHERE user_email = '{$user_email}'";
    $update_waterValve_query = mysqli_query($connection, $query);

    if (!$update_waterValve_query) {
      die("QUERY FAILED" . mysqli_error($connection));
    }
  }
  header('Location:' . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']);
  die;
}

// Updating Status for water Pump
if (isset($_POST['waterPumpBtn'])) {
  if ($waterPumpBtn == 1) {
    $query = "UPDATE users SET waterPump_status = 0 WHERE user_email = '{$user_email}'";
    $update_waterValve_query = mysqli_query($connection, $query);

    if (!$update_waterValve_query) {
      die("QUERY FAILED" . mysqli_error($connection));
    }
  } else {
    $query = "UPDATE users SET waterPump_status = 1 WHERE user_email = '{$user_email}'";
    $update_waterValve_query = mysqli_query($connection, $query);

    if (!$update_waterValve_query) {
      die("QUERY FAILED" . mysqli_error($connection));
    }
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
        <h5 class="mb-4">Applicances</h5>
      </div>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4">
        <div class="col-lg-6">
          <div class="card radius-10 border-0 border-start border-tiffany border-3">
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
              <a href="appliances.php?source=fans">
                <div class="d-flex align-items-center">
                  <div class="">
                    <?php
                    ?>
                    <p class="mb-1 text-black">Fan Control</p>
                    <div style="display: flex;">
                      <!-- <p class="mb-1 text-black" style="font-weight: bold;">Speed:&nbsp;</p> -->
                      <p class="mb-1 text-black" id=""></p>
                    </div>
                  </div>
                  <div class="ms-auto widget-icon bg-pink text-white">
                    <i class="bx bx-health"></i>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card radius-10 border-0 border-start border-purple border-3">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="">
                  <?php
                  $query = "SELECT waterPump_status FROM users WHERE user_email = '{$user_email}'";
                  $result = mysqli_query($connection, $query);

                  while ($row = mysqli_fetch_assoc($result)) {
                    $waterPump_status = (int) $row["waterPump_status"];
                    if ($waterPump_status == 1) {
                      $waterPump_status = "Working Normal";
                      $waterPump_status2 = "Override";
                    } else {
                      $waterPump_status = "Overrode";
                      $waterPump_status2 = "Allow";
                    }
                  }
                  ?>
                  <p class="mb-1 text-black">Water Pump</p>
                  <div style="display: flex;">
                    <p class="mb-1 text-black" style="font-weight: bold;">Status:&nbsp;</p>
                    <p class="mb-1 text-black"><?php echo $waterPump_status; ?></p>
                  </div>
                  <div class="custom-control custom-switch">
                    <form action="" method="POST">
                      <button id="waterPumpBtn" class="btn btn-primary" name="waterPumpBtn"><?php echo $waterPump_status2; ?></button>
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
        <div class="col-lg-6">
          <div class="card radius-10 border-0 border-start border-purple border-3">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="">
                  <?php
                  $query = "SELECT waterValve_status FROM users WHERE user_email = '{$user_email}'";
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
                  <p class="mb-1 text-black">Water Valve</p>
                  <div style="display: flex;">
                    <p class="mb-1 text-black" style="font-weight: bold;">Status:&nbsp;</p>
                    <p class="mb-1 text-black"><?php echo $waterValve_status; ?></p>
                  </div>
                  <div class="custom-control custom-switch">
                    <form action="" method="POST">
                      <button id="waterValveBtn" class="btn btn-primary" name="waterValveBtn"><?php echo $waterValve_status; ?></button>
                    </form>
                  </div>
                </div>
                <div class="ms-auto widget-icon bg-purple text-white">
                  <i class="bx bx-vial"></i>
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
  const waterValveBtn = document.getElementById("waterValveBtn");
  var waterValveBtnText = waterValveBtn.innerHTML;

  if (waterValveBtnText == "On") {
    waterValveBtn.innerHTML = "Turn Off";
    waterValveBtn.classList.remove('btn', 'btn-primary');
    waterValveBtn.classList.add('btn', 'btn-danger');
  } else {
    waterValveBtn.innerHTML = "Turn On";
    waterValveBtn.classList.remove('btn', 'btn-danger');
    waterValveBtn.classList.add('btn', 'btn-primary');
  }

  const waterPumpBtn = document.getElementById("waterPumpBtn");
  var waterPumpBtnText = waterPumpBtn.innerHTML;

  if (waterPumpBtnText == "Allow") {
    waterPumpBtn.innerHTML = "Allow";
    waterPumpBtn.classList.remove('btn', 'btn-danger');
    waterPumpBtn.classList.add('btn', 'btn-primary');
  } else {
    waterPumpBtn.innerHTML = "Override";
    waterPumpBtn.classList.remove('btn', 'btn-primary');
    waterPumpBtn.classList.add('btn', 'btn-danger');
  }
</script>


<?php
// Footer File
include("includes/footer.php");
?>