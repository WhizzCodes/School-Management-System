<?php
$server='localhost';
$username='root';
$password='';
$db_name='school_management';

$conn = mysqli_connect($server,$username,$password,$db_name);
if(!$conn)
{
    die("Error connecting to database.");
}
?>