<?php
header('Access-Control-Allow-Origin:*');
include('db.php');
$id = $_GET['id'];
$clr = "UPDATE regvisitor SET new_notification = 0 WHERE userid = '".$_GET['id']."' ";
$qry = mysqli_query($conn ,$clr);
if(isset($_GET['action'])) {
$notify ="SELECT * FROM notification WHERE userid IN ( SELECT userid FROM frndlist WHERE followers = '".$id."' ) OR postid IN (SELECT id FROM post WHERE userid = '".$id."') ORDER BY id DESC ";
}
if(isset($_GET['new'])) {
$notify ="SELECT * FROM notification WHERE id > '".$_GET['new']."' AND (userid IN ( SELECT userid FROM frndlist WHERE followers = '".$id."' ) OR postid IN (SELECT id FROM post WHERE userid = '".$id."') ) ORDER BY id DESC ";
}
if(isset($_GET['close'])) {
$notify ="SELECT * FROM notification WHERE id < '".$_GET['close']."' AND (userid IN ( SELECT userid FROM frndlist WHERE followers = '".$id."' ) OR postid IN (SELECT id FROM post WHERE userid = '".$id."') ) ORDER BY id DESC ";
}
$sr = mysqli_query($conn ,$notify);
$mytime = date("h:i:sa");
$hour = date("h");
$minute = date("i");
$second = date("s");
$date = date("d");
$month = date("m");
$year = date("Y");
$result = array();
while($status = mysqli_fetch_array($sr)) {
$time_difference = time() - $status['stamp']; 
$seconds = $time_difference ; 
$minutes = round($time_difference / 60 );
$hours = round($time_difference / 3600 ); 
$days = round($time_difference / 86400 ); 
$weeks = round($time_difference / 604800 ); 
$months = round($time_difference / 2419200 ); 
$years = round($time_difference / 29030400 ); 
$z = 0;
$info ="SELECT * FROM regvisitor WHERE userid ='".$status['userid']."' ";
$rs = mysqli_query($conn ,$info);
$row = mysqli_fetch_array($rs);
if($status['status'] == 'post') {
if($status['userid'] == $id) {
}
else
{
$chk="SELECT * FROM post WHERE id = '".$status['postid']."' ";
$que = mysqli_query($conn ,$chk);
$knw = mysqli_fetch_array($que);
$pro = $row['profile_pic']; 
$link = "<a href='#' id=".$status['postid']." class='viewpost' style='text-decoration:none; color:black;'>".$row['fname']." ".$row['lname']." has posted a ".$knw['share']." '".$knw['title']."'.</a>";
// Seconds
if($seconds <= 60)
{
$time = "$seconds seconds ago"; 
}
//Minutes
else if($minutes <=60)
{

   if($minutes==1)
  {
   $time = "one minute ago"; 
   }
   else
   {
    $time = "$minutes minutes ago"; 
   }

}
//Hours
else if($hours <=24)
{

   if($hours==1)
  {
   $time = "one hour ago";
  }
  else
  {
   $time = "$hours hours ago";
  }

}
//Days
else if($days <= 7)
{

  if($days==1)
  {
   $time = "one day ago";
  }
  else
  {
   $time = "$days days ago";
   }

}
//Weeks
else if($weeks <= 4)
{

   if($weeks==1)
  {
   $time = "one week ago";
   }
  else
  {
   $time = "$weeks weeks ago";
  }

}
//Months
else if($months <=12)
{

   if($months==1)
  {
   $time = "one month ago";
   }
  else
  {
   $time = "$months months ago";
   }

}
//Years
else
{

   if($years==1)
   {
    $time = "one year ago";
   }
   else
  {
    $time = "$years years ago";
   }

}
array_push($result , array('pro' => $pro , 'link' => $link , 'time' => $time , 'id' => $status['id']));
}
}
if($status['status'] == 'likes') {
if($status['userid'] == $id) {
}
else
{
$chk="SELECT * FROM post WHERE id = '".$status['postid']."' ";
$que = mysqli_query($conn ,$chk);
$own = mysqli_fetch_array($que);
if($own['userid'] == $id) {
$pro = $row['profile_pic']; 
$link = "<a href='#' id=".$status['postid']." class='viewpost' style='text-decoration:none; color:black;'>".$row['fname']." ".$row['lname']." likes your ".$own['share']." '".$own['title']."'</a>";
// Seconds
if($seconds <= 60)
{
$time = "$seconds seconds ago"; 
}
//Minutes
else if($minutes <=60)
{

   if($minutes==1)
  {
   $time = "one minute ago"; 
   }
   else
   {
    $time = "$minutes minutes ago"; 
   }

}
//Hours
else if($hours <=24)
{

   if($hours==1)
  {
   $time = "one hour ago";
  }
  else
  {
   $time = "$hours hours ago";
  }

}
//Days
else if($days <= 7)
{

  if($days==1)
  {
   $time = "one day ago";
  }
  else
  {
   $time = "$days days ago";
   }

}
//Weeks
else if($weeks <= 4)
{

   if($weeks==1)
  {
   $time = "one week ago";
   }
  else
  {
   $time = "$weeks weeks ago";
  }

}
//Months
else if($months <=12)
{

   if($months==1)
  {
   $time = "one month ago";
   }
  else
  {
   $time = "$months months ago";
   }

}
//Years
else
{

   if($years==1)
   {
    $time = "one year ago";
   }
   else
  {
    $time = "$years years ago";
   }

}
array_push($result , array('pro' => $pro , 'link' => $link , 'time' => $time , 'id' => $status['id']));
}
else
{
$pro = $row['profile_pic'];
$link = "<a href='#' id=".$status['postid']." class='viewpost' style='text-decoration:none; color:black;'>".$row['fname']." ".$row['lname']." likes a ".$own['share']." '".$own['title']."'</a>";
// Seconds
if($seconds <= 60)
{
$time = "$seconds seconds ago"; 
}
//Minutes
else if($minutes <=60)
{

   if($minutes==1)
  {
   $time = "one minute ago"; 
   }
   else
   {
    $time = "$minutes minutes ago"; 
   }

}
//Hours
else if($hours <=24)
{

   if($hours==1)
  {
   $time = "one hour ago";
  }
  else
  {
   $time = "$hours hours ago";
  }

}
//Days
else if($days <= 7)
{

  if($days==1)
  {
   $time = "one day ago";
  }
  else
  {
   $time = "$days days ago";
   }

}
//Weeks
else if($weeks <= 4)
{

   if($weeks==1)
  {
   $time = "one week ago";
   }
  else
  {
   $time = "$weeks weeks ago";
  }

}
//Months
else if($months <=12)
{

   if($months==1)
  {
   $time = "one month ago";
   }
  else
  {
   $time = "$months months ago";
   }

}
//Years
else
{

   if($years==1)
   {
    $time = "one year ago";
   }
   else
  {
    $time = "$years years ago";
   }

}
array_push($result , array('pro' => $pro , 'link' => $link , 'time' => $time , 'id' => $status['id']));
}
}
}
if($status['status'] == 'fav') {
if($status['userid'] == $id) {
}
else
{
$chk="SELECT * FROM post WHERE id = '".$status['postid']."' ";
$que = mysqli_query($conn ,$chk);
$own = mysqli_fetch_array($que);
if($own['userid'] == $id) {
$pro = $row['profile_pic'];
$link = "<a href='#' id=".$status['postid']." class='viewpost' style='text-decoration:none; color:black;'>".$row['fname']." ".$row['lname']." has added your ".$own['share']." '".$own['title']."' to favourite.</a>";
// Seconds
if($seconds <= 60)
{
$time = "$seconds seconds ago"; 
}
//Minutes
else if($minutes <=60)
{

   if($minutes==1)
  {
   $time = "one minute ago"; 
   }
   else
   {
    $time = "$minutes minutes ago"; 
   }

}
//Hours
else if($hours <=24)
{

   if($hours==1)
  {
   $time = "one hour ago";
  }
  else
  {
   $time = "$hours hours ago";
  }

}
//Days
else if($days <= 7)
{

  if($days==1)
  {
   $time = "one day ago";
  }
  else
  {
   $time = "$days days ago";
   }

}
//Weeks
else if($weeks <= 4)
{

   if($weeks==1)
  {
   $time = "one week ago";
   }
  else
  {
   $time = "$weeks weeks ago";
  }

}
//Months
else if($months <=12)
{

   if($months==1)
  {
   $time = "one month ago";
   }
  else
  {
   $time = "$months months ago";
   }

}
//Years
else
{

   if($years==1)
   {
    $time = "one year ago";
   }
   else
  {
    $time = "$years years ago";
   }

}
array_push($result , array('pro' => $pro , 'link' => $link , 'time' => $time , 'id' => $status['id']));
}
else
{
$pro = $row['profile_pic'];
$link = "<a href='#' id=".$status['postid']." class='viewpost' style='text-decoration:none; color:black;'>".$row['fname']." ".$row['lname']." has added a ".$own['share']." '".$own['title']."' to favourite</a>";
// Seconds
if($seconds <= 60)
{
$time = "$seconds seconds ago"; 
}
//Minutes
else if($minutes <=60)
{

   if($minutes==1)
  {
   $time = "one minute ago"; 
   }
   else
   {
    $time = "$minutes minutes ago"; 
   }

}
//Hours
else if($hours <=24)
{

   if($hours==1)
  {
   $time = "one hour ago";
  }
  else
  {
   $time = "$hours hours ago";
  }

}
//Days
else if($days <= 7)
{

  if($days==1)
  {
   $time = "one day ago";
  }
  else
  {
   $time = "$days days ago";
   }

}
//Weeks
else if($weeks <= 4)
{

   if($weeks==1)
  {
   $time = "one week ago";
   }
  else
  {
   $time = "$weeks weeks ago";
  }

}
//Months
else if($months <=12)
{

   if($months==1)
  {
   $time = "one month ago";
   }
  else
  {
   $time = "$months months ago";
   }

}
//Years
else
{

   if($years==1)
   {
    $time = "one year ago";
   }
   else
  {
    $time = "$years years ago";
   }

}
array_push($result , array('pro' => $pro , 'link' => $link , 'time' => $time , 'id' => $status['id']));
}
}
}
if($status['status'] == 'comment') {
if($status['userid'] == $id) {
}
else
{
$chk="SELECT * FROM post WHERE id = '".$status['postid']."' ";
$que = mysqli_query($conn ,$chk);
$own = mysqli_fetch_array($que);
if($own['userid'] == $id) {
$pro = $row['profile_pic']; 
$link = "<a href='#' id=".$status['postid']." class='viewpost' style='text-decoration:none; color:black;'>".$row['fname']." ".$row['lname']." has commented on your ".$own['share']." '".$own['title']."'.</a>";
// Seconds
if($seconds <= 60)
{
$time = "$seconds seconds ago"; 
}
//Minutes
else if($minutes <=60)
{

   if($minutes==1)
  {
   $time = "one minute ago"; 
   }
   else
   {
    $time = "$minutes minutes ago"; 
   }

}
//Hours
else if($hours <=24)
{

   if($hours==1)
  {
   $time = "one hour ago";
  }
  else
  {
   $time = "$hours hours ago";
  }

}
//Days
else if($days <= 7)
{

  if($days==1)
  {
   $time = "one day ago";
  }
  else
  {
   $time = "$days days ago";
   }

}
//Weeks
else if($weeks <= 4)
{

   if($weeks==1)
  {
   $time = "one week ago";
   }
  else
  {
   $time = "$weeks weeks ago";
  }

}
//Months
else if($months <=12)
{

   if($months==1)
  {
   $time = "one month ago";
   }
  else
  {
   $time = "$months months ago";
   }

}
//Years
else
{

   if($years==1)
   {
    $time = "one year ago";
   }
   else
  {
    $time = "$years years ago";
   }

}
array_push($result , array('pro' => $pro , 'link' => $link , 'time' => $time , 'id' => $status['id']));
}
else
{
$pro = $row['profile_pic'];
$link = "<a href='#' id=".$status['postid']." class='viewpost' style='text-decoration:none; color:black;'>".$row['fname']." ".$row['lname']." has commented on a ".$own['share']." '".$own['title']."'.</a>";
// Seconds
if($seconds <= 60)
{
$time = "$seconds seconds ago"; 
}
//Minutes
else if($minutes <=60)
{

   if($minutes==1)
  {
   $time = "one minute ago"; 
   }
   else
   {
    $time = "$minutes minutes ago"; 
   }

}
//Hours
else if($hours <=24)
{

   if($hours==1)
  {
   $time = "one hour ago";
  }
  else
  {
   $time = "$hours hours ago";
  }

}
//Days
else if($days <= 7)
{

  if($days==1)
  {
   $time = "one day ago";
  }
  else
  {
   $time = "$days days ago";
   }

}
//Weeks
else if($weeks <= 4)
{

   if($weeks==1)
  {
   $time = "one week ago";
   }
  else
  {
   $time = "$weeks weeks ago";
  }

}
//Months
else if($months <=12)
{

   if($months==1)
  {
   $time = "one month ago";
   }
  else
  {
   $time = "$months months ago";
   }

}
//Years
else
{

   if($years==1)
   {
    $time = "one year ago";
   }
   else
  {
    $time = "$years years ago";
   }

}
array_push($result , array('pro' => $pro , 'link' => $link , 'time' => $time , 'id' => $status['id']));
}
}
}
if($status['status'] == 'follow') {
if($status['userid'] == $id) {
}
else
{
if($status['friend'] == $id) 
{
$pro = $row['profile_pic'];
$link = "<a href='#' id=".$status['userid']." name='".$row['fname']." ".$row['lname']."' class='viewprofile' style='text-decoration:none; color:black;'>".$row['fname']." ".$row['lname']." is following you.</a>";
// Seconds
if($seconds <= 60)
{
$time = "$seconds seconds ago"; 
}
//Minutes
else if($minutes <=60)
{

   if($minutes==1)
  {
   $time = "one minute ago"; 
   }
   else
   {
    $time = "$minutes minutes ago"; 
   }

}
//Hours
else if($hours <=24)
{

   if($hours==1)
  {
   $time = "one hour ago";
  }
  else
  {
   $time = "$hours hours ago";
  }

}
//Days
else if($days <= 7)
{

  if($days==1)
  {
   $time = "one day ago";
  }
  else
  {
   $time = "$days days ago";
   }

}
//Weeks
else if($weeks <= 4)
{

   if($weeks==1)
  {
   $time = "one week ago";
   }
  else
  {
   $time = "$weeks weeks ago";
  }

}
//Months
else if($months <=12)
{

   if($months==1)
  {
   $time = "one month ago";
   }
  else
  {
   $time = "$months months ago";
   }

}
//Years
else
{

   if($years==1)
   {
    $time = "one year ago";
   }
   else
  {
    $time = "$years years ago";
   }

}
array_push($result , array('pro' => $pro , 'link' => $link , 'time' => $time , 'id' => $status['id']));
}
}
}
}
echo json_encode(array("result" =>$result));
?>