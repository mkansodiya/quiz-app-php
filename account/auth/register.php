<?php include('header.php'); ?>
<?php
if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $error = "no error";
    if (empty($email)) {
        $error = "Please enter a valid Email";
    } elseif (empty($username)) {
        $error = "Please enter a valid username";
    } elseif (empty($password)) {
        $error = "Please enter a valid password";
    }
    if ($error == "no error") {

        $query = "SELECT * FROM users WHERE user_email='$email'";
        $res = mysqli_query($con, $query);
        $user_count = mysqli_num_rows($res);
        if ($user_count != 0) {
            echo "account already available with same details";
        } else {
            $q = "INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `user_name`) VALUES (NULL, '$email', '$password', '$username')";
            $res = mysqli_query($con, $q);

            if ($res) {
                $_SESSION['user_email'] = $email;
                $_SESSION['login_status'] = true;
            }
        }
    } else {
        echo $error;
    }
}
?>



<!-- partial:index.partial.html -->
<main class="main">
    <div class="container">
        <section class="wrapper">
            <div class="heading">
                <h1 class="text text-large">Register on Quiz app</h1>
                <p class="text text-normal">Existing user? <span><a href="login.php" class="text text-links">Login Here</a></span>
                </p>
            </div>
            <form name="register" method="post" class="form">
                <div class="input-control">
                    <label for="email" class="input-label" hidden>Email Address</label>
                    <input type="email" name="email" class="input-field" placeholder="Email Address">
                </div>
                <div class="input-control">
                    <label for="username" class="input-label" hidden>Username</label>
                    <input type="text" name="username" class="input-field" placeholder="Username">
                </div>
                <div class="input-control">
                    <label for="password" class="input-label" hidden>Password</label>
                    <input type="password" name="password" class="input-field" placeholder="Password">
                </div>
                <div class="input-control">
                    <a href="#" class="text text-links">Forgot Password</a>
                    <input type="submit" name="register" class="input-submit" value="Register">
                </div>
            </form>

        </section>
    </div>
</main>
<!-- partial -->

</body>

</html>