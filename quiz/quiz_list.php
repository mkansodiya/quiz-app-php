<?php include('header.php'); ?>
<div class="container">
    <h2>Available Exams</h2>
    <p>Please choose the exam you wanna attempt</p>
    <table class="table">
        <thead>

            <tr>
                <th>Class</th>
                <th>Exam Name</th>
                <th>Subject</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("../inc/db.php");
            $query = " SELECT * FROM papers";
            $res = mysqli_query($con, $query);
            while ($papers_data = mysqli_fetch_assoc($res)) {
                $paper_id = $papers_data['paper_id'];
                $paper_class = $papers_data['paper_class'];
                $exam_id = $papers_data['exam_id'];

                $q = "SELECT * FROM exams WHERE exam_id= '$exam_id'";
                $r = mysqli_query($con, $q);
                $exam_name = mysqli_fetch_assoc($r)['exam_name'];
                $paper_subject = $papers_data['paper_subject'];

            ?>
                <tr>
                    <td><?php echo $paper_class; ?></td>
                    <td><?php echo $exam_name; ?></td>
                    <td><?php echo $paper_subject; ?></td>
                    <td><a class="btn btn-success" href="../quiz/?paper_id=<?php echo $paper_id; ?>">Take Exam</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>

</html>