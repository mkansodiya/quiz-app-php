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
                                <th>Name</th>
                                <th>Class</th>
                                <th>Roll number</th>
                                <th>Email</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Roll number</th>
                                <th>Email</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM students";
                            $res = mysqli_query($con, $query);
                            while ($student_data = mysqli_fetch_assoc($res)) {


                            ?>
                                <tr>
                                    <td><?php echo $student_data['student_name']; ?></td>
                                    <td><?php echo $student_data['student_class']; ?></td>
                                    <td><?php echo $student_data['student_roll_no']; ?></td>
                                    <td><?php echo $student_data['student_email']; ?></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>