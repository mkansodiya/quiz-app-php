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
                                <th>Paper ID</th>
                                <th>Paper Name</th>
                                <th>Paper Subject</th>
                                <th>Paper Class</th>
                                <th>Paper Author</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Paper ID</th>
                                <th>Exam Name</th>
                                <th>Paper Subject</th>
                                <th>Paper Class</th>
                                <th>Paper Author</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM papers";
                            $res = mysqli_query($con, $query);
                            while ($papers_data = mysqli_fetch_assoc($res)) {
                                $paper_id = $papers_data['paper_id'];
                                $paper_name = $papers_data['paper_name'];
                                $paper_subject = $papers_data['paper_subject'];
                                $paper_class = $papers_data['paper_class'];
                                $paper_author = $papers_data['paper_author'];
                                $exam_id = $papers_data['exam_id'];

                                $q1 = "SELECT * FROM exams WHERE exam_id= $exam_id ";
                                $res1 = mysqli_query($con, $q1);
                                $exam_name = mysqli_fetch_assoc($res1)['exam_name'];


                            ?>
                                <tr>
                                    <td><?php echo $paper_id; ?></td>
                                    <td><?php echo $exam_name; ?></td>
                                    <td><?php echo $paper_subject; ?></td>
                                    <td><?php echo $paper_class; ?></td>
                                    <td><?php echo $paper_author; ?></td>
                                    <td><a href="">Edit Paper</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>