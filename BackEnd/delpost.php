<?php
header('Access-Control-Allow-Origin:*');
include('db.php');
$query = "DELETE FROM post WHERE id = '".$_GET['id']."' ";
if(mysqli_query($conn ,$query)) {
$minus = "UPDATE regvisitor SET post = post - 1 WHERE userid = '".$_GET['user']."' ";
if(mysqli_query($conn ,$minus)) {
$notify = "DELETE FROM notification WHERE postid = '".$_GET['id']."' ";
mysqli_query($conn ,$notify); 
$like = "DELETE FROM likes WHERE postid = '".$_GET['id']."' ";
mysqli_query($conn ,$like); 
$comm = "DELETE FROM comment WHERE postid = '".$_GET['id']."' ";
mysqli_query($conn ,$comm);
echo "OK";
}
}
else
{
echo "Something wen't wrong";
}
?>

