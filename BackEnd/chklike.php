<?php
session_start() ;
if (isset($_SESSION[' valid_user ']))
{
if(isset($_POST['idd'])) {
$id = $_POST['idd'];
$conn= mysql_connect('localhost' , 'root' , '') or die('Could not connect to database');
$db= mysql_select_db('users', $conn) or die('Could not connect to database');
$know = "SELECT status FROM likes WHERE postid = '".$id."' AND userid = '".$_SESSION[' user_id ']."' ";
$sr = mysql_query($know);
$numRowsLogin=mysql_num_rows($sr);
if($numRowsLogin) {
echo '<a href="Unlike.php?id='.$id.'">Unlike</a> <a href="viewpost.php?id='.$id.'">Comment</a><br/><br/>';
}
else
{
echo '<a href="like.php?id='.$id.'">Like</a> <a href="viewpost.php?id='.$id.'">Comment</a><br/><br/>';
}
}
}
?>