<?php
header('Access-Control-Allow-Origin:*');
session_start();
include('db.php');
if (empty($_FILES['file']['name'])) {
echo "You didn't chosen the file";
}
$todir = 'members/'.$_POST['email'].'/';
$RandomNum   = rand(0, 9999999999);
    $info = explode('.', strtolower( $_FILES['file']['name']) ); // whats the extension of the file
	$png = 'png';
     if(move_uploaded_file( $_FILES['file']['tmp_name'], $todir . basename($_FILES['file']['name']-$RandomNum) ) )
	 {
     $handle= 'members/'.$_POST['email'].'/'.basename($_FILES['file']['name']-$RandomNum);
		  $query = "UPDATE regvisitor SET profile_pic = '".$handle."' WHERE userid = '".$_POST['id']."' ";
		  if(mysqli_query($conn ,$query)) {
		  echo "Upload Sucessful";
	 }
	 }
	 else
	 {
	 echo "Something wen't wrong";
	 }
	 ?>
	 