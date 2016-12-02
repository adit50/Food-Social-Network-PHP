<?php
header('Access-Control-Allow-Origin:*');
session_start();
include('db.php');
$view = "SELECT * FROM comment WHERE postid = '".$_GET['id']."' ORDER BY id ASC";
$sql = mysqli_query($conn ,$view);
$result = array();
while($row = mysqli_fetch_array($sql)) {
$chkdel = "SELECT * FROM post WHERE id = '".$_GET['id']."' ";
$qry = mysqli_query($conn ,$chkdel);
$fet = mysqli_fetch_array($qry);
$info = "SELECT * FROM regvisitor WHERE userid = '".$row['userid']."' ";
$res = mysqli_query($conn ,$info);
$pic = mysqli_fetch_array($res);
if($fet['userid'] == $_GET['sess_id']) {
array_push($result , array('id' => $row['id']."comm" , 'person_id' => $row['userid'] , 'fname' => $row['fname'] , 'lname' => $row['lname'] , 'pic' => $pic['profile_pic'] , 'cmmnt' => $row['comments']."<br/><a href='#' id=".$row['id']." name=".$_GET['id']." userid=".$row['userid']." class='delcomm'>Delete</a>" , 'postid' => $_GET['id']));
}
else if($row['userid'] == $_GET['sess_id']) {
array_push($result , array('id' => $row['id']."comm" , 'person_id' => $row['userid'] , 'fname' => $row['fname'] , 'lname' => $row['lname'] , 'pic' => $pic['profile_pic'] , 'cmmnt' => $row['comments']."<br/><a href='#' id=".$row['id']." name=".$_GET['id']." userid=".$row['userid']." class='delcomm'>Delete</a>"));
}
else
{
array_push($result , array( 'id' => $row['id']."comm" ,'person_id' => $row['userid'] , 'fname' => $row['fname'] , 'lname' => $row['lname'] , 'pic' => $pic['profile_pic'] , 'cmmnt' => $row['comments'] , 'postid' => $_GET['id'] , 'delcomm' => ''));
}
}
echo json_encode(array("result" =>$result));
?>