<?php include('header.php'); ?>
<?php
session_start();
ob_start();
include('./inc/db.php');
if (isset($_POST['create_paper'])) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $que_hash = '';
    for ($i = 0; $i < 20; $i++) {
        $paper_hash .= $characters[rand(0, $charactersLength - 1)];
    }
    $paper_name = $_POST['paper_name'];
    $paper_subject = $_POST['paper_subject'];
    $paper_class     = $_POST['paper_class'];
    $exam_id = $_POST['exam_id'];

    $query = "INSERT INTO `papers` (`exam_id`,`paper_id`, `paper_hash`, `paper_subject`, `paper_class`, `paper_author`) VALUES ('$exam_id',NULL, '$paper_hash', '$paper_subject', '$paper_class', 'vikash')";
    $res = mysqli_query($con, $query);
    if (!$res) {
        echo mysqli_error($con);
    } else {
        header("location: ./add_que.php");
    }

    $_SESSION["paper_name"] = $paper_name;
    $_SESSION["paper_hash"] = $paper_hash;
}
$saved_paper = $_SESSION["paper_name"];
echo $saved_paper;
?>
<br>
<div class="container border col-md-4  m-auto ">
    <br>
    <form action="#" method="post">
        <div class="mb-3 ">
            <label for="" class="form-label">Exam Name</label>
            <select name="exam_id" class="form-control" id="">
                <option value="" selected disabled>Select Exam</option>
                <option value="1">Annual Exam 2021</option>
            </select>

        </div>
        <div class="mb-3 ">
            <label for="" class="form-label">Subject</label>
            <input type="text" name="paper_subject" class="form-control">

        </div>
        <div class="mb-3 ">
            <label for="" class="form-label">Paper Class</label>
            <input type="number" min="1" max="12" name="paper_class" class="form-control">

        </div>
        <div class="text-center">
            <input type="submit" name="create_paper" class="btn btn-primary " value="Create Now">
        </div>


    </form>
    <br>
</div>
</body>

</html>