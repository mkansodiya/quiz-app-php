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
                                <th>Full Name</th>
                                <th>Email</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Full Name</th>
                                <th>Email</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM users WHERE user_role= 'staff'";
                            $res = mysqli_query($con, $query);
                            while ($staff_data = mysqli_fetch_assoc($res)) {


                            ?>
                                <tr>
                                    <td><?php echo $staff_data['user_full_name']; ?></td>
                                    <td><?php echo $staff_data['user_email']; ?></td>


                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>