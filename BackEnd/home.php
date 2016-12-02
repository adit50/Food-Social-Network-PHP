background-image:url('images/background2.png');
<html>
<title>Home</title>
<link rel ="shortcut icon" href="images/favicon.png" type="image/png" />
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
height: 8%;
}
.p {
vertical-align: middle;
}
.banner{
width:100%;
height: 30px;
background-color:#DA2121;
}
body{
background-attachment: fixed;
}
.ser_bck{
margin-right:50%;
margin-left:21%;
margin-top:4%;
}
a:link{
text-decoration: none;
}
#notification::-webkit-scrollbar{
width:16px;
background-color:#cccccc;
}
#notification::-webkit-scrollbar-thumb{
background-color:#DA2121;
border-radius:10px;
}
#notification::-webkit-scrollbar-thumb-hover{
background-color:#cccccc;
border:1px solid #cccccc;
}
#notification::-webkit-scrollbar:active{
background-color:#cccccc;
border: 1px solid #cccccc;
}
#chef_to_follow::-webkit-scrollbar{
width:16px;
background-color:#cccccc;
}
#chef_to_follow::-webkit-scrollbar-thumb{
background-color:#BD1717;
border-radius:10px;
}
#chef_to_follow::-webkit-scrollbar-thumb-hover{
background-color:#cccccc;
border:1px solid #cccccc;
}
#chef_to_follow::-webkit-scrollbar:active{
background-color:#cccccc;
border: 1px solid #cccccc;
}
#add_to_circle::-webkit-scrollbar{
width:16px;
background-color:#cccccc;
}
#add_to_circle::-webkit-scrollbar-thumb{
background-color:#BD1717;
border-radius:10px;
}
#add_to_circle::-webkit-scrollbar-thumb-hover{
background-color:#cccccc;
border:1px solid #cccccc;
}
#add_to_circle::-webkit-scrollbar:active{
background-color:#cccccc;
border: 1px solid #cccccc;
}
</style>
<?php
session_start() ;
if (isset($_SESSION[' valid_user ']))
{
include('db.php');
$str = "SELECT * FROM regvisitor WHERE emailid = '".$_SESSION[' valid_user ']."' ";
$rs = mysqli_query($conn ,$str);
$rows = mysqli_fetch_array($rs);
echo '<body>';
echo '<table>';
echo '<tr>';
echo '<td>';
echo '<div class="header"><div><font size="6" face="Comic sans MS" color="white"><b>foodora.in</b></font><span style="padding-left:6%"><input type="text" name="peo" id="peo" onmouseout="show()" style="width:30%; height:50%; border-radius:15px;" placeholder="search .."><span style="padding-left:7%"><a href="post" style="text-decoration: none"><input type="button" style="background-color:green; color:white; font-size:20; border: 1px solid green; border-radius:10px;" value="Post a Recipe"></a><span style="padding-left:5%"><a href="#" style="text-decoration:none" id="msg" class="msg"><font color="white" size="4">Message ('.$rows["new_message"].')</font></a><span style="padding-left:5%"><a href="#" class="notification" style="text-decoration: none"><font color="white" size="4">Notification ('.$rows["new_notification"].')</font></a><span style="padding-left:5%"><a href="Logout" style="text-decoration: none"><font color="white" size="4">Logout</font></a></div></div>';
echo '</td>';
echo '</tr>';
echo '</table>';
echo '<div id="notification" class="notification" style="position:absolute; overflow:auto; top:8%; left:71%; border: 3px solid brown; height:40%; width:20%; z-index:99999; background-color:brown;"></div>';
echo '<div class="ser_bck" style="height:300px;">';
echo '<div id="res_pep" style="position:absolute; z-index:99999; top:6%; left:17%; width:29%; background-color:white; border: solid 3px green;vertical-align: middle; border-bottom-left-radius:15px; border-bottom-right-radius:15px; overflow-y:auto; visibility:hidden;"></div>';
echo '</div>';
echo '<div id="sidebar" align="center" style="width:21%; height:100%; border-radius:15px; position:absolute; top:10%; left:1%;">';
echo '<div class="data" style="width:100%; height:20%; background-color:#DA2121; border: solid 1px #F2F2F2; border-radius:15px;" align="center">';
if(file_exists($rows['profile_pic'])) {
echo '<img src='.$rows['profile_pic'].' style="width:40%; height:60%; border-top-left-radius:15px; border-right: 5px solid white; border-bottom: 5px solid white" align="left" id="upload" class="upload"></img>';
}
else
{
echo '<img src="images/avatar.jpg" style="width:40%; height:60%; border-top-left-radius:15px;" align="left" id="upload" class="upload"></img>';
}
echo '<p style="position:absolute; left:50%;"><a href="profile" style="text-decoration:none;"><font color="white" size="5"><b>'.$_SESSION[' fname '].' '.$_SESSION[' lname '].'</b></font></a></p>';
echo '<div class="total_followers" style="position:absolute; width:50%; height:5%; top:16%;">';
echo '<font color="white" size="4">Followers('.$rows['total_followers'].')</font>';
echo '</div>';
echo '<div class="total_following" style="position:absolute; width:50%; height:5%; top:16%; left:50%;">';
echo '<font color="white" size="4">Following ('.$rows['total_following'].')</font>';
echo '</div>';
echo '</div><br/>';
echo '<div class="search_recipe" style="width:100%; height:10%; background-color:#DA2121; border: solid 1px #F2F2F2; border-radius:15px;" align="center">';
echo '<font size="5" color="white">Search Recipe</font>';
echo '<input type="textarea" id="sea_rec" style="width:80%; top:5%; border-radius:15px;" placeholder="Search recipe...">';
echo '<div class="ser">';
echo '<div id="res_rec" align="left" style="position:absolute; z-index:99999; top:32%; left:10%; width:80%; background-color:white; border: solid 3px green;vertical-align: middle; border-bottom-left-radius:15px; border-bottom-right-radius:15px; overflow-y:auto; visibility:hidden;"></div>';
echo '</div>';
echo '</div><br/>';
echo '<div class="Recipe"  align="center" style="width:100%; height:30%; background-color:#DA2121; border: solid 1px #F2F2F2; border-radius:15px;">';
echo '<font color="white" size="5"><u>Recipe of Day</u></font><br/><br/>';
$get = mysqli_query($conn ,"SELECT * FROM post WHERE id = 2");
$all = mysqli_fetch_array($get);
if(file_exists($all['image'])) {
echo '<center><a href="viewpost?id=2" style="text-decoration:none;"><font size="5" color="white"><b>'.$all['title'].'</b></font></a></center>';
echo '<img src='.$all['image'].' style="width:90%; height:60%;">';
}
echo '</div><br/>';
echo '</div>';
echo '<span id="loading" style="position:absolute; top:50%; left:47%;"><img src="images/big-snake.gif" /></span>';
echo '<div class="mseg" id="mseg" style="position:absolute; top:20%; left:30%; width:40%; height:50%; background-color:white; z-index:9999; border: solid 3px green; border-radius:15px; visibility:hidden;"></div>';
echo '<div class="cross" id="cross" style="position:absolute; top:19%; left:69%; z-index:9999; visibility:hidden; "><img src="images/cross.png" style="height:32px; width:32px;" id="cross" class="cross"/></div>';
echo '<div id ="body" align="center" style="position:absolute; top: 10%; left:25%; width:50%;">';
echo '</div>';
echo '<div id="sidebar" style="width:20%; postion:absolute; right:00;"></div>';
echo '<div style="overflow-y:auto; width:20%; height:45%; border: solid 1px green; position:absolute; top:8%; right:00; " id="chef_to_follow" class="chef_to_follow"></div>';
if($_SESSION['status'] == 1) {
echo '';
}
else
{
echo '<div style="overflow-y:auto; width:20%; height:60%; border: solid 1px green; position:absolute; top:50%; right:00; " id="add_to_circle" class="add_to_circle">';
echo '</div>';
}
echo '<div class="upload_cross" id="upload_cross" style="position:absolute; top:19%; left:69%; z-index:99999; visibility:hidden;"><img src="images/cross.png" style="height:32px; width:32px;" id="upload_cross" class="upload_cross"/></div>';
echo '<div class="upload_pro" id="upload_pro" style="position:absolute; top:20%; left:30%; width:40%; height:50%; background-color:white; z-index:9999; border: solid 3px green; border-radius:15px; visibility:hidden;">';
 echo '<div id="formdiv">
 <div class="upload_header" id="upload_header" style="border-top-left-radius:12px; border-top-right-radius:12px; left:-0%; background-color:#BD1717;position:absolute;top: 0px;right: 1px; width:100%;height: 8%; color:white; font-size:20; font-weight:bold; visibility:hidden;">  Upload Profile pic</div>
                    <form id="form" action="upload.php" method="post"enctype="multipart/form-data">

                        <div id="upload">
						<img src="images/upload.png" id="image" class="image" style="position:absolute; top:20%; left:5%;" />
                            <input type="file" name="file" id="file" style=" width:50%; height:115px; visibility:hidden;"/>
                        </div>
                        <br/>
                        <input type="submit" id="submit" name="submit" value="Upload" style="position:absolute; top:80%; left:5%; width:30%; height:7%; background-color:green; border-radius:15px; color:white; visibility:disabled;"/>
                    </form>
                <div id="clear"></div>
                <div id="preview"><img id="previewimg" src="" style="position:absolute; top:20%; left:40%; width:50%; height:60%;"/><img id="deleteimg" src="images/cross.png" style="position:absolute; visibility:hidden; top:16%; left:88%; height:32px; width:32px;"  />
				</div></div>';
				echo'</div>';
echo '</body>';
?>
<script type="text/javascript" src="jquery-latest.js"></script>
<script type="text/javascript">
document.getElementById("submit").disabled = true;
$(document).ready(function() {
//Function for preview image.
    $(function() {
        $(":file").change(function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
    function imageIsLoaded(e) {
	    $('#deleteimg').css("visibility", "visible");
        $('#message').css("display", "none");
        $('#preview').css("display", "block");
        $('#previewimg').attr('src', e.target.result);
		document.getElementById("submit").disabled = false;
    };


//Function for deleting preview image.
    $("#deleteimg").click(function() {
        $('#preview').css("display", "none");
        $('#file').val("");
    });

//Function for displaying details of uploaded image.
    $("#submit").click(function() {
        $('#preview').css("display", "none");
        $('#message').css("display", "block");
    });
		$("#image").click(function() {
$("#file").click();
});
});
</script>
<script type="text/javascript" src="jquery-latest.js"></script>
<script type="text/javascript">
$(' #body ').load('Login.php').fadeIn("slow");
$(' #notification ').load('notification.php').fadeIn("slow");
$("#notification").slideToggle(00);
document.getElementById('loading').innerHTML="";
function show()
{
if(document.getElementById("peo").value.length == 0) {
document.getElementById("res_pep").style.visibility = 'hidden';
}
if(document.getElementById("sea_rec").value.length == 0) {
document.getElementById("res_rec").style.visibility = 'hidden';
}
}
$(' #chef_to_follow ').load('Chef_to_follow.php').fadeIn("slow");
$(' #add_to_circle ').load('add_to_circle.php').fadeIn("slow");
</script>
<script type="text/javascript" src="jquery-latest.js"></script>
<script type="text/javascript">
$('#peo').keyup(function() {
document.getElementById("res_pep").style.visibility = 'visible';
var name = $('#peo').val();
$.post('search.php' , {peo:name} , function(data) {
$('#res_pep').html(data);
});
});
$("#peo").keyup(function() {
if(document.getElementById("peo").value.length == 0) {
document.getElementById("res_pep").style.visibility = 'hidden';
}
});
$('#sea_rec').keyup(function() {
document.getElementById("res_rec").style.visibility = 'visible';
var name = $('#sea_rec').val();
$.post('search_rec.php' , {rec:name} , function(data) {
$('#res_rec').html(data);
});
});
$("#sea_rec").keyup(function() {
if(document.getElementById("sea_rec").value.length == 0) {
document.getElementById("res_rec").style.visibility = 'hidden';
}
});
$(document).ready(function() {
$(document).on('click' , '.msg', function() {
document.getElementById("mseg").style.visibility = 'visible';
document.getElementById("cross").style.visibility = 'visible';
$(' #mseg ').load('message_list.php').delay(400).fadeIn(1200);
});
});
$(document).ready(function() {
$(document).on('click' , '.cross', function() {
document.getElementById("mseg").style.visibility = 'hidden';
document.getElementById("cross").style.visibility = 'hidden';
document.getElementById("msg_header").style.visibility = 'hidden';
});
});
$(document).ready(function() {
$(document).on('click' , '.upload_cross', function() {
document.getElementById("upload_header").style.visibility = 'hidden';
document.getElementById("upload_cross").style.visibility = 'hidden';
document.getElementById("upload_pro").style.visibility = 'hidden';
});
});
$(document).ready(function() {
$(document).on('click' , '.upload', function() {
document.getElementById("upload_header").style.visibility = 'visible';
document.getElementById("upload_cross").style.visibility = 'visible';
document.getElementById("upload_pro").style.visibility = 'visible';
});
});
$(document).ready(function() {
$(document).on('click' , '.notification', function() {
$("#notification").slideToggle(1000);
});
});
</script>
<?php
}
else
{
header('location: index');
}
?>