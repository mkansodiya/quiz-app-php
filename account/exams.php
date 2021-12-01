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
                                <th>Exam Name</th>
                                <th>Last Date</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Exam Name</th>
                                <th>Last Date</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM exams";
                            $res = mysqli_query($con, $query);
                            while ($exam_data = mysqli_fetch_assoc($res)) {


                            ?>
                                <tr>
                                    <td><?php echo $exam_data['exam_name']; ?></td>
                                    <td><?php echo $exam_data['exam_last_date']; ?></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>