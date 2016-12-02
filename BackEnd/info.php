<?php
header('Access-Control-Allow-Origin:*');
include('db.php');
$get = "SELECT * FROM regvisitor WHERE userid = '".$_GET['id']."' ";
$result = mysqli_query($conn ,$get);
$row = mysqli_fetch_array($result);
$result = array();
array_push($result , array('fname' => $row['fname'] , 'lname' => $row['lname'] , 'email' => $row['emailid'] , 'password' => $row['password'] , 'pic' => $row['profile_pic'] , 'followers' => $row['total_followers'] , 'following' => $row['total_following'] , 'favourites' => $row['total_favourites'] , 'userid' => $row['userid'] , 'msg' => $row['new_message'] , 'notify' => $row['new_notification'] , 'sex' => $row['sex']));
echo json_encode(array("result" =>$result));
?>