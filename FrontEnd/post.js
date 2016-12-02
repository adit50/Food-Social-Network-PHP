//THIS JS FILE USED FOR POST FUNCTIONS LIKE TO ADD COLOUM ETC. CURRENTLY ONLY 10 Ingredient CAN BE ADDED TO ONE POST, YOU CAN INCREASE BY UNDERSTANDING IT, ITS EASY.
function coloum() {
var x = document.getElementById("count").value;
document.getElementById("count").value = parseInt(x) + 1;
var a = document.getElementById("count").value;
var div = document.createElement("div");
div.setAttribute('id' , a+'div');
div.setAttribute('class' , 'post_div');
var ing = document.createElement("INPUT");
ing.type ="text";
ing.setAttribute('id' , a+'I');
ing.setAttribute('placeholder', 'Ingredient');
ing.setAttribute('name', a+'I');
ing.style.fontSize = "15px";
ing.setAttribute('class' , 'post_ing');
var qty = document.createElement("INPUT");
qty.type ="text";
qty.setAttribute('id' , a+'Q');
qty.setAttribute('placeholder', 'Qty- For ex : 1/3');
qty.setAttribute('name', a+'Q');
qty.style.fontSize ="15px";
qty.setAttribute('class' , 'post_qty');
var sel = document.createElement("select");
sel.setAttribute('id' , a+'S');
sel.setAttribute('name', a+'S');
sel.style.fontSize ="15px";
sel.setAttribute('data-native-menu' , 'false');
sel.setAttribute('class' , 'post_sel');
var opt = document.createElement("option");
opt.text ="Drop";
sel.add(opt);   
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
remo.setAttribute('class' , "post_href");
remo.innerHTML = "Remove";
remo.setAttribute('onclick' , 'javascript:remo(this.id)');
remo.setAttribute('href', '#');
div.appendChild(ing);
div.appendChild(qty);
div.appendChild(sel);
div.appendChild(remo);
document.getElementById("ingredient").appendChild(div);
$("#"+a+"S").selectmenu();
$("#"+a+"I").textinput();
$("#"+a+"Q").textinput();
}
function remo(value) {
$("#"+value+"div").remove();
var x = document.getElementById("count").value;
document.getElementById("count").value = parseInt(x) - 1;
var all = document.getElementsByClassName("post_div");
for(var q = 0; q < all.length; q++) {
var idi = parseInt($(all[q]).attr('id'));
if(idi > value) {
$(all[q]).attr('id' , parseInt(idi) -1+"div");
$(all[q]).attr('name' , parseInt(idi) -1+"div"); 
}
}
var al = document.getElementsByClassName("post_href");
for(var q = 0; q < al.length; q++) {
var idi = parseInt($(al[q]).attr('id'));
if(idi > value) {
$(al[q]).attr('id' , parseInt(idi) -1);
}
}
var al = document.getElementsByClassName("post_ing");
for(var q = 0; q < al.length; q++) {
var idi = parseInt($(al[q]).attr('id'));
if(idi > value) {
$(al[q]).attr('id' , parseInt(idi) -1+"I");
$(al[q]).attr('name' , parseInt(idi) -1+"I"); 
}
}
var al = document.getElementsByClassName("post_qty");
for(var q = 0; q < al.length; q++) {
var idi = parseInt($(al[q]).attr('id'));
if(idi > value) {
$(al[q]).attr('id' , parseInt(idi) -1+"Q");
$(al[q]).attr('name' , parseInt(idi) -1+"Q"); 
}
}
var al = $("#ingredient select")
for(var q = 0; q < al.length; q++) {
var idi = parseInt($(al[q]).attr('id'));
if(idi > value) {
$(al[q]).attr('id' , parseInt(idi) -1+"S");
$(al[q]).attr('name' , parseInt(idi) -1+"S"); 
}
}
}
function chk() {
if(document.getElementById("title").value.length > 1) {
document.getElementById("title").style.border = "2px solid white";
}
}
function chek() {
if($(".about").val().length > 1) {
$(".about").css('border' , '2px solid white');
}
}
function tag() {
var val = $("#process").val();
var spi = val.split('.');
$("#arrow_pro").css('visibility' , 'visible');
$("#tag").html('<div style="display:inline-block; color:#BDBDBD; visibility:hidden;">hello</div><br/>');
for(var x = 0; x < spi.length; x++) {
$("#tag").append("<div style='background-color:white; max-width:95%; display:inline-block; border-radius:5px;'><span style='background-color:white; border-radius:5px; padding-left:5px; padding-right:5px;'>"+spi[x]+"</span></div><br/><br/>");
}
}