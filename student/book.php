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
    <body  onload="init()">
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
                                <li><a href="recommendations.php"><i class="menu-icon icon-list"></i>Suggest Books </a></li>
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
                        <p id="respBox"></p>
                        <?php
                            $roll=$_SESSION['RollNo'];
                            $sql="select * from LMS.book limit 15";
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
                                      <th>Book id</th>
                                      <th>Book name</th>
                                      <th>Availability</th>
                                      <th><center>Options</center></th>
                                    </tr>
                            </thead>
                            <tbody>
                            <?php
                                while($row=$result->fetch_assoc())
                                {
                                    $bookid=$row['BookId'];
                                    $name=$row['Title'];
                                    $avail=$row['Availability'];
                                ?>
                                    <tr>
                                      <td><?php echo $bookid ?></td>
                                      <td><?php echo $name ?></td>
                                      <td><b>
                                    <?php 
                                        if($avail > 0)
                                          echo "<font color=\"green\">AVAILABLE</font>";
                                        else
                                        echo "<font color=\"red\">NOT AVAILABLE</font>";

                                    ?>
                                                
                                     </b></td>
                                      <td><center><a href="bookdetails.php?id=<?php echo $bookid; ?>" class="btn btn-primary" >Details</a>
                                        <?php
                                        if($avail > 0)
                                            //$aux=1;
                                            {
                                            echo "<a href=\"issue_request.php?id=".$bookid."\" class=\"btn btn-success\">Issue</a>";
//                                                $sql="insert into LMS.record (RollNo,BookId,Time) values ('$roll','$bookid', curtime())";
//                                                if($conn->query($sql) === TRUE)
//                                                    echo "<a onClick=\"succ('Request Sent Successfully','green')\" class=\"btn btn-success\">Issue</a>";
//                                                else
//                                                    echo "<a onClick=\"succ('Request has already been send','red')\" class=\"btn btn-success\">Issue</a>";
                                                
                                            }
                                        ?>
                                        </center></td>
                                    </tr>
                               <?php }} ?>
                               </tbody>
                                </table>
                            </div>
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

<script type="text/javascript">
function succ(message,color){
    var respBox=document.getElementById('respBox');
    respBox.innerHTML=message;
    respBox.style.color=color;
}

    function init(){
           window.onscroll=obj.getContent;
            scrollAmt=200;
            count=1;
            obj.getContent();
        } 
        var obj={
            xhr:new XMLHttpRequest(),
            getContent:function(){
                //console.log(document.documentElement.scrollTop);
                if (document.documentElement.scrollTop>scrollAmt){
                    console.log("fuuuuccckkk");
                    obj.xhr.onreadystatechange=obj.showContent;
                    obj.xhr.open("GET","http://localhost/LibMan/student/pfbook.php?count="+count,true);
                    obj.xhr.send();
                }
            },
            showContent:function(){
                if (this.readyState==4 && this.status==200){ 
                   console.log (this.responseText);
                   var table=document.getElementById('tables');
                   var res=this.responseText.split(";");
                   var i=0;
                   var len=res.length;
                   while(i<len-1){
                        var items=res[i].split("|");
                        var row=document.createElement('tr');
                        var id=document.createElement('td');
                        id.innerHTML=items[0];
                        var name=document.createElement('td');
                        name.innerHTML=items[1];

                        var button=document.createElement('td');
                        var center=document.createElement('center');
                        var detbtn=document.createElement('a');
                        detbtn.href="bookdetails.php?id="+items[0];
                        detbtn.className="btn btn-primary";
                        detbtn.style.marginRight="5px";
                        detbtn.innerHTML="Details";
                        center.appendChild(detbtn);
                        var avail=document.createElement('td');
                        avail.style.fontWeight="bold";
                        if(parseInt(items[2])){
                            avail.innerHTML="AVAILABLE";
                            avail.style.color="green";
                            var issuebtn=document.createElement('a');
                            issuebtn.href="issue_request.php?id="+items[0];
                            issuebtn.className="btn btn-success";
                            issuebtn.innerHTML="Issue";
                            center.appendChild(issuebtn);
                        }
                        else{
                            avail.innerHTML=" NOT AVAILABLE";
                            avail.style.color="red";
                        }
                        
                        button.appendChild(center);
                        row.appendChild(id);
                        row.appendChild(name);
                        row.appendChild(avail);
                        row.appendChild(button);
                        i=i+1;
                        table.appendChild(row);
                   }
                    scrollAmt+=document.documentElement.scrollTop;
                    count=count+1;
                }
            }
        }
</script>

