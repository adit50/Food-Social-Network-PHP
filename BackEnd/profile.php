<html>
<link rel ="shortcut icon" href="images/favicon.png" type="image/png" />
<title>Profile</title>
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
</style>
<body>
<?php
session_start() ;
if (isset($_SESSION[' valid_user ']))
{
include('db.php');
$strSQL = "SELECT * FROM regvisitor WHERE emailid = '".$_SESSION[' valid_user ']."' ";
$rs = mysql_query($strSQL);
$row = mysql_fetch_array($rs);
echo '<div class="header"><div><font size="6" style="font:comic;" color="white"><b>foodora.in</b></font><span style="padding-left:5%"><input type="text"  id="peo" style="width:30%; height:50%; border-radius:15px;" placeholder="search .."><span style="padding-left:5%"><a href="post"><input type="button" style="background-color:green; color:white; font-size:20; border: 1px solid green; border-radius:10px;" value="Post a Recipe"></a><span style="padding-left:4%"><a href="home" style="text-decoration: none"><font color="white" size="4">Home</font></a><span style="padding-left:4%"><a href="#" style="text-decoration:none" id="msg" class="msg"><font color="white" size="4">Message ('.$row["new_message"].')</font></a><span style="padding-left:4%"><a href="#" class="notification" style="text-decoration: none"><font color="white" size="4">Notification ('.$row["new_notification"].')</font></a><span style="padding-left:4%"><a href="Logout" style="text-decoration: none"><font color="white" size="4">Logout</font></a></div></div>';
echo '<div id="notification" class="notification" style="position:absolute; top:8%; overflow:auto; left:72%; border: 3px solid brown; height:40%; width:20%; z-index:99999; background-color:brown;"></div>';
echo '<div class="ser_bck">';
echo '<div id="res_pep" style="position:absolute; z-index:99999; top:6%; left:16%; width:29%; background-color:white; border: solid 3px green; border-bottom-left-radius:15px; border-bottom-right-radius:15px; overflow-y:auto; visibility:hidden;"></div>';
echo '</div>';
echo '<div id="right_circle" style="width:12%; height:75%; overflow-y:auto; z-index:99999; border: solid 1px #DA2121; border-radius:15px; background-color: #DA2121; position:absolute; top:23%; right:0%;"></div>';
echo '<div id="right_following" style="width:12%; height:75%; overflow-y:auto;  z-index:99999; border: solid 1px #DA2121; border-radius:15px; background-color: #DA2121; position:absolute; top:23%; right:0%;"></div>';
echo '<div id="right_followers" style="width:12%; height:75%;  overflow-y:auto; z-index:99999; border: solid 1px #DA2121; border-radius:15px; background-color: #DA2121; position:absolute; top:23%; right:0%;"></div>';
echo '<div id="sidebar" align="center" style="width:20%; border: solid 1px #DA2121; border-top-left-radius:15px; border-top-right-radius:15px; position:absolute; top:10%; left:5%;">';
echo '<div class="banner" style="height:5%; border-top-left-radius:15px; border-top-right-radius:15px;"> <font color="white" size="5"><b>'.$_SESSION[' fname '].' '.$_SESSION[' lname '].'</b></font></div>';
if(file_exists($row['profile_pic'])) {
echo '<div class ="pro_pic"> <img src ='.$row['profile_pic'].' style="width:100%; height:40%; border: solid 1px #DA2121;" id="upload" class="upload"></div>';
}
else
{
echo '<div class ="pro_pic"> <img src ="images/avatar.jpg" style="width:100%; height:40%; border: solid 2px #DA2121;" id="upload" class="upload"></div>';
}
echo '<div class="following" style="width:100%; height:5%; background-color:#DA2121; border: solid 1px orange;">';
echo '<a href="#" style="text-decoration:none;"  title="Chef you follow"><font color="white" size="6">Following ('.$row['total_following'].')</font></a><br/>';
echo '</div>';
echo '<div class="favourite" style="width:100%; height:5%; background-color:#DA2121; border: solid 1px orange;">';
echo '<a href="favourite?id='.$_SESSION[' user_id '].'" title="Favourite"><font color="white" size="6">Favourite</font></a><br/>';
echo '</div>';
echo '<div class="followers" style="width:100%; height:5%; background-color:#DA2121; border: solid 1px orange;">';
echo '<a href="#" title="Followers"><font color="white" size="6">Followers ('.$row['total_followers'].')</font></a>';
echo '</div>';
echo '<div class="setting" style="width:100%; height:5%; background-color:#DA2121; border: solid 1px orange;">';
echo '<a href="setting" title="Settings"><font color="white" size="6">Setting</font></a><br/>';
echo '</div>';
echo '</div>';
echo '<span id="loading" style="position:absolute; top:50%; left:47%;"><img src="images/big-snake.gif" alt="Loading.."/></span>';
echo '<div id="sidebar" align="center" style="width:20%; position:absolute; top:10%; left:80%; height:10%;">';
echo '<div class="search_recipe" style="width:100%; height:100%; background-color:#DA2121; border: solid 1px #F2F2F2; border-radius:15px;" align="center">';
echo '<font size="5" color="white">Search Recipe</font>';
echo '<input type="textarea" id="sea_rec" style="width:80%; border-radius:15px;" placeholder="Search recipe...">';
echo '</div>';
echo '</div>';
echo '<div class="ser">';
echo '<div id="res_rec" style="position:absolute; z-index:99999; top:18%; left:80%; width:20%; background-color:white; border: solid 3px green; vertical-align: middle; border-bottom-left-radius:15px; border-bottom-right-radius:15px; overflow-y:auto; visibility:hidden;"></div>';
echo '</div>';
echo '<div class="mseg" id="mseg" style="position:absolute; top:20%; left:32%; width:40%; height:50%; background-color:white; z-index:99999; border: solid 3px green; border-radius:15px; visibility:hidden;"></div>';
echo '<div class="cross" id="cross" style="position:absolute; top:19%; left:71%; z-index:99999; visibility:hidden;"><img src="images/cross.png" style="height:32px; width:32px;" id="cross" class="cross"/></div>';
echo '<div id ="body" align="center" style="position:absolute; top:10%; left:28%; width:50%;">';
echo '</div>';
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
?>
<script type="text/javascript" src="jquery-latest.js"></script>
<script type="text/javascript">
$(' #body ').load('Member.php').fadeIn("slow");
$(' #notification ').load('notification.php').fadeIn("slow");
$(' #right_circle ').load('friend_list?id=<?php echo $_SESSION[' user_id ']; ?>').fadeIn("slow");
$(' #right_following ').load('following?id=<?php echo $_SESSION[' user_id ']; ?>').fadeIn("slow");
$(' #right_followers ').load('followers_list.php?id=<?php echo $_SESSION[' user_id ']; ?>').fadeIn("slow");
$("#right_circle").animate({width:'toggle'}, 00);
$("#right_following").animate({width:'toggle'}, 00);
$("#right_followers").animate({width:'toggle'}, 00);
$("#notification").slideToggle(00);
document.getElementById('loading').innerHTML="";
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
$(' #mseg ').load('message_list.php').fadeIn(5000);
});
});
$(document).ready(function() {
$(document).on('click' , '.cross', function() {
document.getElementById("msg_header").style.visibility = 'hidden';
document.getElementById("mseg").style.visibility = 'hidden';
document.getElementById("cross").style.visibility = 'hidden';
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
$(document).ready(function() {
$(document).on('click' , '.circle', function() {
$("#right_circle").animate({width:'toggle'}, 1200);
});
});
$(document).ready(function() {
$(document).on('click' , '.following', function() {
$("#right_following").animate({width:'toggle'}, 1200);
});
});
$(document).ready(function() {
$(document).on('click' , '.followers', function() {
$("#right_followers").animate({width:'toggle'}, 1200);
});
});
</script>
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
<?php
}
else
{
header('location: index');
}
?>
</body>
</html>