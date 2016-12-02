<?php
if(isset($_GET['email'])) {
$to = 'aditraj2@gmail.com';
$subject = $_GET['sub'];
$message = 'Email - '.$_GET['email'].'               Message - '.$_GET['msz'].'                                            Cookzz production &copy; 2015';
$header = "From: Cookzz.in - Customer \r\n";
$retval = mail ($to,$subject,$message,$header); 
if($retval == true) {
echo 'Thanks for emailing us , we will reply you soon :)';
}else{
echo 'Something went wrong , try agin';
}
}
?>