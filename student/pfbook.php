<?php
	require('dbconn.php');
?>
<?php
	extract ($_GET);
	$count=($count*20)+1;
	$sql="select * from LMS.book where BookId>=".$count." limit 20";
	$result=$conn->query($sql);
    if($result===TRUE){
	while($row=$result->fetch_assoc())
    {
        $bookid=$row['BookId'];
        $name=$row['Title'];
        $avail=$row['Availability'];
        $res=$bookid.'|'.$name.'|'.$avail.';';
        echo $res;
    }}
    else
    echo "error"
?> 
