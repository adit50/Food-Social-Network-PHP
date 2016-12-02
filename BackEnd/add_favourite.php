<?php
header('Access-Control-Allow-Origin:*');
session_start();
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
$id = $_GET['id'];
$know = "SELECT status , favourite FROM likes WHERE postid = '".$id."' AND userid = '".$_GET['sess_id']."' ";
$sr = mysqli_query($conn ,$know);
$numRowsLogin=mysqli_num_rows($sr);
if(!$numRowsLogin) {
$insert_favo = "INSERT INTO likes (postid , userid , favourite) VALUES ('".$id."' , '".$_GET['sess_id']."' , 1)" ;
if(mysqli_query($conn ,$insert_favo)) {
$notify = "INSERT INTO notification(userid , postid , status , time , date , h , i , s , d , m , y , a , mon , day , stamp) VALUES('".$_GET['sess_id']."' , '".$id."' , 'fav' , '".$mytime."' , '".$mydate."' , '".$hour."' , '".$minute."' , '".$second."' , '".$date."' , '".$month."' , '".$year."' , '".$am."' , '".$monName."' , '".$day."' , '".$time."')" ;
if(mysqli_query($conn ,$notify)) {
$new_notify = "UPDATE regvisitor SET new_notification = new_notification + 1 WHERE userid IN ( SELECT followers FROM frndlist WHERE userid = '".$_GET['sess_id']."' ) ";
if(mysqli_query($conn ,$new_notify)) {
$total_favo = "UPDATE regvisitor SET total_favourites = total_favourites + 1 WHERE userid = '".$_GET['sess_id']."' ";
if(mysqli_query($conn ,$total_favo)) {
echo 'Added favo';
}
else
{
echo 'Wrong';
}
}
}
}
}
else
{
$know = "SELECT status , favourite FROM likes WHERE postid = '".$id."' AND userid = '".$_GET['sess_id']."' ";
$sr = mysqli_query($conn ,$know);
$fet = mysqli_fetch_array($sr);
if($fet['favourite'] == 1) {
echo '';
}
else
{
$update_favo = "UPDATE likes SET favourite = favourite + 1 WHERE postid = '".$id."' AND userid = '".$_GET['sess_id']."' ";
if(mysqli_query($conn ,$update_favo)) {
$notify = "INSERT INTO notification(userid , postid , status , time , date , h , i , s , d , m , y , a , mon , day) VALUES('".$_GET['sess_id']."' , '".$id."' , 'fav' , '".$mytime."' , '".$mydate."' , '".$hour."' , '".$minute."' , '".$second."' , '".$date."' , '".$month."' , '".$year."' , '".$am."' , '".$monName."' , '".$day."')" ;
if(mysqli_query($conn ,$notify)) {
$new_notify = "UPDATE regvisitor SET new_notification = new_notification + 1 WHERE userid IN ( SELECT followers FROM frndlist WHERE userid = '".$_GET['sess_id']."' ) ";
if(mysqli_query($conn ,$new_notify)) {
$total_favo = "UPDATE regvisitor SET total_favourites = total_favourites + 1 WHERE userid = '".$_GET['sess_id']."' ";
if(mysqli_query($conn ,$total_favo)) {
echo 'Added favo';
}
else
{
echo 'Wrong';
}
}
}
}
}
}
?> 


