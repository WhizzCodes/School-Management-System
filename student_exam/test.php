<?php

require "../partials/config.php";
echo "Hello";
$sql1 = "select * from questions where exam_id = 3";
$result1=mysqli_query($conn,$sql1);

print_r ($result1);

?>