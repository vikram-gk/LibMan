<?php
require('dbconn.php');

$bookname=$_GET['id1'];

$rollno=$_GET['id2'];

$sql="delete from LMS.recommendations where Book_Name='$bookname' and RollNo='$rollno' ";

if($conn->query($sql) === TRUE)
{
echo "<script type='text/javascript'></script>";
header( "Refresh:0.01; url=recommendations.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:0.01; url=recommendations.php", true, 303);

}

?>