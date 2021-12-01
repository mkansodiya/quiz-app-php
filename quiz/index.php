<?php include('header.php'); ?>
<?php
// $files = glob('certificate/certs/*');

// foreach ($files as $file) { // iterate files
// if file creation time is more than 5 minutes
// if ((time() - filectime($file)) > 10) {  // 86400 = 60*60*24
//     unlink($file);
//   }
// }
if (isset($_GET['paper_id'])) {
  $paper_id = $_GET['paper_id'];

  $query = "SELECT * FROM questions WHERE paper_id= $paper_id";
  $res = mysqli_query($con, $query);
  $paper_count = mysqli_num_rows($res);
  if ($paper_count < 1) {
    include("quiz_list.php");
  } else {
    include("quiz.php");
  }
} else {
  include("quiz_list.php");
}
