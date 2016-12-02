<?php
header('Access-Control-Allow-Origin:*');
if (isset($_GET['message'])) {
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
include('db.php');
$add="INSERT INTO messages(userid , friend , message , time , date , h , i , s , d , m , y , a , mon , day , stamp) VALUES ('".$_GET['sess_id']."' , '".$_GET['id']."' , '".mysqli_real_escape_string($conn ,$_GET['message'])."' , '".$mytime."' , '".$mydate."' , '".$hour."' , '".$minute."' , '".$second."' , '".$date."' , '".$month."' , '".$year."' , '".$am."' , '".$monName."' , '".$day."' , '".$time."') ";
if(mysqli_query($conn ,$add) or die(mysqli_error($conn))) {
$chk ="SELECT * FROM message_list WHERE userid = '".$_GET['sess_id']."' AND friend = '".$_GET['id']."' ";
$rs=mysqli_query($conn ,$chk);
$numRows=mysqli_num_rows($rs);
if(!$numRows) {
$insert = "INSERT INTO message_list(userid , friend) VALUES ('".$_GET['sess_id']."' , '".$_GET['id']."')";
if(mysqli_query($conn ,$insert)) {
$inserts = "INSERT INTO message_list(friend , userid) VALUES ('".$_GET['sess_id']."' , '".$_GET['id']."')";
if(mysqli_query($conn ,$inserts)) {
$sel ="SELECT * FROM message_list WHERE friend = '".$_GET['sess_id']."' AND userid = '".$_GET['id']."' ";
$select = mysqli_query($conn ,$sel);
while($row = mysqli_fetch_array($select)) {
if($row['msg_unread'] < 1) {
$newmessage ="UPDATE regvisitor SET new_message = new_message + 1 WHERE userid = '".$_GET['id']."' ";
if(mysqli_query($conn ,$newmessage)) {
$msgunread ="UPDATE message_list SET msg_unread = msg_unread + 1 WHERE userid = '".$_GET['id']."' AND friend = '".$_GET['sess_id']."' ";
if(mysqli_query($conn ,$msgunread)) {
echo 'ok';
}
}
}
else
{
$msgunread ="UPDATE message_list SET msg_unread = msg_unread + 1 WHERE userid = '".$_GET['id']."' AND friend = '".$_GET['sess_id']."' ";
if(mysqli_query($conn ,$msgunread)) {
echo 'ok';
}
}
}
}
}
}
else
{
$sel ="SELECT * FROM message_list WHERE friend = '".$_GET['sess_id']."' AND userid = '".$_GET['id']."' ";
$select = mysqli_query($conn ,$sel);
while($row = mysqli_fetch_array($select)) {
if($row['msg_unread'] < 1) {
$newmessage ="UPDATE regvisitor SET new_message = new_message + 1 WHERE userid = '".$_GET['id']."' ";
if(mysqli_query($conn ,$newmessage)) {
$msgunread ="UPDATE message_list SET msg_unread = msg_unread + 1 WHERE userid = '".$_GET['id']."' AND friend = '".$_GET['sess_id']."' ";
if(mysqli_query($conn ,$msgunread)) {
echo 'ok';
}
}
}
else
{
$msgunread ="UPDATE message_list SET msg_unread = msg_unread + 1 WHERE userid = '".$_GET['id']."' AND friend = '".$_GET['sess_id']."' ";
if(mysqli_query($conn ,$msgunread)) {
echo 'ok';
}
}
}
}
}
else
{
echo 'Not sent';
}
}
?>