<?php
// Header File
include("includes/header.php");
include("includes/navigation.php");

?>

<main class="page-content">
  <form action="" method="POST">
    <div class="wrapper">
      <button class="button btnon" type="submit" name="ON">ON</button><br>
      <button class="button btnoff" type="submit" name="OFF">OFF</button>
    </div>
  </form>
</main>

<?php
if (isset($_POST['ON']))      // If press ON
{

  $query = "UPDATE status SET status = 1";

  $update_status_query = mysqli_query($connection, $query);

  if (!$update_status_query) {
    die("QUERY FAILED" . mysqli_error($connection));
  }
}

if (isset($_POST['OFF']))    // If press OFF
{

  $query = "UPDATE status SET status = 0";

  $update_status_query = mysqli_query($connection, $query);

  if (!$update_status_query) {
    die("QUERY FAILED" . mysqli_error($connection));
  }
}

// Footer File
include("includes/footer.php");
?>