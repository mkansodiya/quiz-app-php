<?php include('header.php'); ?>
<style>
    label {
        margin-right: 10px;
    }
</style>


<?php
echo $_SESSION["paper_name"];
$created_paper_hash = $_SESSION["paper_hash"];
echo $created_paper_hash;

$query = "SELECT * FROM papers WHERE paper_hash= '$created_paper_hash'";
$res = mysqli_query($con, $query);
$paper_data = mysqli_fetch_assoc($res);
$paper_id = $paper_data['paper_id'];
echo $paper_id;

if (mysqli_num_rows($res) < 1) {

    include("./create_paper.php");
    die("");
}





if (isset($_POST['create_question'])) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $que_hash = '';
    for ($i = 0; $i < 11; $i++) {
        $que_hash .= $characters[rand(0, $charactersLength - 1)];
    }

    echo ' ';

    $question = $_POST['question'];
    $option_1 = $_POST['option_1'];
    $option_2 = $_POST['option_2'];
    $option_3 = $_POST['option_3'];
    $option_4 = $_POST['option_4'];
    $right_option = $_POST['right_option'];

    $query1 = "INSERT INTO `questions` (`paper_id`,`que_hash`, `exam_id`, `que_content`, `option_1`,`option_2`,`option_3`,`option_4`,`que_subject`, `right_option`) VALUES ('$paper_id','$que_hash', '1', '$question','$option_1','$option_2','$option_3','$option_4', 'GK', '$right_option')";
    $res1 = mysqli_query($con, $query1);

    header("location: #");
}

?>


<!-- partial:index.partial.html -->




<div class="text-center">

    <form action="" method="post">

        <input class="btn btn-primary" name="final_submit" type="submit" value="Submit Paper">
    </form>

</div>
<?php
if (isset($_POST['final_submit'])) {
    $_SESSION["paper_name"] = "";
    $_SESSION["paper_hash"] = "";
    header("location: #");
}
?>


<form action="" id="create_ticket" method="post">
    <div class="container py-3">

        <div class="row">
            <div class="col-md-12">


                <hr class="mb-4">
                <div class="row justify-content-center">

                    <?php if (isset($_GET['q_status'])) {
                        echo "<h1 style='text-align: center;'>Question added successfully</h1>";
                    } ?>
                    <div class="col-md-10 offset-md-1">
                        <span class="anchor" id="formComplex"></span>
                        <hr class="my-5">
                        <!-- form complex example -->
                        <div class="card card-outline-secondary">
                            <div class="card-header">
                                <h3 class="mb-0">Publish a question</h3>
                            </div>

                            <div class="card-body">
                                <div class="row mt-4">
                                    <div class="form col-sm-12 pb-3">
                                        <label for="exampleAccount" class="col-form-label">Enter question:</label>
                                        <input class="form-control" name="question" id="exampleAccount" value="<?php echo $c_mobile; ?>" placeholder="Enter question" type="text">


                                    </div>

                                    <div class="form-group form-inline col-sm-8 pb-3">
                                        <label class="col-form-label" style="margin: left 10px;" for="exampleCtrl">Option 1: </label>
                                        <input class="form-control" name="option_1" value="<?php echo $c_email; ?>" id="exampleCtrl" placeholder="Option" type="text">
                                    </div>
                                    <div class="form-group form-inline col-sm-8 pb-3">
                                        <label style="margin: left 10px;" for="exampleCtrl">Option 2: </label>
                                        <input class="form-control" name="option_2" value="<?php echo $c_email; ?>" id="exampleCtrl" placeholder="Option" type="text">
                                    </div>
                                    <div class="form-group form-inline col-sm-8 pb-3">
                                        <label style="margin: left 10px;" for="exampleCtrl">Option 3: </label>
                                        <input class="form-control" name="option_3" value="<?php echo $c_email; ?>" id="exampleCtrl" placeholder="Option" type="text">
                                    </div>
                                    <div class="form-group form-inline col-sm-8 pb-3">
                                        <label style="margin: left 10px;" for="exampleCtrl">Option 4: </label>
                                        <input class="form-control" name="option_4" value="<?php echo $c_email; ?>" id="exampleCtrl" placeholder="Option" type="text">
                                    </div>
                                    <div class=" col-sm-8 pb-3">
                                        <label for="exampleAccount">Choose right option:</label>
                                        <select class="form-control" name="right_option" id="">
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                            <option value="4">Option 4</option>
                                        </select>


                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-right">

                                    <a class="btn btn-secondary" href="http://localhost/todo/">cancel</a>
                                    <input class="btn btn-primary" name="create_question" type="submit" value="Add Question">


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
<!--/row-->
</div>

<!--/container-->


<!-- Scroll to Top -->
<a id="scroll-to-top" href="#" class="btn btn-primary btn-lg" role="button" title="Return to top of page" data-toggle="tooltip" data-placement="left"><i class="fa fa-arrow-up"></i></a>
<!-- partial -->

<script>
    let form = document.getElementById("create_ticket");

    form.onsubmit = function() {
        // document.getElementById("confirm").classList.remove('hidden');
        document.getElementById("confirm").style.visibility = "block";
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js'></script>
<script src="./script.js"></script>

</body>

</html>