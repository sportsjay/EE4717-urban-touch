<?php
// Include config file
require __DIR__ . '../../../../sql/query/get_product.php';

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validate username
  if (empty(trim($_POST["username"]))) {
    $username_err = "&#10060; Please enter a username";
  } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
    $username_err = "&#10060; Username can only contain letters, numbers, and underscores";
  } else {
    // Prepare a select statement
    $sql = "SELECT id FROM users WHERE username = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_username);

      // Set parameters
      $param_username = trim($_POST["username"]);

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        /* store result */
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {
          $username_err = "&#10060; This username is already taken";
        } else {
          $username = trim($_POST["username"]);
        }
      } else {
        echo "Oops! Something went wrong. Please try again later";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

  // Validate password
  if (empty(trim($_POST["password"]))) {
    $password_err = "&#10060; Please enter a password.";
  } elseif (strlen(trim($_POST["password"])) < 6) {
    $password_err = "&#10060; Password must have atleast 6 characters";
  } else {
    $password = trim($_POST["password"]);
  }

  // Validate confirm password
  if (empty(trim($_POST["confirm_password"]))) {
    $confirm_password_err = "&#10060; Please re-enter the password";
  } else {
    $confirm_password = trim($_POST["confirm_password"]);
    if (empty($password_err) && ($password != $confirm_password)) {
      $confirm_password_err = "&#10060; Password did not match";
    }
  }

  // Check input errors before inserting in database
  if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

    // Prepare an insert statement
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

      // Set parameters
      $param_username = $username;
      $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        // Redirect to login page
        header("location: ../../login-page/php/index.php?from=signup-page");
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
  <title>Sign Up</title>
  <link rel="shortcut icon" type="image/x-icon" href="../../../../assets/images/favicon.png">
  <script src="https://kit.fontawesome.com/f8c6106aef.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php include '../../../components/navigation/php/index.php' ?>
  <header class="signup-page global-content-wrapper  global-flex-column-wrapper">
    <span class="global-content-typography-title">SIGN UP</span>
    <hr class="global-horizontal-line" width="90px">
  </header>
  <div class="global-content-wrapper signup-page ">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
      class="global-flex-column-wrapper form-wrapper">
      <span class="global-content-typography-text"><i class="fas fa-exclamation-circle"></i> Please fill this form to
        create an account</span>

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
          class="global-content-typography-text <?php echo (!empty($password_err)) ? 'input-danger' : ''; ?>"
          value="<?php echo $password; ?>">
        <span style="color: var(--global-color-danger);"
          class="global-content-typography-subtext"><?php echo $password_err; ?></span>
      </div>
      <div class="form-items global-flex-column-wrapper">
        <label class="global-content-typography-text">Confirm Password</label>
        <input type="password" name="confirm_password"
          class="global-content-typography-text <?php echo (!empty($confirm_password_err)) ? 'input-danger' : ''; ?>"
          value="<?php echo $confirm_password; ?>">
        <span style="color: var(--global-color-danger);"
          class="global-content-typography-subtext"><?php echo $confirm_password_err; ?></span>
      </div>
      <div class="form-items global-flex-column-wrapper">
        <input type="submit" class="global-button" value="SIGN UP">
        <input type="reset" class="global-button-secondary" value="CLEAR">
      </div>
      <span class="global-content-typography-text">Already have an account? <a
          href="../../login-page/php/index.php">Login here</a></span>
    </form>
  </div>
  <?php include '../../../components/footer/php/index.php' ?>

</body>

</html>