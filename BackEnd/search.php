<?php
header('Access-Control-Allow-Origin:*');
session_start();
include('db.php');
if(isset($_POST['peo'])) {
$nam = $_POST['peo'];
if($nam == ''){
echo '<font color="green">Type a name to search...</font><br/><br/>';
echo '<b><font color="black" size="1">Cookzz @ 2015. All Rights Reserved.</font></b>';
}
else
{
$str = "SELECT * FROM regvisitor WHERE fname LIKE '%".$nam."%' OR lname LIKE '%".$nam."%' OR emailid LIKE '%".$nam."%' ";
$rs = mysqli_query($conn ,$str);
$chk = mysqli_num_rows($rs);
if(!$chk) {
echo '<font color="#BD1717"><b> Result not found</b></font><br/>';
echo '<b><font color="black" size="1">Cookzz @ 2015. All Rights Reserved.</font></b>';
}
else
{
while($rows = mysqli_fetch_array($rs)) {
echo '<span style="vertical-align:middle;">';
echo '<img src="http://cookzz.in/'.$rows['profile_pic'].'" style="height:60px; width:70px; vertical-align:middle;"><span style="padding-left:10%"><a href="#" id='.$rows['userid'].' name="'.$rows['fname'].' '.$rows['lname'].'" class="viewprofile" style="text-decoration:none; width:100%;"><font size="3">'.$rows['fname'].' '.$rows['lname'].'</font></a><br/>'; 
echo '<hr size="2" style="background-color:#DA2121;">';
echo '</span>';
}
echo '<b><font color="black" size="1">Cookzz &copy; 2015. All Rights Reserved.</font></b>';
}
}
}
?>