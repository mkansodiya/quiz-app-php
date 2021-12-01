<?php include("header.php"); ?>
<?php include("navigation.php") ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Data Table Example
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Result ID</th>
                                <th>Student Name</th>
                                <th>Exam ID</th>
                                <th>Paper ID</th>
                                <th>Total Marks</th>
                                <th>Marks Obtained</th>
                                <th>Certificate</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Result ID</th>
                                <th>Student ID</th>
                                <th>Exam ID</th>
                                <th>Paper ID</th>
                                <th>Total Marks</th>
                                <th>Marks Obtained</th>
                                <th>Certificate</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM results";
                            $res = mysqli_query($con, $query);
                            while ($result_data = mysqli_fetch_assoc($res)) {
                                $student_id = $result_data['result_student_id'];
                                $res_hash = $result_data['result_hash'];

                                $query1 = "SELECT * FROM students WHERE student_id= '$student_id'";
                                $res1 =  mysqli_query($con, $query1);
                                $st_data = mysqli_fetch_assoc($res1);
                                $student_name = $st_data['student_name'];
                                // echo mysqli_fetch_assoc($res)['student_name'];

                            ?>
                                <tr>
                                    <td><?php echo $result_data['result_id']; ?></td>
                                    <td><?php echo $student_name; ?></td>
                                    <td><?php echo $result_data['exam_id']; ?></td>
                                    <td><?php echo $result_data['exam_paper_id']; ?></td>
                                    <td><?php echo $result_data['total_marks']; ?></td>
                                    <td><?php echo $result_data['marks_obtained']; ?></td>
                                    <td><a target="_blank" href="../quiz/result.php?result_uid=<?php echo $res_hash; ?>">Download Certificate</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>