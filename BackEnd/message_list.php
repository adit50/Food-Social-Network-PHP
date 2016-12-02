<?php
header('Access-Control-Allow-Origin:*');
session_start();
include('db.php');
$chkdel = "UPDATE regvisitor SET new_message = 0 WHERE userid = '".$_GET['sess_id']."' ";
if(mysqli_query($conn ,$chkdel)) {
$get ="SELECT * FROM message_list WHERE userid ='".$_GET['sess_id']."' ORDER BY msg_unread DESC ";
$gets = mysqli_query($conn ,$get);
$result = array();
while($row = mysqli_fetch_array($gets)) {
$name ="SELECT * FROM regvisitor WHERE userid = '".$row['friend']."' ";
$names = mysqli_query($conn ,$name);
$full = mysqli_fetch_array($names);
$last_msz = "SELECT * FROM messages WHERE (userid = '".$full['userid']."' OR userid = '".$_GET['sess_id']."')  AND (friend = '".$full['userid']."' OR friend = '".$_GET['sess_id']."') ORDER by id DESC LIMIT 1";
$get_msz = mysqli_query($conn ,$last_msz);
$fet = mysqli_fetch_array($get_msz);
if($row['msg_unread'] > 0) {
array_push($result , array('img' => $full['profile_pic'] , 'id' => $full['userid'] , 'last' => $fet['message'] , 'fname' => $full['fname'] , 'lname' => $full['lname']." (".$row['msg_unread'].")"));
}
else
{
array_push($result , array('img' => $full['profile_pic'] , 'id' => $full['userid'] , 'last' => $fet['message'] , 'fname' => $full['fname'] , 'lname' => $full['lname']));
}
}
echo json_encode(array("result" =>$result));
}
?>
