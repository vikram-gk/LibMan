  <?php
require('dbconn.php');

$message=$_GET['id1'];

$sql="delete from LMS.message where Msg='$message' ";

if($conn->query($sql) === TRUE)
{
echo "<script type='text/javascript'></script>";
header( "Refresh:0.01; url=message.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:0.01; url=message.php", true, 303);

}

?>