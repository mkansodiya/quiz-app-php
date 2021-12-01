<?php
include('../inc/db.php');
session_start();

?>
<?php include('header.php'); ?>
<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'login':
            include('login.php');
            break;
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


?>

<?php
if ($_SESSION['login_status']) {
    header("location: dashboard.php");
} else {
}
?>





</body>

</html>