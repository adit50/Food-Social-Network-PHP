<?php
header('Access-Control-Allow-Origin:*');
if(isset($_POST['share'])) {
include('db.php');
$mydate = date("Y-m-d");
$mytime = date("h:i:sa");
$hour = date("h");
$minute = date("i");
$second = date("s");
$date = date("d");
$month = date("m");
$year = date("Y");
$am = date("a");
$monName = date("M");
$day = date("D");
$z = 1;
$time = time();
$strSQL = "SELECT userid , fname , lname FROM regvisitor WHERE userid = '".$_GET['sess_id']."' ";
$rs = mysqli_query($conn ,$strSQL);
while($rows = mysqli_fetch_array($rs)) {
$strSQL = "SELECT * FROM post WHERE id = '".$_GET['id']."' ";
$rs = mysqli_query($conn ,$strSQL);
while($row = mysqli_fetch_array($rs)) {
$addpost = "INSERT INTO comment (postid , userid , comments , fname , lname) VALUES ('".$row['id']."', '".$_GET['sess_id']."' ,  '".mysqli_real_escape_string($conn ,$_POST['share'])."', '".$rows['fname']."','".$rows['lname']."')";
if(mysqli_query($conn ,$addpost)) {
$update = "UPDATE post SET comments = comments + 1 WHERE id = '".$_GET['id']."' ";
if(mysqli_query($conn ,$update)) {
$notify ="INSERT INTO notification(userid , postid , status , time , date , h , i , s , d , m , y , a , mon , day , stamp) VALUES('".$_GET['sess_id']."' , '".$_GET['id']."' , 'comment' , '".$mytime."' , '".$mydate."' , '".$hour."' , '".$minute."' , '".$second."' , '".$date."' , '".$month."' , '".$year."' , '".$am."' , '".$monName."' , '".$day."' , '".$time."')" ;
if(mysqli_query($conn ,$notify)) {
$new_notify = "UPDATE regvisitor SET new_notification = new_notification + 1 WHERE userid IN ( SELECT followers FROM frndlist WHERE userid = '".$_GET['sess_id']."' ) ";
if(mysqli_query($conn ,$new_notify)) {
echo 'ok';
}
}
}
}
}
}
}
?>