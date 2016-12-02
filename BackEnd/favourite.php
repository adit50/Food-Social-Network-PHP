<?php
header('Access-Control-Allow-Origin:*');
session_start();
include('db.php');
$img = "SELECT * FROM regvisitor WHERE userid ='".$_GET['id']."' ";
$rs = mysqli_query($conn ,$img);
$rows = mysqli_fetch_array($rs);
$id = $_GET['id'];
$get = "SELECT * FROM likes WHERE userid = '".$id."' AND favourite = '1' ";
$sr = mysqli_query($conn ,$get);
$result = array();
while($fav = mysqli_fetch_array($sr)) {
$post = "SELECT * FROM post WHERE id = '".$fav['postid']."' ";
$rs = mysqli_query($conn ,$post);
$row = mysqli_fetch_array($rs);
if(file_exists($row['image'])) {
$pro = '<a href="#" id='.$row['id'].' class="viewpost" style="text-decoration:none; font-weight:normal; font-size:20px; color:white;">'.$row['title'].'</a>';
if($_GET['id'] == $_GET['sess_id']) {
$cross = "<img src='images/cross.png' width='16px' height='16px' class='image' id=".$row['id']." title='Remove' />";
}
else
{
$cross ='';
}
$img = $row['image'];
array_push($result , array('pro' => $pro , 'cross' => $cross , 'img' => $img , 'id' => $row['id']));
}
else
{
$pro = '<a href="#" id='.$row['id'].' class="viewpost" style="text-decoration:none; font-weight:normal; font-size:20px; color:white;">'.$row['title'].'</a>';
if($_GET['id'] == $_GET['sess_id']) {
$cross = "<img src='images/cross.png' width='16px' height='16px' class='image' id=".$row['id']." title='Remove' />";
}
else
{
$cross ='';
}
$img = 'images/logo.png';
array_push($result , array('pro' => $pro , 'cross' => $cross , 'img' => $img , 'id' => $row['id']));
}
}
echo json_encode(array("result" =>$result));
if(isset($_GET['fav_id'])) {
$chk ="SELECT * FROM likes WHERE postid = '".$_GET['fav_id']."' AND userid = '".$_GET['sess_id']."' ";
$qry = mysqli_query($conn ,$chk);
$arr = mysqli_fetch_array($qry);
if($arr['favourite'] == 0) {
}else{
$del = "UPDATE likes SET favourite = 0 WHERE postid = '".$_GET['fav_id']."' AND userid = '".$_GET['sess_id']."' ";
if(mysqli_query($conn ,$del)) {
$total_favo = "UPDATE regvisitor SET total_favourites = total_favourites - 1 WHERE userid = '".$_GET['sess_id']."' ";
if(mysqli_query($conn ,$total_favo)) {
$delnotify = "DELETE FROM notification WHERE postid = '".$_GET['fav_id']."' AND userid = '".$_GET['sess_id']."' AND status = 'fav' ";
if(mysqli_query($conn ,$delnotify)) {
echo 'deleted';
}
}
}
}
}
?>