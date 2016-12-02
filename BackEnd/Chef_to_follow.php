<?php
session_start();
echo '<div class = "chef_to_follow" style="background-color:#DA2121; width:100%; height:40px;" align="center"; vertical-align:"middle";><font color="white" size="6">Chef To Follow</font></div>';
include('db.php');
$getchef = "SELECT * FROM regvisitor WHERE status = '1'  ORDER BY total_followers DESC";
$rs = mysql_query($getchef);
while($row = mysql_fetch_array($rs)) {
if($row['userid'] == $_SESSION[' user_id ']) {
echo '';
}
else
{
$chk = "SELECT * FROM frndlist WHERE userid = '".$row['userid']."' AND followers = '".$_SESSION[' user_id ']."' ";
$sr = mysql_query($chk) or die (mysql_error());
$ar = mysql_num_rows($sr);
if (!$ar) {
echo '<div class="chef_to_follow" style="position:relative; width:100%; height:100%;" align="center">';
echo '<a href="ViewProfile?id='.$row['userid'].'" style="text-decoration:none;"><font size="5">'.$row['fname'].' '.$row['lname'].'</font></a><br/>';
echo '<img src='.$row['profile_pic'].' style="position:absolute; height:60%; width:90%; left:5%;" />';
echo '<input type="button" value="follow" id='.$row['userid'].' title="follow" class="follow" style="position:absolute; top:70%; width:90%; left:5%; height:9%; background-color:#BD1717; color:white; font-weight:bold;">';
echo '</div>';
echo '<hr>';
}
else
{
echo '';
}
}
}
?>
<script type="text/javascript" src="jquery-latest.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$(document).on('click' , '.follow', function() {
if($(this).attr( 'title' )=='follow') { 
var that = this;
$.get('follow.php',{id:$(this).attr('id')},function(response) {
$(that).attr('value' , response);
});
return false;
};
});
});
</script>