<?php
header('Access-Control-Allow-Origin:*');
if(isset($_GET['email'])) {
include('db.php');
$img = "SELECT * FROM regvisitor WHERE emailid = '".$_GET['email']."' ";
$rs = mysqli_query($conn ,$img);
$chk = mysqli_num_rows($rs);
if($chk) {
$rows = mysqli_fetch_array($rs);
$to = $_GET['email'];
$subject = "Forget Password";
$message = "Your password for ".$_GET['email']." is ".$rows['password']." .                                             Cookzz production &copy; 2015";
$header = "From: Cookzz.in \r\n";
$retval = mail ($to,$subject,$message,$header); 
if($retval == true)
{
echo 'Password sent';
}
else
{
echo 'Something went wrong';
}
}else{
echo 'Email does not exist';
}
}
?>