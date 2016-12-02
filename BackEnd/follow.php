<?php
header('Access-Control-Allow-Origin:*');
session_start();
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
$id = $_GET['id'];
include('db.php');
$chk = "SELECT * FROM frndlist WHERE followers = '".$_GET['sess_id']."' AND userid = '".$id."' ";
$qry = mysqli_query($conn ,$chk);
$num = mysqli_num_rows($qry);
if($num) {
echo "You are already following";
}
else
{
$add_follow= "INSERT INTO frndlist(followers , userid) VALUES('".$_GET['sess_id']."' , '".$id."')";
if(mysqli_query($conn ,$add_follow)) {
$total_follow = "UPDATE regvisitor SET total_followers =  total_followers + 1 WHERE userid ='".$id."' ";
if(mysqli_query($conn ,$total_follow)) {
$total_following= "UPDATE regvisitor SET total_following =  total_following + 1 WHERE userid ='".$_GET['sess_id']."' ";
if(mysqli_query($conn ,$total_following)) {
$notify = "INSERT INTO notification(userid , friend , status , time , date , h , i , s , d , m , y , a , mon , day , stamp) VALUES('".$_GET['sess_id']."' , '".$id."' , 'follow' , '".$mytime."' , '".$mydate."' , '".$hour."' , '".$minute."' , '".$second."' , '".$date."' , '".$month."' , '".$year."' , '".$am."' , '".$monName."' , '".$day."' , '".$time."')" ;
if(mysqli_query($conn ,$notify)) {
$new_notify = "UPDATE regvisitor SET new_notification = new_notification + 1 WHERE userid IN ( SELECT userid FROM frndlist WHERE followers = '".$_GET['sess_id']."' ) OR userid IN ( SELECT followers FROM frndlist WHERE userid = '".$_GET['sess_id']."' ) ";
if(mysqli_query($conn ,$new_notify)) {
echo 'following';
}
else
{
echo "Wrong";
}
}
}
}
}
}
?>
