<?php
header('Access-Control-Allow-Origin:*');
session_start();
include('db.php');
$query = "DELETE FROM comment WHERE id = '".$_GET['id']."' AND userid = '".$_GET['userid']."' ";
if(mysqli_query($conn ,$query)) {
$dec = "UPDATE post SET comments = comments - 1 WHERE id = '".$_GET['postid']."' ";
if(mysqli_query($conn ,$dec)) {
$delnotify = "DELETE FROM notification WHERE postid = '".$_GET['postid']."' AND userid = '".$_GET['userid']."' AND status = 'comment' ";
if(mysqli_query($conn ,$delnotify)) {
echo 'ok';
}
else
{
echo "Wrong";
}
}
}
?>

