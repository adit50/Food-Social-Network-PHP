<?php
header('Access-Control-Allow-Origin:*');
session_start() ;
if (isset($_SESSION[' valid_user ']))
{
$url = $_GET['id'];
include('db.php');
$know = "SELECT status FROM likes WHERE postid = '".$url."' AND userid = '".$_SESSION[' user_id ']."' ";
$sr = mysqli_query($conn ,$know);
$numRowsLogin=mysqli_num_rows($sr);
if($numRowsLogin) {
$row = mysqli_fetch_array($sr);
if($row['status'] == 0) {
echo '';
}
else
{
$query = "UPDATE likes SET status = status - 1 WHERE postid = '".$url."' AND userid = '".$_SESSION[' user_id ']."' ";
if(mysqli_query($conn ,$query)) {
$update ="UPDATE post SET likes = likes - 1 WHERE id = '".$url."' ";
if(mysqli_query($conn ,$update)) {
$delnotify = "DELETE FROM notification WHERE postid = '".$url."' AND userid = '".$_SESSION[' user_id ']."' AND status = 'likes' ";
if(mysqli_query($conn ,$delnotify)) {
}
}
}
else
{
echo "Wrong";
}
}
}
}
?>

