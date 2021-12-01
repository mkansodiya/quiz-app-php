<?php include('header.php'); ?>
<div class="container py-3 m-auto text-center">

    <?php
    if (isset($_GET['result_uid'])) {
        $result_uid = $_GET['result_uid'];
    } else {
        header("location: quiz_list.php");
    }
    ?>
</div>
<form action="certificate" method="get">
    <input hidden type="text" value="<?php echo $result_uid; ?>" name="res_id">
    <div class="container py-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Total Questions</th>
                    <th>Attempted</th>
                    <th>Right answers</th>
                    <th>Marks</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $query = "SELECT * FROM results WHERE result_hash= '$result_uid'";
                $res = mysqli_query($con, $query);
                $res_data = mysqli_fetch_assoc($res);
                if ($result_uid == "") {
                    header("location: quiz_list.php");
                } elseif (mysqli_num_rows($res) == 0) {
                    header("location: quiz_list.php");
                }
                ?>
                <tr>
                    <td><?php echo $res_data['total_questions']; ?></td>
                    <td><?php echo $res_data['attempted_questions']; ?></td>
                    <td><?php echo $res_data['right_answers']; ?></td>
                    <td><?php echo $res_data['marks_obtained']; ?></td>
                </tr>

            </tbody>
        </table>

        <input type="submit" value="Download Certificate" name="cert" class="btn btn-success">

    </div>
</form>
</body>

</html>