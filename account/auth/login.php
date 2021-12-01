<?php include('header.php'); ?>
<?php

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {

        case 'register':
            include('register.php');
            break;

        default:
            include('../account/login.php');
            break;
    }
} else {
    include('../account/login.php');
}

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $q = "SELECT * FROM users WHERE user_email= '$email'";
    $res = mysqli_query($con, $q);
    if (mysqli_num_rows($res) == 0) {
        echo "No user found with that email";
        unset($_POST);
    } else {
        $user_data = mysqli_fetch_assoc($res);
        if ($password === $user_data['user_password']) {
            $_SESSION['user_email'] = $email;
            $_SESSION['login_status'] = true;
            echo "login successful";
            header("Location: " . $_SERVER['PHP_SELF']);
        } else {
            $_SESSION['login_status'] = false;

            header("Location: " . $_SERVER['PHP_SELF']);
        }
    }
}
?>
<!-- partial:index.partial.html -->
<main class="main">
    <div class="container">
        <section class="wrapper">
            <div class="heading">
                <h1 class="text text-large">Sign In</h1>
                <p class="text text-normal">New user? <span><a href="?action=register" class="text text-links">Create an account</a></span>
                </p>
            </div>
            <form name="login" method="post" class="form">
                <div class="input-control">
                    <label for="email" class="input-label" hidden>Email Address</label>
                    <input type="email" name="email" class="input-field" placeholder="Email Address">
                </div>
                <div class="input-control">
                    <label for="password" class="input-label" hidden>Password</label>
                    <input type="password" name="password" class="input-field" placeholder="Password">
                </div>
                <div class="input-control">
                    <a href="#" class="text text-links">Forgot Password</a>
                    <input type="submit" name="login" class="input-submit" value="Sign In">
                </div>
            </form>

    </div>
    </section>
    </div>
</main>
<!-- partial -->

</body>

</html>