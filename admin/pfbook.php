<?php
	require('dbconn.php');
	extract ($_GET);
	clearstatcache();
	$count=($count*20)+1;
	$sql="select * from LMS.book where BookId>=".$count." limit 20";
	$result=$conn->query($sql);
	while($row=$result->fetch_assoc())
    {
        $bookid=$row['BookId'];
        $name=$row['Title'];
        $avail=$row['Availability'];
        $res=$bookid.'|'.$name.'|'.$avail.';';
        echo $res;
    }
?> 