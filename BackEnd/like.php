<?php
header('Access-Control-Allow-Origin:*');
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
$url = $_GET['id'];
include('db.php');
$know = "SELECT status FROM likes WHERE postid = '".$url."' AND userid = '".$_GET['sess_id']."' ";
$sr = mysqli_query($conn ,$know);
$numRowsLogin=mysqli_num_rows($sr);
if(!$numRowsLogin) {
$row = mysqli_fetch_array($sr);
if($row['status'] == 1) {
$query = "UPDATE likes SET status = status - 1 WHERE postid = '".$url."' AND userid = '".$_GET['sess_id']."' ";
if(mysqli_query($conn ,$query)) {
$update ="UPDATE post SET likes = likes - 1 WHERE id = '".$url."' ";
if(mysqli_query($conn ,$update)) {
$delnotify = "DELETE FROM notification WHERE postid = '".$url."' AND userid = '".$_GET['sess_id']."' AND status = 'likes' ";
if(mysqli_query($conn ,$delnotify)) {
echo 'Like';
}
}
}
}
else 
{
$Addpost = "INSERT INTO likes (postid , userid , status) VALUES ('".$url."' , '".$_GET['sess_id']."' , 1)" ;
if(mysqli_query($conn ,$Addpost)) {
$update ="UPDATE post SET likes = likes + 1 WHERE id = '".$url."' ";
if(mysqli_query($conn ,$update)) {
$notify = "INSERT INTO notification(userid , postid , status , time , date , h , i , s , d , m , y , a , mon , day , stamp) VALUES('".$_GET['sess_id']."' , '".$url."' , 'likes' , '".$mytime."' , '".$mydate."' , '".$hour."' , '".$minute."' , '".$second."' , '".$date."' , '".$month."' , '".$year."' , '".$am."' , '".$monName."' , '".$day."' , '".$time."')" ;
if(mysqli_query($conn ,$notify)) {
$new_notify = "UPDATE regvisitor SET new_notification = new_notification + 1 WHERE userid IN ( SELECT followers FROM frndlist WHERE userid = '".$_GET['sess_id']."' ) OR userid IN ( SELECT friend FROM frndlist WHERE userid = '".$_GET['sess_id']."' ) ";
if(mysqli_query($conn ,$new_notify)) {
echo 'Unlike';
}
}
}
}
else
{
echo "wrong";
}
}
}
else
{
$chk ="SELECT * FROM likes WHERE postid = '".$url."' AND userid = '".$_GET['sess_id']."' ";
$rs = mysqli_query($conn ,$chk);
$row =mysqli_fetch_array($rs);
if($row['status'] == 1) {
$query = "UPDATE likes SET status = status - 1 WHERE postid = '".$url."' AND userid = '".$_GET['sess_id']."' ";
if(mysqli_query($conn ,$query)) {
$update ="UPDATE post SET likes = likes - 1 WHERE id = '".$url."' ";
if(mysqli_query($conn ,$update)) {
$delnotify = "DELETE FROM notification WHERE postid = '".$url."' AND userid = '".$_GET['sess_id']."' AND status = 'likes' ";
if(mysqli_query($conn ,$delnotify)) {
echo 'Like';
}
}
}
}
else
{
$update_likes = "UPDATE likes SET status = status + 1 WHERE postid = '".$url."' AND userid = '".$_GET['sess_id']."' ";
if(mysqli_query($conn ,$update_likes)) {
$update = "UPDATE post SET likes = likes + 1 WHERE id = '".$url."' ";
if(mysqli_query($conn ,$update)) {
$update_notify =  "INSERT INTO notification(userid , postid , status , time , date , h , i , s , d , m , y , a , mon , day , stamp) VALUES('".$_GET['sess_id']."' , '".$url."' , 'likes' , '".$mytime."' , '".$mydate."' , '".$hour."' , '".$minute."' , '".$second."' , '".$date."' , '".$month."' , '".$year."' , '".$am."' , '".$monName."' , '".$day."' , '".$time."')" ;
if(mysqli_query($conn ,$update_notify)) {
$new_notify = "UPDATE regvisitor SET new_notification = new_notification + 1 WHERE userid IN ( SELECT followers FROM frndlist WHERE userid = '".$_GET['sess_id']."' ) OR userid IN ( SELECT friend FROM frndlist WHERE userid = '".$_GET['sess_id']."' ) ";
if(mysqli_query($conn ,$new_notify)) {
echo 'Unlike';
}
}
}
}
else
{
echo 'Wrong';
}
}
}
?>

