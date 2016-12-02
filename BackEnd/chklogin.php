<?php
header('Access-Control-Allow-Origin:*');
if(isset($_POST['txtEmail']) && isset($_POST['txtPassword']))
{
$userid = $_POST['txtEmail'];
$password =$_POST['txtPassword'];
include('db.php');
$qryLogin="SELECT * FROM regvisitor WHERE emailid = '".mysqli_real_escape_string($conn ,$_POST['txtEmail'])."' AND password = '".mysqli_real_escape_string($conn ,$_POST['txtPassword'])."' ";
$rsLogin = mysqli_query($conn ,$qryLogin) or die('Could not connect');
$numRowsLogin=mysqli_num_rows($rsLogin) or die('no');
if($numRowsLogin)
{
$_SESSION[' valid_user '] = $userid;
$strSQL = "SELECT userid , fname , lname , status FROM regvisitor WHERE emailid = '".$_SESSION[' valid_user ']."' ";
$rs = mysqli_query($conn ,$strSQL);
while($row = mysqli_fetch_array($rs)) {
$_SESSION[' user_id '] = $row['userid'];
$_SESSION[' fname '] = $row['fname'];
$_SESSION[' lname '] = $row['lname'];
}
echo $_SESSION[' user_id '];
}
else
{
echo 'no';
}
}
?>