<?php
header('Access-Control-Allow-Origin:*');
session_start() ;
$url = $_GET['id'];
include('db.php');
$query = "DELETE FROM frndlist WHERE userid = '".$url."' AND followers = '".$_GET['sess_id']."' ";
if(mysqli_query($conn ,$query)) {
$follow ="UPDATE regvisitor SET total_followers = total_followers - 1 WHERE userid = '".$url."' ";
if(mysqli_query($conn ,$follow)) {
$cheffollowing ="UPDATE regvisitor SET total_following = total_following - 1 WHERE userid = '".$_GET['sess_id']."' ";
if(mysqli_query($conn ,$cheffollowing)) {
$notify = "DELETE FROM notification WHERE userid = '".$_GET['sess_id']."' AND friend = '".$url."' AND status = 'follow' " ;
if(mysqli_query($conn ,$notify)) {
echo "Unfollow";
}
else
{
echo "Wrong";
}
}
}
}
?>