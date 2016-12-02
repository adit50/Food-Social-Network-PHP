<?php
header('Access-Control-Allow-Origin:*');
include('db.php');
if(isset($_POST['name']))
{
$qryLogin ="SELECT emailid FROM regvisitor WHERE emailid = '".$_POST['email']."'  ";
$rsLogin =mysqli_query($conn ,$qryLogin);
$numRowsLogin=mysqli_num_rows($rsLogin);
if($numRowsLogin)
{
echo 'Account already Exist !!';
}
else
{
$qryAddUser= "INSERT INTO regvisitor (emailid, fname, lname, password , profile_pic , sex) VALUES ( '".$_POST['email']."',  '".$_POST['name']."',  '',  '".$_POST['pass']."', 'images/avatar.jpg' , '".$_POST['sex']."') ";
mysqli_query($conn ,$qryAddUser);
$new_id = mysqli_insert_id($conn);
echo $new_id;
mkdir("members/".$_POST['email']."", 0775);
}
}
?>