<div class="row">
    <div class="col-md-12">

        <hr class="mb-4">
        <div class="row justify-content-center">
            <?php
            if (isset($_GET['paper_id'])) {
                $paper_id = $_GET['paper_id'];
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

                    while ($q_data = mysqli_fetch_all($res, MYSQLI_ASSOC)) {

                        for ($i = 0; $i < $q_count; $i++) {
                            $que_id = $q_data[$i]['que_id'];
                            $q_index = $i + 1;

                    ?>
                            <div class="col-md-12 question bg-white p-3 border-bottom">
                                <div class="d-flex flex-row align-items-center question-title">
                                    <h3 class="text-danger">Q. <?php echo "<a>$q_index</a>"; ?></h3>
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

                        <a class="btn btn-secondary" href="http://localhost/todo/">cancel</a>
                        <input class="btn btn-primary" name="submit" type="submit" value="Submit Now">


                    </div>
                </div>
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