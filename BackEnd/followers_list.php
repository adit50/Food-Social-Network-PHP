<?php
header('Access-Control-Allow-Origin:*');
session_start();
$id= $_GET['id'];
include('db.php');
$getfollow ="SELECT * FROM frndlist WHERE userid = '".$id."' ";
$rs = mysqli_query($conn ,$getfollow) or die (mysqli_error());
$result = array();
while($row = mysqli_fetch_array($rs)) {
$get_name ="SELECT * FROM regvisitor WHERE userid = '".$row['followers']."' ";
$sr =mysqli_query($conn ,$get_name) or die (mysqli_error());
$nam = mysqli_fetch_array($sr);
$chk = "SELECT * FROM frndlist WHERE userid = '".$row['followers']."' AND followers = '".$_GET['sess_id']."' ";
$qry = mysqli_query($conn ,$chk);
$ok = mysqli_num_rows($qry);
if($ok) {
$follow = '<a href ="#" id='.$row['followers'].' class="follow" title="Unfollow" style="text-decoration:none; border: 1px solid red; color:red; font-size:14px; background-color:transparent; padding-bottom:1px; padding-top:1px; padding-left:4px; font-weight:normal; padding-right:4px; border-radius:2px;">Unfollow</a>';
}
else if($row['followers'] == $_GET['sess_id'])
{
$follow = '';
} 
else
{
$follow = '<a href ="#" id='.$row['followers'].' class="follow" title="Follow" style="text-decoration:none; border: 1px solid green; color:green; font-size:14px; background-color:transparent; padding-bottom:1px; padding-top:1px; padding-left:4px; font-weight:normal; padding-right:4px; border-radius:2px;">Follow</a>';
}
$img = $nam['profile_pic'];
$pro = '<a href="#" id='.$row['followers'].' name="'.$nam['fname'].' '.$nam['lname'].'" class="viewprofile" style="text-decoration:none; font-size:15px;"><b>'.$nam['fname'].' '.$nam['lname'].'</b></a><br/><span style="font-size:12px; color:grey; font-weight:100;">'.$nam['total_followers'].' Followers</span>';
array_push($result , array('img' => $img , 'pro' => $pro , 'follow' => $follow));
}
echo json_encode(array("result" =>$result));
?>