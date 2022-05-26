<?php include "includes/header.php"; ?>

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
?>


<!-- Navigation -->
<?php include "includes/navigation.php"; ?>


<?php
if (isset($_GET['source'])) {
    $source = $_GET['source'];
} else {
    $source = '';
}

switch ($source) {
    case 'bulbs':
        include "includes/bulbs.php";
        break;

    case 'fans':
        include "includes/fans.php";
        break;

    case 'waterPump':
        include "includes/waterPump.php";
        break;

        //     default:
        //         include "includes/view_all_posts.php";
        //         break;
}
?>


<?php include "includes/footer.php"; ?>