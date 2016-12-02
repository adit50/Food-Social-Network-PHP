<?php
header('Access-Control-Allow-Origin:*');
include('db.php');
$chk = "SELECT * FROM regvisitor WHERE userid = '".$_GET['sess_id']."' ";
$qry = mysqli_query($conn ,$chk);
$pass = mysqli_fetch_array($qry);
if($_GET['curr'] == $pass['password']) { 
$update = "UPDATE regvisitor SET fname = '".$_GET['fname']."' , lname = '".$_GET['lname']."' , password = '".$_GET['password']."' , sex= '".$_GET['sex']."' WHERE userid = '".$_GET['sess_id']."' ";
if(mysqli_query($conn ,$update)) {
echo 'Ok';
} 
}else{
echo "Sorry current password is not correct";
}
?>