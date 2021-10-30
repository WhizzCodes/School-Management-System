<?php

require "../partials/config.php";

$exam_id = 2;
$question = "What is your name?";
$option[0] = "apple";
$option[1] = "banana";
$option[2] = "cat";
$option[3] = "doll";
$correctoption = "banana";
$marks = 2;

$answer = serialize($option);

// $sql = "INSERT INTO `questions`(`exam_id`, `question`, `answer`, `correct_answer`, `marks`) VALUES ($exam_id,'$question','$answer','$correctoption',$marks)";

// echo $sql;
// $run = mysqli_query($conn,$sql);
// if ($run) {
//     echo "Question Posted Successfully";
// } else {
//     echo "Question Posted Unsuccessfully";
// }

$sql1 = "select * from questions where exam_id = 2";
$result = mysqli_query($conn,$sql1);

while($row = mysqli_fetch_assoc($result))
{
    echo $row['id']."<pre>";
    echo $row['exam_id']."<pre>";
    echo $row['question']."<pre>";
    echo $row['correct_answer']."<pre>";
    $answer1 = unserialize($row['answer']);
    $c = 0;
    while($c < count($answer1))
    {
        echo $answer1[$c];
        echo "</pre>";
        $c++;
    }
}

?>