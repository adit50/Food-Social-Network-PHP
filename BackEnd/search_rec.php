<?php
header('Access-Control-Allow-Origin:*');
session_start();
include('db.php');
if(isset($_POST['rec'])) {
$nam = $_POST['rec'];
if($nam == ''){
echo '<font color="green">Type a recipe to search...</font><br/><br/>';
echo '<b><font color="black" size="1">Cookzz @ 2015. All Rights Reserved.</font></b>';
}
else
{
$str = "SELECT * FROM post WHERE title LIKE '%".$nam."%' ";
$rs = mysqli_query($conn ,$str);
$chk = mysqli_num_rows($rs);
if(!$chk) {
echo '<font color="#BD1717"><b> Result not found</b></font><br/>';
echo '<b><font color="black" size="1">Cookzz @ 2015. All Rights Reserved.</font></b>';
}
else
{
while($rows = mysqli_fetch_array($rs)) {
echo '<div align="left">';
if(file_exists($rows['image'])) {
echo '<span>';
echo '<img src="http://cookzz.in/'.$rows['image'].'" style="height:60px; width:80px; vertical-align:middle;"><span style="padding-left:5%;"><a href="#" id='.$rows['id'].' class="viewpost" style="text-decoration:none; width:100%;"><font size="4">'.$rows['title'].'</font></a>'; 
echo '<hr size="2" style="background-color:#DA2121;">';
echo '</span>';
}
else
{
echo '<span>';
echo '<img src="http://cookzz.in/images/logo.png" style="height:60px; width:80px; vertical-align:middle;"><span style="padding-left:5%;"><a href="#" id='.$rows['id'].' class="viewpost" style="text-decoration:none; width:100%;"><font size="4">'.$rows['title'].'</font></a>'; 
echo '<hr size="2" style="background-color:#DA2121;">';
echo '</span>';
}
}
echo '<b><font color="black" size="1">Cookzz &copy; 2015. All Rights Reserved.</font></b>';
}
}
}
?>