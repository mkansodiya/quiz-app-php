<?php include('header.php');
session_start();


?>

<?php

$attempted = 0;
$marks = 0;
$marks = 0;
$q_count = 0;



function right_answer($que_id)
{
    $host = 'localhost';
    $database = 'quiz';
    $username = 'root';
    $password = '';
    $con = mysqli_connect($host, $username, $password, $database);
    $query = "SELECT * FROM questions WHERE que_id= $que_id";
    $res = mysqli_query($con, $query);
    $q_data = mysqli_fetch_assoc($res);
    $right_answer = $q_data['right_option'];
    return $right_answer;
}

if (isset($_POST['submit'])) {
    if (!empty($_POST['quiz_check'])) {

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $result_hash = '';
        for ($i = 0; $i < 11; $i++) {
            $result_hash .= $characters[rand(0, $charactersLength - 1)];
        }


        $attempted = count($_POST['quiz_check']);


        $selected = $_POST['quiz_check'];

        $query = "SELECT * FROM questions WHERE paper_id= $paper_id";
        $res = mysqli_query($con, $query);
        $q_count = mysqli_num_rows($res);
        $marks = 0;
        while ($q_data = mysqli_fetch_assoc($res)) {
            $right_answer = $q_data['right_option'];
            $que_id = $q_data['que_id'];







            if ($selected[$que_id] == right_answer($que_id)) {
                $marks++;
                echo "right anser";
            }
        }
    }
    $query = "INSERT INTO `results` (`result_hash`,`result_id`, `result_student_id`, `total_marks`, `marks_obtained`, `total_questions`, `attempted_questions`, `right_answers`, `exam_id`, `exam_paper_id`) 
    VALUES ('$result_hash', NULL, '23', '$q_count', '$marks', '$q_count', '$attempted', '$marks', '1', '$paper_id');";
    $res = mysqli_query($con, $query);
    $red_url = "../quiz/result.php?result_uid=$result_hash";
    header("location: $red_url");
}
?>


<form action="" id="create_ticket" method="post">
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">

                <hr class="mb-4">
                <div class="row justify-content-center">
                    <?php
                    if (isset($_GET['paper_id'])) {
                        $paper_id = $_GET['paper_id'];
                    } else {
                        die("Please type a correct paper URL");
                    }

                    ?>
                    <div class="col-md-10 offset-md-1">
                        <span class="anchor" id="formComplex"></span>
                        <hr class="my-5">
                        <!-- form complex example -->
                        <div class="card card-outline-secondary">
                            <div class="card-header">
                                <h3 class="mb-0">Take a test</h3>
                            </div>



                            <?php
                            $query = "SELECT * FROM questions WHERE paper_id= $paper_id";
                            $res = mysqli_query($con, $query);
                            $q_count = mysqli_num_rows($res);
                            if ($q_count < 1) {
                                die();
                            }
                            while ($q_data = mysqli_fetch_all($res, MYSQLI_ASSOC)) {
                                for ($i = 0; $i < $q_count; $i++) {
                                    $que_id = $q_data[$i]['que_id'];

                            ?>
                                    <div class="col-md-12 question bg-white p-3 border-bottom">
                                        <div class="d-flex flex-row align-items-center question-title">
                                            <h3 class="text-danger">Q.</h3>
                                            <h5 class="mt-1 ml-2"><?php echo $q_data[$i]['que_content']; ?> </h5>
                                        </div>
                                        <div class="ans ml-2">
                                            <label class="radio"> <input type="radio" name="quiz_check[<?php echo $que_id; ?>]" id="a" class="answer" value="1" /> <span><?php echo $q_data[$i]['option_1']; ?></span>
                                            </label>
                                        </div>
                                        <div class="ans ml-2">
                                            <label class="radio"> <input type="radio" name="quiz_check[<?php echo $que_id; ?>]" id="a" class="answer" value="2" /> <span><?php echo $q_data[$i]['option_2']; ?></span>
                                            </label>
                                        </div>
                                        <div class="ans ml-2">
                                            <label class="radio"> <input type="radio" name="quiz_check[<?php echo $que_id; ?>]" id="a" class="answer" value="3" /> <span><?php echo $q_data[$i]['option_3']; ?></span>
                                            </label>
                                        </div>
                                        <div class="ans ml-2">
                                            <label class="radio"> <input type="radio" name="quiz_check[<?php echo $que_id; ?>]" id="a" class="answer" value="4" /> <span><?php echo $q_data[$i]['option_4']; ?></span>
                                            </label>
                                        </div>
                                    </div>
                            <?php }
                            } ?>



                        </div>
                        <div class="card-footer">
                            <div class="float-right">

                                <a class="btn btn-secondary" href="./">cancel</a>
                                <input class="btn btn-primary" name="submit" type="submit" value="Submit Now">


                            </div>
                        </div>
                    </div>

                    <!--/card-->
                </div>
            </div>
            <!--/row-->
        </div>
        <!--/col-->
    </div>
</form>

<!-- partial -->

</body>

</html>