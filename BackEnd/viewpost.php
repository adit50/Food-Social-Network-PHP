<?php
header('Access-Control-Allow-Origin:*');
session_start();
include('db.php');
$query ="SELECT * FROM post WHERE id = '".$_GET['id']."' ";
$content = mysqli_query($conn ,$query);
$result = array();
while($row = mysqli_fetch_array($content)) {
$img ="SELECT * FROM regvisitor WHERE userid = '".$row['userid']."' ";
$rs = mysqli_query($conn ,$img);
$rows = mysqli_fetch_array($rs);
$know = "SELECT status, favourite FROM likes WHERE postid = '".$_GET['id']."' AND userid = '".$_GET['sess_id']."' ";
$sr = mysqli_query($conn ,$know);
$numRowsLogin = mysqli_num_rows($sr);
$fet = mysqli_fetch_array($sr);
if($numRowsLogin) {
if($fet['status'] == 1) {
$like = '<a href="#Unlike" id='.$row['id'].' title="Unlike" class="like"><img src="http://cookzz.in/images/unlike.png" width="24px" height="24px"/></a>';
}
else
{
$like = '<a href="#Like" id='.$row['id'].' title="Like" class="like"><img src="http://cookzz.in/images/like.png" width="24px" height="24px"/></a>';
}
if($fet['favourite'] == 1) {
$fav = '<a href="#Added" id='.$row['id'].' class="fav" title="Added to Favourite"><img src="http://cookzz.in/images/added.png" width="24px" height="24px" style="vertical-align:middle;"/></a>';
}
else
{
$fav = '<a href ="#Add" id='.$row['id'].' class="fav" title="Add to Favourite"><img src="http://cookzz.in/images/add.png" width="24px" height="24px" style="vertical-align:middle;"/></a>';
}
}
else
{
$like = '<a href="#Like" id='.$row['id'].' title="Like" class="like"><img src="http://cookzz.in/images/like.png" width="24px" height="24px"/></a>';
$fav = '<a href ="#Add" id='.$row['id'].' class="fav" title="Add to Favourite"><img src="http://cookzz.in/images/add.png" width="24px" height="24px" style="vertical-align:middle;"/></a>';
}
$pro = $rows['profile_pic'];
$followchk ="SELECT * FROM frndlist WHERE followers ='".$_GET['sess_id']."' AND userid ='".$rows['userid']."' ";
$qury =mysqli_query($conn ,$followchk) or die('Could not fetch follow');
$following=mysqli_num_rows($qury);
if($following) {
$follow = '<a href ="#" id='.$rows['userid'].' class="follow" title="Unfollow" style="text-decoration:none; width:70px; font-weight:normal; text-align:center; display:inline-block; background-color:#DA2121; color:white; border-radius:4px;">Unfollow</a>';
}
else if($row['userid'] == $_GET['sess_id']) {
$follow = '';
}
else
{
$follow = '<a href ="#" id='.$rows['userid'].' class="follow" title="Follow" style="text-decoration:none; width:70px; font-weight:normal; text-align:center; display:inline-block; background-color:#DA2121; color:white; border-radius:4px;">Follow</a>';
}
$a = 'members/'.$rows['emailid'].'/'.$_GET['id'].'.txt';
$open = file_get_contents($a);
$start = strpos($open , '!@')+2;
$close = strpos($open , '@!')-2;
$title = substr($open , $start , $close);
$sta = strpos($open , '*()')+3;
$clo = strpos($open , '()*');
$stop = $clo - $sta;
$about = substr($open ,$sta ,$stop);
$sta = strpos($open , '&^')+2;
$clo = strpos($open , '&^');
$stop = $clo - $sta;
$process = substr($open ,$sta ,$stop);
if(file_exists($row['image'])) {
if($row['userid'] == $_GET['sess_id']) {
$del = $_GET['id'];
}
else
{
$del = '';
}
array_push($result , array('img' => $row['image'] , 'title' => $title , 'about' => $about , 'process' => $process , 'open' => $open , 'del' => $del , 'like' => $like , 'fav' => $fav , 'follow' => $follow , 'pro' => $pro , 'userid' => $rows['userid'] , 'fname' => $rows['fname'] , 'lname' => $rows['lname'] , 'count' => $row['count'] , 'serv' => $row['serv'] , 'minu' => $row['minu'] , 'postid' => $_GET['id']));
}
else
{
if($row['userid'] == $_GET['sess_id']) {
$del = $_GET['id'];
}
else
{
$del = '';
}
array_push($result , array('img' => '' , 'title' => $title , 'about' => $about , 'process' => $process , 'open' => $open , 'del' => $del , 'like' => $like , 'fav' => $fav , 'follow' => $follow , 'pro' => $pro , 'userid' => $rows['userid'] , 'fname' => $rows['fname'] , 'lname' => $rows['lname'] , 'count' => $row['count'] , 'serv' => $row['serv'] , 'minu' => $row['minu'] , 'postid' => $_GET['id']));
}
}
echo json_encode(array("result" =>$result));
?>