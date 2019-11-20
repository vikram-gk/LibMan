<?php
require('dbconn.php');
?>

<?php
if ($_SESSION['RollNo']) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LibMan</title>
<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
<link type="text/css" href="css/theme.css" rel="stylesheet">
<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
rel='stylesheet'>
</head>
<body>
<div class="navbar navbar-fixed-top">
<div class="navbar-inner">
<div class="container">
<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
<i class="icon-reorder shaded"></i></a><a class="brand" href="index.php">LibMan </a>
<div class="nav-collapse collapse navbar-inverse-collapse">
<ul class="nav pull-right">
<li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
<img src="images/user.png" class="nav-avatar" />
<b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="index.php">Your Profile</a></li>
<!--li><a href="#">Edit Profile</a></li>
<li><a href="#">Account Settings</a></li-->
<li class="divider"></li>
<li><a href="logout.php">Logout</a></li>
</ul>
</li>
</ul>
</div>
<!-- /.nav-collapse -->
</div>
</div>
<!-- /navbar-inner -->
</div>
<!-- /navbar -->
<div class="wrapper">
<div class="container">
<div class="row">
<div class="span3">
<div class="sidebar">
<ul class="widget widget-menu unstyled">
<li class="active"><a href="index.php"><i class="menu-icon icon-home"></i>Home
</a></li>
<li><a href="message.php"><i class="menu-icon icon-inbox"></i>Messages</a>
</li>
<li><a href="book.php"><i class="menu-icon icon-book"></i>All Books </a></li>
<li><a href="history.php"><i class="menu-icon icon-tasks"></i>Previously Borrowed Books </a></li>
<li><a href="recommendations.php"><i class="menu-icon icon-list"></i>Recommend Books </a></li>
<li><a href="current.php"><i class="menu-icon icon-list"></i>Currently Issued Books </a></li>
</ul>
<ul class="widget widget-menu unstyled">
<li><a href="books_for_you.php"><i class="menu-icon icon-book"></i>Books For You</a></li>
<li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
</ul>
</div>
<!--/.sidebar-->
</div>
<!--/.span3-->
<div class="span9">
<form class="form-horizontal row-fluid" action="book.php" method="post" style="visibility: hidden">
<div class="control-group">
<label class="control-label" for="Search"><b>Search:</b></label>
<div class="controls">
<input type="text" id="title" name="title" placeholder="Enter Name/ID of Book" class="span8" required>
<button type="submit" name="submit"class="btn">Search</button>
</div>
</div>
</form>
<br>
<?php
$rollno = $_SESSION['RollNo'];
$sql="select * from LMS.record,LMS.book where RollNo = '$rollno' and Date_of_Issue is NOT NULL and book.Bookid = record.BookId";
$result=$conn->query($sql);
$rowcount=mysqli_num_rows($result);
if(!($rowcount))
$sql="select * from LMS.book order by Availability DESC";
else
{
    $sql="select * from (select BookId from LMS.record where record.RollNo in (select RollNo from LMS.record where BookId in (select BookId from LMS.record where RollNo = '$rollno')) group by BookId order by count(*) desc) as rec,LMS.book where rec.BookId = book.Bookid";
}
$result=$conn->query($sql);
$rowcount=mysqli_num_rows($result);

if(!($rowcount))
echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
else
{


?>
<table class="table" id = "tables">
<thead>
<tr>
<th>Book name</th>
<th>Year</th>
<th>Availability</th>
<th><center>Options</center></th>
</tr>
</thead>
<tbody>
<?php

//$result=$conn->query($sql);
while($row=$result->fetch_assoc())
{
$name=$row['Title'];
$year=$row['Year'];
$bookid=$row['BookId'];
$avail=$row['Availability'];
?>
<tr>
<td><?php echo $name ?></td>
<td><?php echo $year ?></td>
<td><b><?php
if($avail > 0)
echo "<font color=\"green\">AVAILABLE</font>";
else
echo "<font color=\"red\">NOT AVAILABLE</font>";

?>

</b></td>
<td><center><a href="bookdetails.php?id=<?php echo $bookid; ?>" class="btn btn-primary" >Details</a>
<?php
//$aux=0;
if($avail > 0)
//$aux=1;
echo "<a href=\"issue_request.php?id=".$bookid."\" class=\"btn btn-success\">Issue</a>";
// if(aux==1)
//    echo" issue_sent()";

?>
</center></td>
</tr>
<?php }} ?>
</tbody>
</table>
</div>
<!--/.span3-->
<!--/.span9-->

<!--/.span3-->
<!--/.span9-->
</div>
<!--/.span9-->
</div>
</div>
<!--/.container-->
<div class="footer">
<div class="container">
<b class="copyright">&copy; 2019 LibMan Library Management System. All Rights Reserved
</div>
</div>

<!--/.wrapper-->
<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
<script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
<script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="scripts/common.js" type="text/javascript"></script>

</body>

</html>

<?php }
else {
echo "<script type='text/javascript'>('Access Denied!!!')</script>";
} ?>


