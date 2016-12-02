<?php
header('Access-Control-Allow-Origin:*');
session_start();
include('db.php');
$get = "SELECT * FROM frndlist WHERE followers = '".$_GET['id']."' ";
$sr = mysqli_query($conn ,$get);
$result = array();
while($row = mysqli_fetch_array($sr)) {
$name = "SELECT * FROM regvisitor WHERE userid = '".$row['userid']."' ";
$rs = mysqli_query($conn ,$name);
$rows = mysqli_fetch_array($rs);
$chk = "SELECT * FROM frndlist WHERE userid = '".$row['userid']."' AND followers = '".$_GET['sess_id']."' ";
$qry = mysqli_query($conn ,$chk);
$ok = mysqli_num_rows($qry);
if($ok) {
$follow = '<a href ="#" id='.$row['userid'].' class="follow" title="Unfollow" style="text-decoration:none; border: 1px solid red; color:red; background-color:transparent; padding-bottom:1px; padding-top:1px; padding-left:4px; font-weight:normal; font-size:14px; padding-right:4px; border-radius:2px;">Unfollow</a>';
}
else if($row['userid'] == $_GET['sess_id'])
{
$follow = '';
}else {
$follow = '<a href ="#" id='.$row['userid'].' class="follow" title="Follow" style="text-decoration:none; border: 1px solid green; color:green; background-color:transparent; padding-bottom:1px; padding-top:1px; padding-left:4px; font-weight:normal; font-size:14px; padding-right:4px; border-radius:2px;">Follow</a>';
}
$img = $rows['profile_pic'];
$pro = '<a href ="#" id='.$row['userid'].' name="'.$rows['fname'].' '.$rows['lname'].'" class="viewprofile" style="text-decoration:none; font-size:15px;"><b>'.$rows['fname'].' '.$rows['lname'].'</b><br/><span style="font-size:12px; color:grey; font-weight:100;">'.$rows['total_followers'].' Followers</span></a>';
array_push($result , array('img' => $img , 'pro' => $pro , 'follow' => $follow));
}
echo json_encode(array("result" =>$result));
?>