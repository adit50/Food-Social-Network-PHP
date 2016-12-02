<html>
<link rel ="shortcut icon" href="images/favicon.png" type="image/png" />
<title>Settings</title>
<style type="text/css">
.header {
background-color:#BD1717;
margin:0px; 
padding:0px; 
border:0px;
position:absolute;
top: 0px;
right: 1px;
left: 1px;
width:100%;
height: 7%;
}
</style>
</html>
<?php
session_start();
include('db.php');
$img = "SELECT * FROM regvisitor WHERE userid ='".$_SESSION[' user_id ']."' ";
$rs = mysql_query($img);
$rows = mysql_fetch_array($rs);
echo '<div class = "header" style="background-color:#DA2121; width:100%; height:7%;" align="left"; vertical-align:"middle";><table><tr><td width="30%"><a href='.$_SERVER['HTTP_REFERER'].' style="text-decoration:none;" align="left"><span style="color:white; font-size:40; font-family:arial;">X</span></a></td><td><a href="profile"><img src='.$rows['profile_pic'].' width="52px" height="40px" /></a> </td><td><font color="white" size="6">Settings</font></td></tr></table></div><br/>';
echo '<div class="password" style="position:absolute; top:20%; left:35%; height:30%; width:30%; background-color:#D8D8D8; border-radius:15px;"  align="center">';
echo '<font size="6" color="#DA2121"><b>Change Password</b></font><br/><br/>';
echo '<form  method="post" name="frm" action="setting.php?action=change" onSubmit="return validate()">';
echo '<table><tr>';
echo '<td>';
echo '<font color="black" size="4">Enter your new password: </td><td><input type="password" name="pass" id="pass"/></td>';
echo '</tr>';
echo '<tr>';
echo '<td>';
echo '<font color="black" size="4">Confirm password: </td><td><input type="password" name="conf_pass" id="conf_pass"/></td>';
echo '</tr></table>';
echo '<br/><br/>';
echo '<input type="submit" value="Save" title="Save" class="save" style="background-color:green; border: 1px solid green; color:white; width:60px; height:30px; border-radius:10px;">';
echo '</form>';
echo '</div>';
echo '<span style="position:absolute; top:60%; left:48%;"><font size="7">OR</font></span>'; 
echo '<div id="delete" class="delete" style="position:absolute; top:75%; width:100%;"><hr color="black" /></div>';
echo '<div id="delete" class="delete" style="position:absolute; top:80%; left:40%;"><a href="#" style="text-decoration:none;" onclick=not();><font color="#DA2121" size="8">Delete my Account</font></a></div>';
echo '<br/><br/>';
echo '<div id="delete" class="delete" style="position:absolute; top:90%; left:10%;"><font color="#DA2121" size="4">Foodora.in &copy; 2015. </font>';
echo '</div>';
?>
<script type="text/javascript">
function validate()
{
var p = document.getElementById('pass').value;
var cp = document.getElementById('conf_pass').value;
if(p == cp) {
 return true;
 }
 else
 {
 alert("Password does not match !!");
 return false;
 }
 }
 </script>
   <?php
if(isset($_GET['action'])) {
$up = "UPDATE regvisitor SET password = '".mysql_real_escape_string($_POST['pass'])."' WHERE userid = '".$_SESSION [' user_id ']."' ";
$rs = mysql_query($up);
if($rs) {
echo '<div id="chan" style="position:absolute; top:7%; background-color:#F4FA58; width:100%;"><font size="4">Your password successfully changed !!</font></div>';
}
else
{
echo '<div id="chan" style="position:absolute; top:8%; background-color:#F4FA58; width:100%;"><font size="4">Something went wrong..</font></div>';
}
}
?>