<?php
header('content-type: image/jpeg');
$rob_ita_font = "Roboto-BlackItalic.ttf";
$alex_brush_reg = "BLKCHCRY.TTF";
$raleway = "Raleway-Light.ttf";
$image = imagecreatefromjpeg("certificate.jpeg");
$color = imagecolorallocate($image, 19, 21, 22);

if (isset($_GET['res_id'])) {
    $host = 'localhost';
    $database = 'quiz';
    $username = 'root';
    $password = '';

    $con = mysqli_connect($host, $username, $password, $database);
    $result_id = $_GET['res_id'];

    // result detail
    $q = "SELECT * FROM results WHERE result_hash= '$result_id'";
    $res = mysqli_query($con, $q);
    if (mysqli_num_rows($res) == 0) {
        die("No result found");
    }
    $res_data = mysqli_fetch_assoc($res);
    $student_id = $res_data['result_student_id'];
    $total_marks = $res_data['total_marks'];
    $marks_obtained = $res_data['marks_obtained'];
    $exam_id = $res_data['exam_id'];
    $attempted_on = $res_data['attempted_on'];


    //geting exam detail
    $q2 = "SELECT * FROM exams WHERE exam_id= '$exam_id'";
    $res2 = mysqli_query($con, $q2);
    $exam_name = mysqli_fetch_assoc($res2)['exam_name'];

    // fatching student detail
    $q1 = "SELECT * FROM students WHERE student_id= '$student_id'";
    $res1 = mysqli_query($con, $q1);
    $st_data = mysqli_fetch_assoc($res1);
    $student_name = $st_data['student_name'];
    $file_name = $student_name . "_" . time();
    $d_name = $file_name . ".jpeg";
    $date = "25th Dec, 2021";
}
imagettftext($image, 20, 0, 170, 190, $color, $raleway,  "Certificate ID: " . $result_id);
imagettftext($image, 30, 0, 850, 949, $color, $raleway,  "Exam name: " . $exam_name);
imagettftext($image, 30, 0, 850, 999, $color, $raleway,  "Total marks: " . $total_marks);
imagettftext($image, 30, 0, 850, 1050, $color, $raleway,  "Marks obtained: " . $marks_obtained);

imagettftext($image, 80, 0, 900, 699, $color, $alex_brush_reg, "$student_name");
imagettftext($image, 40, 0, 1480, 1270, $color, $raleway, $attempted_on);
// imagejpeg($image);
imagejpeg($image, "$file_name" . ".jpeg");
header("location: download.php?file=$d_name");
imagedestroy($image);
