<?php
if (isset($_GET['file'])) {
    $file = $_GET['file'];
    if (file_exists($file) && is_readable($file) && preg_match('/\.jpeg$/', $file)) {
        header('Content-Type: image/jpeg');
        header("Content-Disposition: attachment; filename=\"$file\"");
        readfile($file);
        unlink($file);
    }
}
