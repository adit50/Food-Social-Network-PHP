<?php
header('Access-Control-Allow-Origin:*');
$mytime = date("h:i:sa");
$hour = date("h");
$minute = date("i");
$second = date("s");
$date = date("d");
$month = date("m");
$year = date("Y");
$userid = $_GET['sess_id'];
$getid = $_GET['id'];
$time = time();
include('db.php');
$result = array();
$maxid = array();
$del = "UPDATE message_list SET msg_unread = 0 WHERE friend = '".$_GET['id']."' AND userid = '".$_GET['sess_id']."' ";
mysqli_query($conn ,$del);
$chkdel = "UPDATE regvisitor SET new_message = 0 WHERE userid = '".$_GET['sess_id']."' ";
if(mysqli_query($conn ,$chkdel)) {
$get ="SELECT * FROM ( SELECT * FROM messages WHERE (userid = '".$userid."' OR userid = '".$getid."') AND (friend = '".$userid."' OR friend = '".$getid."') AND id > '".$_GET['max']."' ORDER by id DESC ) AS a ORDER by id ASC";
$security = mysqli_real_escape_string($conn ,$get) or die('Could not guard');
$qry = mysqli_query($conn ,$get) or die ('Could not load');
$post_availabel = mysqli_num_rows($qry); 
if($post_availabel) {
while($row = mysqli_fetch_array($qry)) {
if($row['userid'] == $_GET['sess_id']) {
$time_difference = time() - $row['stamp']; 
$seconds = $time_difference ; 
$minutes = round($time_difference / 60 );
$hours = round($time_difference / 3600 ); 
$days = round($time_difference / 86400 ); 
$weeks = round($time_difference / 604800 ); 
$months = round($time_difference / 2419200 ); 
$years = round($time_difference / 29030400 ); 
$z = 0;
if($seconds <= 60) {
array_push($result , array('msg' => '<div align="right" style="padding-right:3px;"><div class="txt" align="left" style="background-color:white; display:inline-block; border-radius:5px;" align="right">'.$row['message'] , 'time' => '<font size="1" color="grey">'.$seconds.' seconds ago</font></div><div class="arrow"></div></div>' , 'id'=>$row['id']));
}
else if($minutes <=60) {
array_push($result , array('msg' => '<div align="right" style="padding-right:3px;"><div class="txt" align="left" style="background-color:white; display:inline-block; border-radius:5px;" align="right">'.$row['message'] , 'time' => '<font size="1" color="grey">'.$minutes.' minutes ago</font></div><div class="arrow"></div></div>' , 'id'=>$row['id']));
}
else if($hours <=24) {
array_push($result , array( 'msg' => '<div align="right" style="padding-right:3px;"><div class="txt" align="left" style="background-color:white; display:inline-block; border-radius:5px;" align="right">'.$row['message'] , 'time' => '<font size="1" color="grey">'.$hours.' hr ago</font></div><div class="arrow"></div></div>' , 'id'=>$row['id']));
}
else if($days <= 7) {
array_push($result , array('msg' => '<div align="right" style="padding-right:3px;"><div class="txt" align="left" style="background-color:white; display:inline-block; border-radius:5px;" align="right">'.$row['message'] , 'time' => '<font size="1" color="grey">'.$days.' day ago</font></div><div class="arrow"></div></div>' , 'id'=>$row['id']));
}
else if($weeks <= 4) {
array_push($result , array('msg' => '<div align="right" style="padding-right:3px;"><div class="txt" align="left" style="background-color:white; display:inline-block; border-radius:5px;" align="right">'.$row['message'] , 'time' => "<font size='1' color='grey'>".$weeks." week ago</font></div><div class='arrow'></div></div>" , 'id'=>$row['id']));
}
else if($months <=12) {
array_push($result , array( 'msg' => '<div align="right" style="padding-right:3px;"><div class="txt" align="left" style="background-color:white; display:inline-block; border-radius:5px;" align="left">'.$row['message'] , 'time' => '<font size="1" color="grey">'.$months."month ago</font></div><span class='arrow'></span></div>" , 'id'=>$row['id']));
}
else if($years ==1) {
array_push($result , array('msg' => '<div align="right" style="padding-right:3px;"><div class="txt" align="left" style="background-color:white;  display:inline-block; border-radius:5px;">'.$row['message'] , 'time' => '<font size="2" color="grey">One year ago</font></div><span class="arrow"></span></div>' , 'id'=>$row['id']));
}else{
array_push($result , array('msg' => '<div align="right" style="padding-right:3px;"><div class="txt" align="left" style="background-color:white;  display:inline-block; border-radius:5px;">'.$row['message'] , 'time' => '<font size="2" color="grey">'.$years.' year ago</font></div><span class="arrow"></span></div>' , 'id'=>$row['id']));
}
}
else
{
$time_difference = time() - $row['stamp']; 
$seconds = $time_difference ; 
$minutes = round($time_difference / 60 );
$hours = round($time_difference / 3600 ); 
$days = round($time_difference / 86400 ); 
$weeks = round($time_difference / 604800 ); 
$months = round($time_difference / 2419200 ); 
$years = round($time_difference / 29030400 ); 
$z = 0;
if($seconds <= 60) {
array_push($result , array('msg' => '<div align="left" style="padding-left:3px;"><span class="arrow_left"></span><div class="txt" align="left" style="background-color:white; display:inline-block; border-radius:5px;" align="left">'.$row['message'] , 'time' => '<font size="1" color="grey">'.$seconds.' seconds ago</font></div></div>' , 'id'=>$row['id']));
}
else if($minutes <=60) {
array_push($result , array('msg' => '<div align="left" style="padding-left:3px;"><span class="arrow_left"></span><div class="txt" align="left" style="background-color:white; display:inline-block; border-radius:5px;" align="left">'.$row['message'] , 'time' => '<font size="1" color="grey">'.$minutes.' minutes ago</font></div></div>' , 'id'=>$row['id']));
}
else if($hours <=24) {
array_push($result , array( 'msg' => '<div align="left" style="padding-left:3px;"><span class="arrow_left"></span><div class="txt" align="left" style="background-color:white; display:inline-block; border-radius:5px;" align="left">'.$row['message'] , 'time' => '<font size="1" color="grey">'.$hours.' hr ago</font></div></div>' , 'id'=>$row['id']));
}
else if($days <= 7) {
array_push($result , array('msg' => '<div align="left" style="padding-left:3px;"><span class="arrow_left"></span><div class="txt" align="left" style="background-color:white; display:inline-block; border-radius:5px;" align="left">'.$row['message'] , 'time' => '<font size="1" color="grey">'.$days.' day ago</font></div></div>' , 'id'=>$row['id']));
}
else if($weeks <= 4) {
array_push($result , array('msg' => '<div align="left" style="padding-left:3px;"><span class="arrow_left"></span><div class="txt" align="left" style="background-color:white; display:inline-block; border-radius:5px;" align="left">'.$row['message'] , 'time' => "<font size='1' color='grey'>".$weeks." week ago</font></div></div>" , 'id'=>$row['id']));
}
else if($months <=12) {
array_push($result , array( 'msg' => '<div align="left" style="padding-left:3px;"><span class="arrow_left"></span><div class="txt" align="left" style="background-color:white; display:inline-block; border-radius:5px;" align="left">'.$row['message'] , 'time' => '<font size="1" color="grey">'.$months."month ago</font></div></div>" , 'id'=>$row['id']));
}
else if($years ==1) {
array_push($result , array('msg' => '<div align="left" style="padding-left:3px;"><span class="arrow_left"></span><div class="txt" align="left" style="background-color:white;  display:inline-block; border-radius:5px;">'.$row['message'] , 'time' => '<font size="2" color="grey">One year ago</font></div></div>' , 'id'=>$row['id']));
}
else {
array_push($result , array('msg' => '<div align="left" style="padding-left:3px;"><span class="arrow_left"></span><div class="txt" align="left" style="background-color:white;  display:inline-block; border-radius:5px;">'.$row['message'] , 'time' => '<font size="2" color="grey">'.$years.' year ago</font></div></div>' , 'id'=>$row['id']));
}
}
}
$number = array_map(function($detail)
{
return $detail['id'];
},$result);
$max = max($number);
array_push($maxid , array('max' => $max));
}
echo json_encode(array("result" =>$result , 'max' => $maxid));
}
?>