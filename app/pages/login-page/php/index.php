<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to home page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: ../../home/php/index.php");
  exit;
}

// Include config file
require __DIR__ . '../../../../sql/query/get_product.php';

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Check if username is empty
  if (empty(trim($_POST["username"]))) {
    $username_err = "&#10060; Please enter username";
  } else {
    $username = trim($_POST["username"]);
  }

  // Check if password is empty
  if (empty(trim($_POST["password"]))) {
    $password_err = "&#10060; Please enter your password";
  } else {
    $password = trim($_POST["password"]);
  }

  // Validate credentials
  if (empty($username_err) && empty($password_err)) {
    // Prepare a select statement
    $sql = "SELECT id, username, password FROM users WHERE username = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_username);

      // Set parameters
      $param_username = $username;

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        // Store result
        mysqli_stmt_store_result($stmt);

        // Check if username exists, if yes then verify password
        if (mysqli_stmt_num_rows($stmt) == 1) {
          // Bind result variables
          mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
          if (mysqli_stmt_fetch($stmt)) {

            if (password_verify($password, $hashed_password)) {
              echo $username;

              // Password is correct, so start a new session
              session_start();

              // Store data in session variables
              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["username"] = $username;

              // Redirect user to welcome page
              header("location: ../../home/php/index.php?from=login-page");
            } else {
              // Password is not valid, display a generic error message
              $login_err = "Invalid username or password";
            }
          }
        } else {
          // Username doesn't exist, display a generic error message
          $login_err = "Invalid username or password";
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

  // Close connection
  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/index.css" />
  <title>Login</title>
  <link rel="shortcut icon" type="image/x-icon" href="../../../../assets/images/favicon.png">
  <script src="https://kit.fontawesome.com/f8c6106aef.js" crossorigin="anonymous">
  </script>
</head>

<body>
  <!-- Navigation -->
  <?php include '../../../components/navigation/php/index.php' ?>
  <header class="login-page global-content-wrapper  global-flex-column-wrapper">
    <?php
    if (count($_GET['from']) != 0) {
      if ($_GET['from'] == "product-page") {
        echo '<span style="margin-bottom: 40px; color:var(--global-color-danger);" class="global-content-typography-subtitle"><i class="fas fa-exclamation-circle"></i> You need to be logged in to add products into cart!</span>';
      } elseif ($_GET['from'] == "signup-page") {
        echo '<span style="margin-bottom: 40px; color:var(--global-color-success);" class="global-content-typography-subtitle"><i class="fas fa-exclamation-circle"></i> New user registered successfully!</span>';
      }
    }
    ?>
    <span class="global-content-typography-title">LOG IN</span>
    <hr class="global-horizontal-line" width="80px">
  </header>
  <div class="global-content-wrapper login-page">



    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
      class="form-wrapper global-flex-column-wrapper">

      <?php
      if (!empty($login_err)) {
        echo '<span style="color: var(--global-color-danger);" class="global-content-typography-text"><i class="fas fa-exclamation-circle"></i> ' . $login_err . '</span>';
      } else {
        echo '<span class="global-content-typography-text"><i class="fas fa-exclamation-circle"></i> Please fill in your
          credentials to login</span>';
      }
      ?>

      <div class="form-items global-flex-column-wrapper">
        <label class="global-content-typography-text">Username</label>
        <input type="text" name="username"
          class="global-content-typography-text <?php echo (!empty($username_err)) ? 'input-danger' : ''; ?>"
          value="<?php echo $username; ?>">
        <span style="color: var(--global-color-danger);"
          class="global-content-typography-subtext"><?php echo $username_err; ?></span>
      </div>
      <div class="form-items global-flex-column-wrapper">
        <label class="global-content-typography-text">Password</label>
        <input type="password" name="password"
          class="global-content-typography-text <?php echo (!empty($password_err)) ? 'input-danger' : ''; ?>">
        <span style="color: var(--global-color-danger);"
          class="global-content-typography-subtext"><?php echo $password_err; ?></span>
      </div>

      <div class="form-items global-flex-column-wrapper">
        <input type="submit" class="global-button" value="LOG IN">
      </div>
      <span class="global-content-typography-text">Don't have an account? <a href="../../signup-page/php/index.php">Sign
          up now</a></span>

    </form>
  </div>
  <!-- Footer -->
  <?php include '../../../components/footer/php/index.php' ?>
</body>

</html>