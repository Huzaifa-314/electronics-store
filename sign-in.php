<!-- ============================================== HEADER : START ============================================== -->
<?php include 'include/header.php'; ?>
<!-- ============================================== HEADER : END ============================================== -->

<?php
if (isset($_POST['sign-up'])) {
  // Retrieve form data
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  // Password validation
  if ($password !== $confirm_password) {
    header('Location: sign-up.php?error=Passwords do not match');
    exit;
  }

  // Check if the user already exists
  $user_check = mysqli_query($db, "SELECT email FROM estore_user WHERE email = '$email'");
  if (mysqli_fetch_assoc($user_check)) {
    header('Location: sign-up.php?error=Email already exists');
    exit;
  }

  // Hash the password
  $hashed_password = sha1($password);

  // Insert user data into the database
  $sql = "INSERT INTO estore_user (firstname, lastname, email, phone, pass, userrole,status) 
          VALUES ('$firstname', '$lastname', '$email', '$phone', '$hashed_password', 1,1)";

  if (mysqli_query($db, $sql)) {
    // Log in the user after successful registration
    $row = mysqli_fetch_assoc(mysqli_query($db, "SELECT ID, email, userrole FROM estore_user WHERE email = '$email'"));
    $_SESSION['id'] = $row['ID'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['userrole'] = $row['userrole'];

    header('Location: index.php?success=Account created and logged in successfully');
  } else {
    header('Location: sign-up.php?error=Failed to create account');
  }
}






if (isset($_POST['login'])) {
  $mail = $_POST['mail'];
  $password = sha1($_POST['password']);
  $remember = isset($_POST['remember']); // Check if the checkbox is checked

  $user = mysqli_query($db, "SELECT email FROM estore_user WHERE email = '$mail' AND status='1'");
  $row = mysqli_fetch_assoc($user);
  if ($row == null) {
    header('location: sign-in.php?error=Invalid user information');
  } else {
    $pass = mysqli_fetch_assoc(mysqli_query($db, "SELECT pass FROM estore_user WHERE email = '$mail'"))['pass'];
    if ($password == $pass) {
      $row = mysqli_fetch_assoc(mysqli_query($db, "SELECT ID, email, userrole FROM estore_user WHERE email = '$mail'"));
      $_SESSION['id'] = $row['ID'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['userrole'] = $row['userrole'];

      if ($remember) {
        // Set cookies for 30 days
        setcookie('user_id', $row['ID'], time() + (30 * 24 * 60 * 60), "/", "", false, true); // Secure flag and HTTP only
        setcookie('user_email', $row['email'], time() + (30 * 24 * 60 * 60), "/", "", false, true);
        setcookie('user_role', $row['userrole'], time() + (30 * 24 * 60 * 60), "/", "", false, true);
      } else {
        // Clear cookies if remember me is not checked
        setcookie('user_id', '', time() - 3600, "/", "", false, true);
        setcookie('user_email', '', time() - 3600, "/", "", false, true);
        setcookie('user_role', '', time() - 3600, "/", "", false, true);
      }

      header('Location: index.php?success=Logged In Successfully');
    } else {
      header('location: sign-in.php?error=Incorrect Password');
    }
  }
}



$error = isset($_GET['error']) ? '<span class="alert alert-danger text-danger">' . $_GET["error"] . '</span>' : '';
?>

<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="index.php">Home</a></li>
        <li class='active'>Login</li>
      </ul>
    </div><!-- /.breadcrumb-inner -->
  </div><!-- /.container -->
</div><!-- /.breadcrumb -->


<div class="body-content">
  <div class="container">
    <div class="sign-in-page">
      <?php echo $error ?>
      <div class="row">

        <!-- Sign-in -->
        <!-- Sign-in -->
        <div class="col-md-6 col-sm-6 sign-in">
          <h4 class="">Sign in</h4>
          <form class="register-form outer-top-xs" role="form" method="post">
            <div class="form-group">
              <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
              <input type="email" name="mail" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="<?php echo isset($_COOKIE['user_email']) ? htmlspecialchars($_COOKIE['user_email']) : ''; ?>">
            </div>
            <div class="form-group">
              <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
              <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1">
            </div>
            <div class="form-group">
              <input class="form-check-input" type="checkbox" name="remember" id="rememberMe" <?php echo isset($_COOKIE['user_email']) ? 'checked' : ''; ?>>
              <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>
            <button type="submit" name="login" class="btn-upper btn btn-primary checkout-page-button">Login</button>
          </form>
        </div>
        <!-- Sign-in -->

        <!-- Sign-in -->


        <!-- create a new account -->
        <div class="col-md-6 col-sm-6 create-new-account">
          <h4 class="checkout-subtitle">Create a new account</h4>
          <form class="register-form outer-top-xs" role="form" method="post">
            <div class="form-group">
              <label class="info-title" for="email">Email Address <span>*</span></label>
              <input type="email" name="email" class="form-control unicase-form-control text-input" id="email" required>
            </div>
            <div class="form-group">
              <label class="info-title" for="firstname">First Name <span>*</span></label>
              <input type="text" name="firstname" class="form-control unicase-form-control text-input" id="firstname" required>
            </div>
            <div class="form-group">
              <label class="info-title" for="lastname">Last Name <span>*</span></label>
              <input type="text" name="lastname" class="form-control unicase-form-control text-input" id="lastname" required>
            </div>
            <div class="form-group">
              <label class="info-title" for="phone">Phone Number <span>*</span></label>
              <input type="text" name="phone" class="form-control unicase-form-control text-input" id="phone" required>
            </div>
            <div class="form-group">
              <label class="info-title" for="password">Password <span>*</span></label>
              <input type="password" name="password" class="form-control unicase-form-control text-input" id="password" required>
            </div>
            <div class="form-group">
              <label class="info-title" for="confirm_password">Confirm Password <span>*</span></label>
              <input type="password" name="confirm_password" class="form-control unicase-form-control text-input" id="confirm_password" required>
            </div>
            <button type="submit" name="sign-up" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
          </form>
        </div>

        <!-- create a new account -->
      </div><!-- /.row -->
    </div><!-- /.sigin-in-->
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <div id="brands-carousel" class="logo-slider wow fadeInUp">

      <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
          <div class="item m-t-15">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
            </a>
          </div><!--/.item-->

          <div class="item m-t-10">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
            </a>
          </div><!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
            </a>
          </div><!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
            </a>
          </div><!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
            </a>
          </div><!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
            </a>
          </div><!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
            </a>
          </div><!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
            </a>
          </div><!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
            </a>
          </div><!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
            </a>
          </div><!--/.item-->
        </div><!-- /.owl-carousel #logo-slider -->
      </div><!-- /.logo-slider-inner -->

    </div><!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
  </div><!-- /.container -->
</div><!-- /.body-content -->

<!-- ============================================================= FOOTER ============================================================= -->
<?php include 'include/footer.php' ?>
<!-- ============================================================= FOOTER : END============================================================= -->