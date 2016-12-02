<html>
<head>
    <title>Post a recipe</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<style type="text/css">
      img {border-width: 0}
      * {font-family:'Lucida Grande', sans-serif;}
</style>
<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>

<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>

<script>
        $(document).ready(function() {
        //elements
        var progressbox     = $('#progressbox');
        var progressbar     = $('#progressbar');
        var statustxt       = $('#statustxt');
        var submitbutton    = $("#SubmitButton");
        var myform          = $("#UploadForm");
        var output          = $("#output");
        var completed       = '0%';
                $(myform).ajaxForm({
                    beforeSend: function() { //brfore sending form
                        submitbutton.attr('disabled', ''); // disable upload button
                        statustxt.empty();
                        progressbox.slideDown(); //show progressbar
                        progressbar.width(completed); //initial value 0% of progressbar
                        statustxt.html(completed); //set status text
                        statustxt.css('color','#000'); //initial color of status text
                    },
                    uploadProgress: function(event, position, total, percentComplete) { //on progress
                        progressbar.width(percentComplete + '%') //update progressbar percent complete
                        statustxt.html(percentComplete + '%'); //update status text
                        if(percentComplete>50)
                            {
                                statustxt.css('color','#fff'); //change status text to white after 50%
                            }
                        },
                    complete: function(response) { // on complete
                        output.html(response.responseText); //update element with received data
                        myform.resetForm();  // reset form
                        submitbutton.removeAttr('disabled'); //enable submit button
                        progressbox.slideUp(); // hide progressbar
						$('#preview').css("display", "none");
                    }
            });
        });

function coloum() {
var x = document.getElementById("count").value;
document.getElementById("count").value = parseInt(x) + 1;
var a = document.getElementById("count").value;
var ing = document.createElement("INPUT");
ing.type ="text";
ing.setAttribute('id' , a+'I');
ing.setAttribute('placeholder', 'Ingredient');
ing.setAttribute('name', a+'I');
ing.style.fontSize = "20px";
var qty = document.createElement("INPUT");
qty.type ="text";
qty.setAttribute('id' , a+'Q');
qty.setAttribute('placeholder', 'Qty- For ex : 1/3');
qty.setAttribute('name', a+'Q');
qty.style.fontSize ="20px";
var sel = document.createElement("select");
sel.setAttribute('id' , a+'S');
sel.setAttribute('name', a+'S');
sel.style.fontSize ="20px";
var opt = document.createElement("option");
opt.text ="Drop";
sel.add(opt);
var opt = document.createElement("option");
opt.text ="Pinch";
sel.add(opt);
var opt = document.createElement("option");
opt.text ="Spoon";
sel.add(opt);
var opt = document.createElement("option");
opt.text ="TableSpoon";
sel.add(opt);
var opt = document.createElement("option");
opt.text ="Cup";
sel.add(opt);
var opt = document.createElement("option");
opt.text ="Bunch";
sel.add(opt);
var opt = document.createElement("option");
opt.text ="Inch";
sel.add(opt);
var opt = document.createElement("option");
opt.text ="Gram";
sel.add(opt);
var opt = document.createElement("option");
opt.text ="Kilogram";
sel.add(opt);
var opt = document.createElement("option");
opt.text ="Packet";
sel.add(opt);
var opt = document.createElement("option");
opt.text ="Glass";
sel.add(opt);
var opt = document.createElement("option");
opt.text ="Jar";
sel.add(opt);
var opt = document.createElement("option");
opt.text ="Millilitre";
sel.add(opt);
var opt = document.createElement("option");
opt.text ="Litre";
sel.add(opt);
var opt = document.createElement("option");
opt.text ="Taste";
sel.add(opt);
var remo = document.createElement("a");
remo.setAttribute('id' , parseInt(a));
remo.innerHTML = "Remove";
remo.setAttribute('onclick' , 'javascript:remo(this.id)');
remo.setAttribute('href', '#');
document.getElementById("post").appendChild(ing);
document.getElementById("post").appendChild(qty);
document.getElementById("post").appendChild(sel);
document.getElementById("post").appendChild(remo);
}
function remo(value) {
var pst = document.getElementById("post");
var ind = document.getElementById(value+'I');
var quan = document.getElementById(value+'Q');
var sele = document.getElementById(value+'S');
var cut = document.getElementById(value);
pst.removeChild(ind);
pst.removeChild(quan);
pst.removeChild(sele);
pst.removeChild(cut);
var x = document.getElementById("count").value;
document.getElementById("count").value = parseInt(x) - 1;
}

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
function validateForm() {
if(document.getElementById("title").value == "") {
document.getElementById("title").style.border = "2px solid red";
return false;
}
if(document.getElementById("about").value == ""){
document.getElementById("about").style.border = "2px solid red";
return false;
}
var k = document.getElementById("count").value;
for(var i =1; i <= k; i++) {
if(document.getElementById(i+'I').value.length > 1 && document.getElementById(i+'Q').value == ""){
document.getElementById(i+'Q').style.border ="2px solid red";
return false;
}else if (document.getElementById(i+'Q').value.length > 1 && document.getElementById(i+'I').value == ""){
document.getElementById(i+'I').style.border ="2px solid red";
return false;
}
if(document.getElementById(i+'Q').value == "" && document.getElementById(i+'I').value == "") {
var pst = document.getElementById("post");
var ind = document.getElementById(i+'I');
var quan = document.getElementById(i+'Q');
var sele = document.getElementById(i+'S');
var cut = document.getElementById(i);
pst.removeChild(ind);
pst.removeChild(quan);
pst.removeChild(sele);
pst.removeChild(cut);
var x = document.getElementById("count").value;
document.getElementById("count").value = parseInt(x) - 1;
}
}
}
function chk() {
if(document.getElementById("title").value.length > 1) {
document.getElementById("title").style.border = "2px solid white";
}
}
function chek() {
if(document.getElementById("about").value.length > 1) {
document.getElementById("about").style.border = "2px solid white";
}
}


    </script>
<style>
#progressbox {
border: 1px solid #0099CC;
padding: 1px; 
position:relative;
width:400px;
border-radius: 3px;
margin: 10px;
display:none;
text-align:left;
}
#progressbar {
height:20px;
border-radius: 3px;
background-color: #003333;
width:1%;
}
#statustxt {
top:3px;
left:50%;
position:absolute;
display:inline-block;
color: #000000;
}
</style>

</head>
<body>
<div id="to_post" align="center" style="border: 2px solid green; position:absolute; width:50%; left:25%;">
<form action="post_action.php" method="post" onSubmit="return validateForm();" enctype="multipart/form-data" id="UploadForm">
<table width="500" border="0">
  <tr>
    <td><div id="preview"  style="width:20%; height:20%; left:0%; position:absolute; border:2px solid red;" ><img id="previewimg" src="" style="width:100%; height:50%;"/><img id="deleteimg" src="images/cross.png" style="width:18px; height:18px; position:absolute; left:90%; visibility:hidden;" /></div></td>
    <td><input name="ImageFile" type="file" id="file"/></td>
  </tr>
  <tr>
  </tr>
</table>
<div id="progressbox"><div id="progressbar"></div ><div id="statustxt">0%</div ></div>
<div id="output"></div>
<div id = "name_recipe"><input type="text" id="title" name="title" class="title" onkeyup="chk();" style="font-size:40px; font-weight:bold; border: 1px solid white;" placeholder="Name of The Recipe..." /></div><select name="share" style="font-size:20px;"><option value="Recipe">Recipe</option><option value="Idea">Idea</option><option value="Trick">Trick</option><option value="Innovation">Innovation</option></select><br/><br/>
<div id="post" align="center" style="position:relative; width:80%;">
<div id = "ingredient"><input type="text" id="1I" name="1I" placeholder="Ingredient" style="font-size:20px;"><input type="text" placeholder="Qty" id="1Q" name="1Q" style="font-size:20px;"><select id="1S" name="1S" style="font-size:20px;"><option value="Drop">Drop</option><option value="Pinch">Pinch</option><option value="Spoon">Spoon</option><option value="Table Spoon">Table Spoon</option><option value="Cup">Cup</option><option value="Bunch">Bunch</option><option value="Inch">Inch</option><option value="Gram">Gram</option><option value="Kilogram">Kilogram</option><option value="Packet">Packet</option><option value="Jar">Jar</option><option value="Millilitre">Millilitre</option><option value="Litre">Litre</option><option value="Glass">Glass</option><option value="Taste">Taste</option></select></div>
</div>
<div id="about_box" style=" border-radius:15px;"><textarea rows="4" cols="50" id="about" onkeyup="chek();"  name="about" class="about" style="width:90%; resize:none; border-radius:15px; -webkit-border-bottom-right-radius: 10px; -moz-border-bottom-right-radius: 10px; font-size:20; border : solid 1px white; " placeholder="About.."></textarea></div>
<div id="process" style=" border-radius:15px;"><textarea rows="4" cols="50" id="process" name="process" class="process" style="width:90%; resize:none; font-size:20; border : solid 1px white; " placeholder="process.."></textarea></div>
<input type="submit"  id="SubmitButton" value="Upload" />
<input type="button" class="add" value="Add" onclick="coloum();"/>
<input type="text" id="count" name="count" value="1"/>
</form>
</div>
</body>
</html>
<script>
</script>