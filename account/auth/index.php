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
            include('login.php');
            break;
    }
} else {
    include('login.php');
}
?>







</body>

</html>