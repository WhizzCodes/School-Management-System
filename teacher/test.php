<?php
require "../partials/config.php";
$folder ="../uploads/upload_attendance/meeting_saved_chat.txt";

$file = fopen($folder,"r");

$date = date("Y-m-d");

while (!feof($file))
    {
        $content = fgets($file);
        $carray = explode(" ",$content);
        list($time,$string2,$string3,$sid,$string5,$string6,$string7,$string8,$string9,$status) = $carray;
        $sql = "INSERT INTO `attendance`(`sid`, `date`, `status`) VALUES ($sid,'$date','$status')";
        echo $sql;
        $run = mysqli_query($conn,$sql);
        if ($run) {
            echo "Assignment Posted Successfully";
        } else {
            echo "Assignment Post UnSuccessful";
        }
    }
fclose($file);

?>