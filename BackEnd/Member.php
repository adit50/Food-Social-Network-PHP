<?php
header('Access-Control-Allow-Origin:*');
session_start();
$mytime = date("h:i:sa");
$hour = date("h");
$minute = date("i");
$second = date("s");
$date = date("d");
$month = date("m");
$year = date("Y");
include('db.php');
if($_GET['action'] == 'Order By Likes') {
$query2 = "SELECT * FROM post ORDER BY likes DESC LIMIT 10";
if(isset($_GET['old'])) {
$query2 = "SELECT * FROM(SELECT * FROM post WHERE (likes < '".$_GET['old']."')) As a ORDER BY likes DESC LIMIT 10";
}
}
if($_GET['action'] == 'Order By Newest') {
$query2 = "SELECT * FROM post ORDER BY id DESC LIMIT 10";
if(isset($_GET['old'])) {
$query2 = "SELECT * FROM(SELECT * FROM post WHERE (id < '".$_GET['old']."')) As a ORDER BY id DESC LIMIT 10";
}
}
$rs = mysqli_query($conn ,$query2);
$post_availabel = mysqli_num_rows($rs);
$min_val = array();
$result = array();
if($post_availabel) {
while($row = mysqli_fetch_array($rs)) {
if(file_exists($row['image'])) { 
$image = "SELECT * FROM regvisitor WHERE userid = '".$row['userid']."' ";
$qy = mysqli_query($conn ,$image);
$img = mysqli_fetch_array($qy);
$time_difference = time() - $row['stamp']; 
$seconds = $time_difference ; 
$minutes = round($time_difference / 60 );
$hours = round($time_difference / 3600 ); 
$days = round($time_difference / 86400 ); 
$weeks = round($time_difference / 604800 ); 
$months = round($time_difference / 2419200 ); 
$years = round($time_difference / 29030400 ); 
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
$a = 'members/'.$img['emailid'].'/'.$row['id'].'.txt';
$open = file_get_contents($a);
$start = strpos($open , '!@')+2;
$close = strpos($open , '@!')-2;
$title = substr($open , $start , $close);
$sta = strpos($open , '*()')+3;
$clo = strpos($open , '()*');
$stop = $clo - $sta;
$about = substr($open ,$sta ,$stop);
if(strlen($about) > 100) {
$rsgCut = substr($about, 0, 100);
$desc = $rsgCut.'...<a href="#" id='.$row['id'].' class="viewpost" style="color:#DA2121;">Read More</a>';
}
else
{
$desc = $about;
}
$comm_no = $row['comments']; 
$comment ='<a href="#" id='.$row['id'].' class="comment"><img src="http://cookzz.in/images/comment1.png" width="24px" height="24px"/></a>';
$know = "SELECT status, favourite FROM likes WHERE postid = '".$row['id']."' AND userid = '".$_GET['id']."' ";
$sr = mysqli_query($conn ,$know);
$numRowsLogin=mysqli_num_rows($sr);
if($numRowsLogin) {
while($sta = mysqli_fetch_array($sr)) {
if($sta['favourite'] == '1') {
$add = '<a href="#Added" id='.$row['id'].' class="fav" title="Added to Favourite"><img src="http://cookzz.in/images/added.png" width="24px" height="24px" style="vertical-align:middle;"/></a>';
}
else
{
$add = '<a href ="#Add" id='.$row['id'].' class="fav" title="Add to Favourite"><img src="http://cookzz.in/images/add.png" width="24px" height="24px" style="vertical-align:middle;"/></a>';
}
if($sta['status'] == '1') {
array_push($result , array('like' => '<a href="#Unlike" id='.$row['id'].' title="Unlike" class="like"><img src="http://cookzz.in/images/unlike.png" width="24px" height="24px"/></a>' ,
'like_no' => '<span class="num'.$row['id'].'">'.$row['likes'].'</span>' ,
'time' => $time ,
'pro_pic' => $img['profile_pic'] , 
'userid' => $row['userid'] ,
'fname' => $row['fname'] , 
'lname' => $row['lname'] , 
'share' => $row['share'] , 
'title' => $title ,
'postid' => $row['id'] , 
'postimg' => 'http://cookzz.in/'.$row['image'] ,
'desc' => $desc ,
'comm_no' => $comm_no ,
'comment' => $comment ,
'likes' => $row['likes'] ,
'minu' => $row['minu'] ,
'serv' => $row['serv'] ,
'add' => $add));
}
else
{
array_push($result , array('like' => '<a href="#Like" id='.$row['id'].' title="Like" class="like"><img src="http://cookzz.in/images/like.png" width="24px" height="24px"/></a>' ,
'like_no' => '<span class="num'.$row['id'].'">'.$row['likes'].'</span>' ,
'time' => $time ,
'pro_pic' => $img['profile_pic'] , 
'userid' => $row['userid'] ,
'fname' => $row['fname'] , 
'lname' => $row['lname'] , 
'share' => $row['share'] , 
'title' => $title ,
'postid' => $row['id'] , 
'postimg' => 'http://cookzz.in/'.$row['image'] ,
'desc' => $desc ,
'comm_no' => $comm_no ,
'comment' => $comment ,
'likes' => $row['likes'] ,
'minu' => $row['minu'] ,
'serv' => $row['serv'] ,
'add' => $add));
}
}
}
else
{
array_push($result , array('like' => '<a href="#Like" id='.$row['id'].' title="Like" class="like"><img src="http://cookzz.in/images/like.png" width="24px" height="24px"/></a>' ,
'like_no' => '<span class="num'.$row['id'].'">'.$row['likes'].'</span>' ,
'time' => $time ,
'pro_pic' => $img['profile_pic'] , 
'userid' => $row['userid'] ,
'fname' => $row['fname'] , 
'lname' => $row['lname'] , 
'share' => $row['share'] , 
'title' => $title ,
'postid' => $row['id'] , 
'postimg' => 'http://cookzz.in/'.$row['image'] ,
'desc' => $desc ,
'comm_no' => $comm_no ,
'comment' => $comment ,
'likes' => $row['likes'] ,
'minu' => $row['minu'] ,
'serv' => $row['serv'] ,
'add' => '<a href ="#Add" id='.$row['id'].' class="fav" title="Add to Favourite"><img src="http://cookzz.in/images/add.png" width="24px" height="24px" style="vertical-align:middle;"/></a>'));
}
}
else
{
$image = "SELECT * FROM regvisitor WHERE userid = '".$row['userid']."' ";
$qy = mysqli_query($conn ,$image);
$img = mysqli_fetch_array($qy);
$time_difference = time() - $row['stamp']; 
$seconds = $time_difference ; 
$minutes = round($time_difference / 60 );
$hours = round($time_difference / 3600 ); 
$days = round($time_difference / 86400 ); 
$weeks = round($time_difference / 604800 ); 
$months = round($time_difference / 2419200 ); 
$years = round($time_difference / 29030400 ); 
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
$a = 'members/'.$img['emailid'].'/'.$row['id'].'.txt';
$open = file_get_contents($a);
$start = strpos($open , '!@')+2;
$close = strpos($open , '@!')-2;
$title = substr($open , $start , $close);
$row['id'];
$sta = strpos($open , '*()')+3;
$clo = strpos($open , '()*');
$stop = $clo - $sta;
$about = substr($open ,$sta ,$stop);
if(strlen($about) > 100) {
$rsgCut = substr($about, 0, 100);
$desc = $rsgCut.'...<a href="#" id='.$row['id'].' class="viewpost" style="color:#DA2121;">Read More</a>';
}
else
{
$desc = $about;
}
$comm_no = $row['comments']; 
$comment = '<a href="#" id='.$row['id'].' class="comment"><img src="http://cookzz.in/images/comment1.png" width="24px" height="24px"/></a>';
$know = "SELECT status, favourite FROM likes WHERE postid = '".$row['id']."' AND userid = '".$_GET['id']."' ";
$sr = mysqli_query($conn ,$know);
$numRowsLogin=mysqli_num_rows($sr);
if($numRowsLogin) {
while($sta = mysqli_fetch_array($sr)) {
if($sta['favourite'] == '1') {
$add = '<a href="#Added" id='.$row['id'].' class="fav" title="Added to Favourite"><img src="http://cookzz.in/images/added.png" width="24px" height="24px" style="vertical-align:middle;"/></a>';
}
else
{
$add = '<a href ="#Add" id='.$row['id'].' class="fav" title="Add to Favourite"><img src="http://cookzz.in/images/add.png" width="24px" height="24px" style="vertical-align:middle;"/></a>';
}
if($sta['status'] == '1') {
array_push($result , array('like' => '<a href="#Unlike" id='.$row['id'].' title="Unlike" class="like"><img src="http://cookzz.in/images/unlike.png" width="24px" height="24px"/></a>' ,
'like_no' => '<span class="num'.$row['id'].'">'.$row['likes'].'</span>' ,
'time' => $time ,
'pro_pic' => $img['profile_pic'] , 
'userid' => $row['userid'] ,
'fname' => $row['fname'] , 
'lname' => $row['lname'] , 
'share' => $row['share'] , 
'title' => $title ,
'postid' => $row['id'] , 
'postimg' => '',
'desc' => $desc ,
'comm_no' => $comm_no ,
'comment' => $comment ,
'likes' => $row['likes'] ,
'minu' => $row['minu'] ,
'serv' => $row['serv'] ,
'add' => $add));
}
else
{
array_push($result , array('like' => '<a href="#Like" id='.$row['id'].' title="Like" class="like"><img src="http://cookzz.in/images/like.png" width="24px" height="24px"/></a>' ,
'like_no' => '<span class="num'.$row['id'].'">'.$row['likes'].'</span>' ,
'time' => $time ,
'pro_pic' => $img['profile_pic'] , 
'userid' => $row['userid'] ,
'fname' => $row['fname'] , 
'lname' => $row['lname'] , 
'share' => $row['share'] , 
'title' => $title ,
'postid' => $row['id'] ,
'postimg' => '' , 
'desc' => $desc ,
'comm_no' => $comm_no ,
'comment' => $comment ,
'likes' => $row['likes'] ,
'minu' => $row['minu'] ,
'serv' => $row['serv'] ,
'add' => $add));
}
}
}
else
{
array_push($result , array('like' => '<a href="#Like" id='.$row['id'].' title="Like" class="like"><img src="http://cookzz.in/images/like.png" width="24px" height="24px"/></a>' ,
'like_no' => '<span class="num'.$row['id'].'">'.$row['likes'].'</span>' ,
'time' => $time ,
'pro_pic' => $img['profile_pic'] , 
'userid' => $row['userid'] ,
'fname' => $row['fname'] , 
'lname' => $row['lname'] , 
'share' => $row['share'] , 
'title' => $title ,
'postid' => $row['id'] , 
'postimg' => '' ,
'desc' => $desc ,
'comm_no' => $comm_no ,
'comment' => $comment ,
'likes' => $row['likes'] ,
'minu' => $row['minu'] ,
'serv' => $row['serv'] ,
'add' => '<a href ="#Add" id='.$row['id'].' class="fav" title="Add to Favourite"><img src="http://cookzz.in/images/add.png" width="24px" height="24px" style="vertical-align:middle;"/></a>'));
}
}
}
$numbers = array_map(function($details)
{
return $details['likes'];
},$result);
$number = array_map(function($detail)
{
return $detail['postid'];
},$result);
$min = min($numbers);
$minid = min($number);
array_push($min_val , array('min' => $min , 'minid' => $minid ));
}
echo json_encode(array("result" =>$result , "min"=>$min_val));
?>